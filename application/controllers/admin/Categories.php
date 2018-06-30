<?php 
    Class Categories extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('categories_model');
        }

        /*
         * Lấy danh sách danh mục sản phẩm
         */
        function index()
        {
            $total_rows = $this->categories_model->get_total();
            $this->data['total_rows'] = $total_rows;

            $list = $this->categories_model->get_list();
            $this->data['list'] = $list;

            // load thư viên phân trang
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total_rows; // biên chứa tổng sp
            $config['base_url'] = admin_url('categories/index'); // link hiển thị ra sản phẩm
            $config['per_page'] = 10;   // số lượng sp hiển thị trên trang
            $config['uri_segment'] = 4; // phân đoạn hiển thị số trang trên url
            $config['next_link'] = ' >> ';
            $config['prev_link'] = ' << ';
            // khởi tạo các cấu hình phân trang
            $this->pagination->initialize($config);

            // lấy dữ liệu phân trang
            $segment = $this->uri->segment(4);
            $segment = intval($segment);
            $input = array();
            $input['limit'] = array( $config['per_page'], $segment);

            $id = $this->input->get('id');
            $id = intval($id);
            $input['where'] = array();
            if($id > 0)
            {
                $input['where']['id'] = $id;
            }

            // lấy danh sách tài khoản
            $list = $this->categories_model->get_list($input);
            $this->data['list'] = $list;

            // lay noi dung cua bien message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            $this->data['temp'] = 'admin/categories/index';
            $this->load->view('admin/main', $this->data);
        }

        // hàm thêm mới danh mục
        function add()
        {
            // load thư viên validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');

            //neu co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Tên danh mục','required');
                
                // kiem tra nhap du lieu co chinh xac?
                if($this->form_validation->run())
                {
                    // true thi them vao csdl
                    $name       = $this->input->post('name');
                    $site_title = $this->input->post('site_title');
                    $meta_desc  = $this->input->post('meta_desc');
                    $meta_key  = $this->input->post('meta_key');
                    $parent_id  = $this->input->post('parent_id');
                    $sort_order = $this->input->post('sort_order');

                    $data = array(
                        'name'      => $name,
                        'site_title'=> $site_title,
                        'meta_desc' => $meta_desc,
                        'meta_key'  => $meta_key,
                        'parent_id' => $parent_id,
                        'sort_order'=> intval($sort_order)
                    );

                    if($this->categories_model->create($data))
                    {
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thất bại!');
                    }
                    redirect(admin_url('categories'));
                }
            }

            // lấy ra danh sách danh mục cha
            $input = array();
            $input['where'] = array('parent_id' => 0);
            $list = $this->categories_model->get_list($input);
            $this->data['list'] = $list;

            $this->data['temp'] = 'admin/categories/add';
            $this->load->view('admin/main', $this->data);
        }

        // hàm sửa danh mục
        function edit()
        {
            // load thư viên validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');

            // lấy ra phân đoạn trên url
            $id     = $this->uri->rsegment('3');
            $info   = $this->categories_model->get_info($id);
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Không tồn tại danh mục này');
                redirect(admin_url('categories'));
            }
            // gửi thông tin $info sang trang edit
            $this->data['info'] = $info; 

            //neu co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Tên danh mục','required');
                // kiem tra nhap du lieu co chinh xac?
                if($this->form_validation->run())
                {
                    // true thi them vao csdl
                    $name       = $this->input->post('name');
                    $site_title = $this->input->post('site_title');
                    $meta_desc  = $this->input->post('meta_desc');
                    $meta_key  = $this->input->post('meta_key');
                    $parent_id  = $this->input->post('parent_id');
                    $sort_order = $this->input->post('sort_order');

                    $data = array(
                        'name'      => $name,
                        'site_title'=> $site_title,
                        'meta_desc' => $meta_desc,
                        'meta_key'  => $meta_key,
                        'parent_id' => $parent_id,
                        'sort_order'=> intval($sort_order)
                    );
                    if($this->categories_model->update($id,$data))
                    {
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
                    }
                    redirect(admin_url('categories'));
                }
            }
            // lấy ra danh sách danh mục cha
            $input = array();
            $input['where'] = array('parent_id' => 0);
            $list = $this->categories_model->get_list($input);
            $this->data['list'] = $list;

            $this->data['temp'] = 'admin/categories/edit';
            $this->load->view('admin/main', $this->data);
        }

        // xóa danh mục
        function delete()
        {
            // lấy phân phân đoạn trên url
            $id = $this->uri->rsegment('3');
            $this->del($id);
            $this->session->set_flashdata('message', 'Đã xóa danh mục này');
            redirect(admin_url('categories'));
        }

        // xóa nhiều danh mục
        function deletemulti()
        {
            $ids = $this->input->post('ids');
            foreach($ids as $id)
            {
                $this->del($id, false);
            }
        }

        // Thực hiện xóa
        private function del($id, $redirect = true)
        {
            $info = $this->categories_model->get_info($id);
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Không tồn tại danh mục này');
                if($redirect)
                {
                    redirect(admin_url('categories'));
                }
                else
                {
                    return false;
                }
            }
            // kiểm tra danh mục có sản phẩm không
            $this->load->model('products_model');
            $product = $this->products_model->get_info_rule(array('categories_id'=>$id), 'id');
            if($product)
            {
                $this->session->set_flashdata('message', 'Danh mục '.$info->name.' có chứa sản phẩm, bạn cần xóa các sản phẩm trước khi xóa danh mục');
                if($redirect)
                {
                    redirect(admin_url('categories'));
                }
                else
                {
                    return false;
                }
            }
            // tiến hành xóa danh mục
            $this->categories_model->delete($id);
        }
    }
?>