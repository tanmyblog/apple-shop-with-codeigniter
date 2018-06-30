<?php
    Class MY_Controller extends CI_Controller
    {
        // bien gui du lieu sang ben view
        public $data = array();

        function __construct()
        {
            // ke thua tu ci_controller
            parent::__construct();
            
            $this->load->model('products_model');

            $controller = $this->uri->segment(1);

            switch($controller)
            {
                case 'admin': 
                {
                    // Xử lý dữ liệu khi tru cập trang admin
                    $this->load->helper('admin');
                    $this->checklogin();

                    break;
                }
                default:
                {
                    // Xử lý dữ liệu ở trang khách hàng
                    // lấy danh sách slide ra trang home
                    $this->load->model('slide_model');
                    $slide_list = $this->slide_model->get_list();
                    $total_slide = $this->slide_model->get_total();
                    $this->data['total_slide'] = $total_slide;
                    $this->data['slide_list'] = $slide_list;
                    
                    // lấy danh sách danh mục
                    $this->load->model('categories_model');
                    $input = array();
                    $input['where'] = array('parent_id' => 0);  
                    $categories_list = $this->categories_model->get_list($input);
                    foreach($categories_list as $row)
                    {
                        $input['where'] = array('parent_id' => $row->id);
                        $subs = $this->categories_model->get_list($input);
                        $row->subs = $subs;
                    }
                    $this->data['categories_list'] = $categories_list;

                    // lấy danh sách bai viết mới
                    $this->load->model('news_model');
                    $input = array();
                    $input['limit'] = array(5,0);
                    $news_list = $this->news_model->get_list($input);
                    $this->data['news_list'] = $news_list;

                    // lấy danh sách sản phẩm mới
                    $input = array();
                    $input['limit'] = array(6,0);
                    $products_list = $this->products_model->get_list($input);
                    $this->data['products_list'] = $products_list;

                    // kiểm tra thành viên đăng nhập ?
                    $user_login = $this->session->userdata('user_login');
                    $this->data['user_login'] = $user_login;
                    // nếu dn thành công lấy thông tin user
                    if($user_login)
                    {
                        $this->load->model('user_model');
                        $user_info = $this->user_model->get_info($user_login);
                        $this->data['user_info'] = $user_info;
                    }

                    // load hỗ trợ trực tuyến
                    $this->load->model('support_model');
                    $support = $this->support_model->get_list();
                    $this->data['support'] = $support;

                    //load thư viện cart
                    $this->load->library('cart');
                    $this->data['total_items'] = $this->cart->total_items();
                }
            }
        }

        /*
            
        */
        private function checklogin()
        {
            $controller = $this->uri->rsegment('1');
            $controller = strtolower($controller);  // chuyển về chữ thường

            // lay noi dung cua bien message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            $login = $this->session->userdata('login');
            /* 
             * nếu chưa đăng nhập mà truy cập vào 1 controller khác controller login
             * Thì chuyển hướng về trang login
             */
            if(!$login && $controller != 'login')
            {
                redirect(admin_url('login'));
            }
            else if($login && $controller == 'login')
            {
                redirect(admin_url('home'));
            }
            else if(!in_array($controller, array('login', 'home')))
            {
                // Thực hiện kiểm tra quyền
                $admin_id = $this->session->userdata('admin_id');
                $admin_root = $this->config->item('root_admin');
                if($admin_id != $admin_root)
                {
                    $permissions_admin = $this->session->userdata('permissions');
                    $controller = $this->uri->rsegment(1);
                    $action = $this->uri->rsegment(2);
                    $check = true;
                    if(!isset($permissions_admin->{$controller}))
                    {
                        $check = false;
                    }
                    $permissions_actions = $permissions_admin->{$controller};
                    if(!in_array($action, $permissions_actions))
                    {
                        $check = false;
                    }
                    if($check == false)
                    {
                        $this->session->set_flashdata('message', 'Bạn không có quyền thực hiện chức năng này');
                        redirect(base_url('admin'));
                    }
                }
            }

        }
    }
?>