<?php
    Class Product extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            // load ra model sản phẩm
            $this->load->model('products_model');            
        }

        // hiển thị danh sách sản phẩm theo danh mục
        function category()
        {
            // lấy id dm trên phân đoạn url
            $id = intval($this->uri->rsegment('3'));
            // lấy ra thông tin của dm
            $this->load->model('categories_model');
            $categories = $this->categories_model->get_info($id);
            if(!$categories)
            {
                redirect('/');
            }
            $this->data['categories'] = $categories;
            $input = array();
            // kiểm tra là danh mục con hay cha
            if($categories->parent_id == 0)
            {
                $input_cate = array();
                $input_cate['where'] = array('parent_id' => $id);
                $category_subs = $this->categories_model->get_list($input_cate);
                if(!empty($category_subs)) // nếu dm hiện tại có dm con
                {
                    $category_subs_id = array();
                    foreach($category_subs as $sub)
                    {
                        $category_subs_id[] = $sub->id;
                    }
                    // lấy tất cả sp thuộc dm con đó
                    $this->db->where_in('categories_id', $category_subs_id);    
                }
                else
                {
                    $input['where'] = array('categories_id' => $id);
                }
            }
            else
            {
                $input['where'] = array('categories_id' => $id);
            }
            // lấy tổng sp
            $total_rows = $this->products_model->get_total($input);
            $this->data['total_rows'] = $total_rows;
            // load thư viên phân trang
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total_rows; // biên chứa tổng sp
            $config['base_url'] = base_url('product/category/'.$id); // link hiển thị ra sản phẩm
            $config['per_page'] = 8;   // số lượng sp hiển thị trên trang
            $config['uri_segment'] = 4; // phân đoạn hiển thị số trang trên url
            $config['next_link'] = ' >> ';
            $config['prev_link'] = ' << ';
            // khởi tạo các cấu hình phân trang
            $this->pagination->initialize($config);
            // lấy dữ liệu phân trang
            $segment = $this->uri->segment(4);
            $segment = intval($segment);
            $input['limit'] = array( $config['per_page'], $segment);
            // lấy ds sản phẩm theo id danh mục
            $list = $this->products_model->get_list($input);
            $this->data['list'] = $list;
            // hiển thị ra view
            // $this->data['temp'] = 'site/product/category';
            $this->load->view('site/product/category', $this->data);
        }
    
        // hiển trị trang chi tiết sản phẩm
        function detail()
        {
            // lấy id sp muốn xem
            $id = $this->uri->rsegment('3');
            $product = $this->products_model->get_info($id);
            if(!$product) redirect();
            // lấy số điểm trung bình đánh giá sản phẩm
            $product->raty = ($product->rate_count >0) ? $product->rate_total/$product->rate_count : 0;

            $this->data['product'] = $product;

            // cập nhật lượt xem
            $data = array();
            $data['view'] = $product->view + 1;
            $this->products_model->update($product->id, $data);

            // lấy thông tin của danh mục sản phẩm
            $categories = $this->categories_model->get_info($product->categories_id);
            $this->data['categories'] = $categories;

            // lấy sản phảm liên quan
            $data['order'] = array('buyed' , 'DESC');
            $related_product = $this->products_model->get_list($data);
            $this->data['related_product'] = $related_product;

            // hiển thị ra view
            //$this->data['temp'] = 'site/product/detail';
            $this->load->view('site/product/detail', $this->data);
        }

        // Tìm sản phẩm
        function search()
        {
            if($this->uri->rsegment(3) == 1)
            {
                // lấy dữ liệu từ auto complete
                $key = $this->input->get('term');
            }
            else
            {
                $key = $this->input->get('search');
            }
            
            $this->data['key'] = trim($key); // xóa khoản trống
            $input = array();
            $input['like'] = array('name', $key);
            $list = $this->products_model->get_list($input);
            
            $this->data['list'] = $list;

            if($this->uri->rsegment(3) == 1)
            {
                // xử lý auto complete
                $result = array();
                foreach($list as $row)
                {
                    $item = array();
                    $item['id']     = $row->id;
                    $item['label']  = $row->name;
                    $item['value']  = $row->name;
                    $result[]       = $item;
                }
                // dữ liệu trả về dưới dạng json
                die(json_encode($result));
            }
            else
            {
                // hiển thị ra view
                //$this->data['temp'] = 'site/product/search';
                $this->load->view('site/product/search', $this->data);
            }
        }

        // hàm đánh giá sản phẩm
        function raty()
        {
            $result = array();
            // lấy thông tin
            $id = $this->input->post('id'); // lấy id sp gửi lên từ ajax
            $id = (!is_numeric($id)) ? 0 : $id;
            $info = $this->products_model->get_info($id); // lấy thông tin sp cần đánh giá
            if(!$info)
            {
                exit();
            }

            // kiểm tra khách đã bình chọn hay chưa
            $raty = $this->session->userdata('session_raty');
            $raty = (!is_array($raty)) ? array() : $raty;
            $result = array();
            // nếu đã tồn tại id sp này trong session đánh giá
            if(isset($raty[$id]))
            {
                $result['msg'] = 'Bạn chỉ được đánh giá 1 lần cho sản phẩm này';
                $output = json_encode($result);
                echo $output;
                exit();
            }
            // cập nhật trạng thái đã bình chọn
            $raty[$id] = true;
            $this->session->set_userdata('session_raty',$raty);
            $score = $this->input->post('score'); // lấy điểm post lên từ trang ajax
            $data = array();
            $data['rate_total'] = $info->rate_total + $score; // tổng số điểm
            $data['rate_count'] = $info->rate_count + 1;     // tổng số lượt đánh giá
            // cập nhật lại đánh giá cho sp
            $this->products_model->update($id,$data);
            // Khai báo dữ liệu trả về
            $result['complete'] = true;
            $result['msg'] = 'cảm ơn bạn đã đánh giá cho sản phẩm này';
            $output = json_encode($result); //trả về json
            echo $output;
            exit();
        }
    }
?>