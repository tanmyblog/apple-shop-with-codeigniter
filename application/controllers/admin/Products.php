<?php
    Class Products extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('products_model');

            $this->load->library('ckeditor');
            $this->load->library('ckfinder');
         
            $this->ckeditor->basePath = base_url().'asset/ckeditor/';
            $this->ckeditor->config['toolbar'] = array(
                                                array( 
                                                    'Source', 
                                                    '-',
                                                    'Styles',
                                                    'Format',
                                                    'Font',
                                                    'FontSize',
                                                    'SelectColor',
                                                    '-',
                                                    'Bold',
                                                    'Italic',
                                                    'Underline',
                                                    '-',
                                                    'PasteText',
                                                    'PasteFromWord',
                                                    '-',
                                                    'Link',
                                                    'Unlink',
                                                    'Anchor',
                                                    '-',
                                                    'Image',
                                                    'Table',
                                                    '-',
                                                    'NumberedList',
                                                    'BulletedList' )
                                            );
            $this->ckeditor->config['language'] = 'en';
            $this->ckeditor->config['height'] = '300px';
            $this->ckeditor->config['toolbarCanCollapse'] = true;
         
            //Add Ckfinder to Ckeditor
            $this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/');
        }

        function index()
        {
            //lay tong so luong ta ca cac san pham trong websit
            $total_rows = $this->products_model->get_total();
            $this->data['total_rows'] = $total_rows;
            
            //load ra thu vien phan trang
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
            $config['base_url']   = admin_url('products/index'); //link hien thi ra danh sach san pham
            $config['per_page']   = 10;//so luong san pham hien thi tren 1 trang
            $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
            $config['next_link']   = ' >> ';
            $config['prev_link']   = ' << ';
            //khoi tao cac cau hinh phan trang
            $this->pagination->initialize($config);
            
            $segment = $this->uri->segment(4);
            $segment = intval($segment);
            
            $input = array();
            $input['limit'] = array($config['per_page'], $segment);
            
            //kiem tra co thuc hien loc du lieu hay khong
            $id = $this->input->get('id');
            $id = intval($id);
            $input['where'] = array();
            if($id > 0)
            {
                $input['where']['id'] = $id;
            }
            $name = $this->input->get('name');
            if($name)
            {
                $input['like'] = array('name', $name);
            }
            $categories_id = $this->input->get('categories');
            $categories_id = intval($categories_id);
            if($categories_id > 0)
            {
                $input['where']['categories_id'] = $categories_id;
            }
            
            //lay danh sach san pha
            $list = $this->products_model->get_list($input);
            $this->data['list'] = $list;
        
            //lay danh sach danh muc san pham
            $this->load->model('categories_model');
            $input = array();
            $input['where'] = array('parent_id' => 0);
            $categories = $this->categories_model->get_list($input);
            foreach ($categories as $row)
            {
                $input['where'] = array('parent_id' => $row->id);
                $subs = $this->categories_model->get_list($input);
                $row->subs = $subs;
            }
            $this->data['categories'] = $categories;
            
            //lay nội dung của biến message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            $this->data['temp'] = 'admin/products/index';
            $this->load->view('admin/main', $this->data);
        }
        
        // Thêm sản phẩm
        function add()
        {
            // load thư viên validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');

            //neu co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Tên sản phẩm','required');
                $this->form_validation->set_rules('categories','Danh mục sản phẩm','required');
                $this->form_validation->set_rules('price','Giá','required');
                
                // kiem tra nhap du lieu co chinh xac?
                if($this->form_validation->run())
                {
                    // true thi them vao csdl
                    $name           = $this->input->post('name');
                    $categories_id  = $this->input->post('categories');
                    $price          = $this->input->post('price');
                    $price          = str_replace(',','',$price);
                    $discount       = $this->input->post('discount');
                    $discount       = str_replace(',','',$discount);
                    $quantity       = $this->input->post('quantity');
                    $quantity       = str_replace(',','',$quantity);
                    // lấy tên file ảnh đại diện upload lên
                    $this->load->library('upload_library');
                    $upload_path = './upload/product';
                    $upload_data = $this->upload_library->upload($upload_path, 'image');
                    $image_link = '';
                    // kiểm tra upload
                    if(isset($upload_data['file_name']))
                    {
                        $image_link = $upload_data['file_name'];
                    }

                    // lấy mảng tên file ảnh khác upload lên
                    $image_list = array();
                    $image_list = $this->upload_library->uploadMore($upload_path, 'image_list');
                    $image_list = json_encode($image_list);

                    // dữ liệu thêm vào db
                    $data = array(
                        'name'          => $name,
                        'categories_id' => $categories_id,
                        'price'         => $price,
                        'image_link'    => $image_link,
                        'image_list'    => $image_list,
                        'discount'      => $discount,
                        'warranty'      => $this->input->post('warranty'),
                        'gifts'         => $this->input->post('gifts'),
                        'site_title'    => $this->input->post('site_title'),
                        'meta_key'      => $this->input->post('meta_key'),
                        'meta_desc'     => $this->input->post('meta_desc'),
                        'content'       => $this->input->post('content'),
                        'quantity'      => $quantity,
                        'created'       => date("Y-m-d h:i:s",time())
                    );

                    if($this->products_model->create($data))
                    {
                        $this->session->set_flashdata('message', 'Thêm mới sản phẩm thành công');
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Thêm mới sản phẩm thất bại!');
                    }
                    redirect(admin_url('products'));
                }
            }

            // lấy danh sách danh mục sp
            $this->load->model('categories_model');
            $input = array();
            $input['where'] = array('parent_id' => 0);
            $categories = $this->categories_model->get_list($input);
            foreach ($categories as $row)
            {
                $input['where'] = array('parent_id' => $row->id);
                $subs = $this->categories_model->get_list($input);
                $row->subs = $subs;
            }
            $this->data['categories'] = $categories;

            $this->data['temp'] = 'admin/products/add';
            $this->load->view('admin/main', $this->data);
        }
        
        // Cập nhật sản phẩm
        function edit()
        {
            $id = $this->uri->rsegment('3');
            $product = $this->products_model->get_info($id);
            if(!$product)
            {
                $this->session->set_flashdata('message', 'Sản phẩm này không tồn tại');
                redirect(admin_url('products'));
            }
            $this->data['product'] = $product;
            
            // lấy danh sách danh mục sp
            $this->load->model('categories_model');
            $input = array();
            $input['where'] = array('parent_id' => 0);
            $categories = $this->categories_model->get_list($input);
            foreach ($categories as $row)
            {
                $input['where'] = array('parent_id' => $row->id);
                $subs = $this->categories_model->get_list($input);
                $row->subs = $subs;
            }
            $this->data['categories'] = $categories;

            // load thư viên validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            //neu co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Tên sản phẩm','required');
                $this->form_validation->set_rules('categories','Danh mục sản phẩm','required');
                $this->form_validation->set_rules('price','Giá','required');
                
                // kiem tra nhap du lieu co chinh xac?
                if($this->form_validation->run())
                {
                    // true thi them vao csdl
                    $name           = $this->input->post('name');
                    $categories_id  = $this->input->post('categories');
                    $price          = $this->input->post('price');
                    $price          = str_replace(',','',$price);
                    $discount       = $this->input->post('discount');
                    $discount       = str_replace(',','',$discount);
                    $quantity       = $this->input->post('quantity');
                    $quantity       = str_replace(',','',$quantity);
                    // lấy tên file ảnh đại diện upload lên
                    $this->load->library('upload_library');
                    $upload_path = './upload/product';
                    $upload_data = $this->upload_library->upload($upload_path, 'image');
                    $image_link = '';
                    // kiểm tra upload
                    if(isset($upload_data['file_name']))
                    {
                        $image_link = $upload_data['file_name'];
                    }

                    // lấy mảng tên file ảnh khác upload lên
                    $image_list = array();
                    $image_list = $this->upload_library->uploadMore($upload_path, 'image_list');
                    $image_list_json = json_encode($image_list);

                    // dữ liệu thêm vào db
                    $data = array(
                        'name'          => $name,
                        'categories_id' => $categories_id,
                        'price'         => $price,
                        'discount'      => $discount,
                        'warranty'      => $this->input->post('warranty'),
                        'gifts'         => $this->input->post('gifts'),
                        'site_title'    => $this->input->post('site_title'),
                        'meta_key'      => $this->input->post('meta_key'),
                        'meta_desc'     => $this->input->post('meta_desc'),
                        'quantity'      => $quantity,
                        'content'       => $this->input->post('content')
                    );
                    if($image_link != '')
                    {
                        $data['image_link'] = $image_link;
                    }
                    if(!empty($image_list))
                    {
                        $data['image_list'] = $image_list_json;
                    }
                    if($this->products_model->update($product->id,$data))
                    {
                        $this->session->set_flashdata('message', 'Cập nhật sản phẩm thành công');
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Cập nhật sản phẩm thất bại!');
                    }
                    redirect(admin_url('products'));
                }
            }
            $this->data['temp'] = 'admin/products/edit';
            $this->load->view('admin/main', $this->data);
        }
    
        // Xóa 1 sản phẩm
        function delete()
        {
            // lấy phân phân đoạn trên url
            $id = $this->uri->rsegment('3');
            $this->del($id);
            $this->session->set_flashdata('message', 'Đã xóa danh mục này');
            redirect(admin_url('products'));
        }
    
        // xóa nhiều sản phẩm
        function deletemulti()
        {
            $ids = $this->input->post('ids');
            foreach($ids as $id)
            {
                $this->del($id);
            }
        }

        // thực hiện xóa
        function del($id)
        {
            $product = $this->products_model->get_info($id);
            if(!$product)
            {
                $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
                redirect(admin_url('products'));
            }
            // tiến hành xóa danh mục
            $this->products_model->delete($id);
            // xóa ảnh đại diện
            $image_link = './upload/product/'. $product->image_link;
            if(file_exists($image_link))
            {
                unlink($image_link);
            }
            // xóa các ảnh khác
            $image_list = json_decode($product->image_list);
            if(is_array($image_list))
            {
                foreach($image_list as $img)
                {
                    $image_list = './upload/product/'. $img;
                    if(file_exists($image_list))
                    {
                        unlink($image_list);
                    }
                }
            }
        }
    }
?>
