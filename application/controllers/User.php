<?php 
    Class User extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('user_model');

            //load google login library
            $this->load->library('google');

            // lay noi dung cua bien message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
        }

        /*
         * Kiem tra username da ton tai chua?
         */
        function check_email()
        {
            $email = $this->input->post('email');
            $where = array('email' => $email);

            // kiem tra username ton tai trong csdl chua?
            if($this->user_model->check_exists($where))
            {
                // neu ton tai username trong csdl thi thong bao loi & tra ve false
                $this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại!');
                return false;
            }
            return true;
        }

        // đăng ký thành viên
        function register()
        {
            if($this->session->userdata('user_login'))
            {
                redirect(site_url('user/login'));
            }

            $this->load->library('form_validation');
            $this->load->helper('form');

            // neu co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Tên','required|min_length[6]');
                $this->form_validation->set_rules('email','Email đăng nhập','required|valid_email|callback_check_email');
                $this->form_validation->set_rules('password','Mật khẩu','required|min_length[6]');
                $this->form_validation->set_rules('re_password','Nhập lại mật khẩu','required|matches[password]');
                $this->form_validation->set_rules('phone','Số điện thoại','required');
                $this->form_validation->set_rules('address','Địa chỉ','required');

                // kiem tra nhap du lieu co chinh xac?
                if($this->form_validation->run())
                {
                    // true thi them vao csdl
                    $password = $this->input->post('password');
                    $password = md5($password);

                    $data = array(
                        'name'      => $this->input->post('name'),
                        'email'     => $this->input->post('email'),
                        'phone'     => $this->input->post('phone'),
                        'address'   => $this->input->post('address'),
                        'password'  => $password,
                        'created'   => date("Y-m-d h:i:s",time()),
                    );

                    if($this->user_model->create($data))
                    {
                        $this->session->set_flashdata('message', 'Tạo tài khoản thành công');
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Tạo tài khoản thất bại!');
                    }
                    redirect(site_url('user/login'));
                }
            }
            // hiển thị ra view
            // $this->data['temp'] = 'site/user/register';
            $this->load->view('site/user/register', $this->data);
        }

        // kiểm tra đăng nhập
        function login()
        {
            if($this->session->userdata('user_login') == true)
            {
                redirect(site_url('user/login'));
            }

            $this->load->library('form_validation');
            $this->load->helper('form');
            if($this->input->post())
            {
                $this->form_validation->set_rules('email','Email đăng nhập','required|valid_email');
                $this->form_validation->set_rules('password','Mật khẩu','required|min_length[6]');
                $this->form_validation->set_rules('login','login', 'callback_checklogin');

                if($this->form_validation->run())
                {
                    // tao session dang nhap & chuyen huong ve trang home
                    $user = $this->get_user_info();
                    $this->session->set_userdata('user_login', $user->id);  
                    $this->session->set_flashdata('message', 'Đăng nhập thành công');  
                    redirect();
                }
            }else if(isset($_GET['code'])){
                //authenticate user
                $this->google->getAuthenticate();
                
                //get user info from google
                $gpInfo = $this->google->getUserInfo();
                
                $userData = array(
                    'name'      => $gpInfo['given_name'].'" "'.$gpInfo['family_name'],
                    'email'     => $gpInfo['email'],
                    'created'   => date("Y-m-d h:i:s",time()),
                    'oauth_provider' => 'google',
                    'oauth_uid'      => $gpInfo['id'],
                );

                // tao session dang nhap & chuyen huong ve trang home
                $this->session->set_userdata('user_login', true);  
                $this->session->set_userdata('userData', $userData);
                redirect(site_url('user/'));
            } 
            //google login url
            $this->data['loginURL'] = $this->google->loginURL();
        
            // hiển thị ra view
            //$this->data['temp'] = 'site/user/login';
            $this->load->view('site/user/login', $this->data);
        }

        // kiem tra username & password co dung khong?
        function checklogin()
        {
            $user = $this->get_user_info();
            if($user)
            {
                return true;
            }
            $this->form_validation->set_message(__FUNCTION__, 'Đăng nhập thất bại');
            return false;
        }

        /*
         * Check login with google plus
         */
        public function checkUser($userData = array()){
            $primaryKey = 'id';
            $tableName = 'user';
            if(!empty($userData)){
                //check whether user data already exists in database with same oauth info
                $this->db->select($this->primaryKey);
                $this->db->from($this->tableName);
                $this->db->where(array('oauth_provider'=>$userData['oauth_provider'],'oauth_uid'=>$userData['oauth_uid']));
                $prevQuery = $this->db->get();
                $prevCheck = $prevQuery->num_rows();
                
                if($prevCheck > 0){
                    $prevResult = $prevQuery->row_array();
                    
                    //update user data
                    $userData['modified'] = date("Y-m-d H:i:s");
                    $update = $this->db->update($this->tableName,$userData,array('id'=>$prevResult['id']));
                    
                    //get user ID
                    $userID = $prevResult['id'];
                }else{
                    //insert user data
                    $userData['created']  = date("Y-m-d H:i:s");
                    $userData['modified'] = date("Y-m-d H:i:s");
                    $insert = $this->db->insert($this->tableName,$userData);
                    
                    //get user ID
                    $userID = $this->db->insert_id();
                }
            }
            
            //return user ID
            return $userID?$userID:FALSE;
        }

        // lấy thông tin thành viên sau khi đăng nhập
        private function get_user_info()
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $password = md5($password);
            
            $where = array('email' => $email, 'password' => $password);
            $user = $this->user_model->get_info_rule($where);
            return $user;
        }

        // chỉnh sửa thông tin thành viên
        function edit()
        {
            if(!$this->session->userdata('user_login'))
            {
                redirect(site_url('user/login'));
            }
            // lây thông thành viên
            $user_id = $this->session->userdata('user_login');
            $user = $this->user_model->get_info($user_id);
            if(!$user)
            {
                redirect();
            }
            $this->data['user'] = $user;

            $this->load->library('form_validation');
            $this->load->helper('form');
            // neu co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $password = $this->input->post('password');
                $this->form_validation->set_rules('name','Tên','required|min_length[6]');
                if($password)
                {
                    $this->form_validation->set_rules('password','Mật khẩu','required|min_length[6]');
                    $this->form_validation->set_rules('re_password','Nhập lại mật khẩu','required|matches[password]');
                }
                $this->form_validation->set_rules('phone','Số điện thoại','required');
                $this->form_validation->set_rules('address','Địa chỉ','required');

                // kiem tra nhap du lieu co chinh xac?
                if($this->form_validation->run())
                {
                    $data = array(
                        'name'      => $this->input->post('name'),
                        'phone'     => $this->input->post('phone'),
                        'address'   => $this->input->post('address')
                    );
                    if($password)
                    {
                        $data = array(
                            'password' => md5($password)
                        );
                    }
                    if($this->user_model->update($user_id,$data))
                    {
                        $this->session->set_flashdata('message', 'Cập nhật tài khoản thành công');
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Cập nhật tài khoản thất bại!');
                    }
                    redirect(site_url('user'));
                }
            }

            // hiển thị ra view
            //$this->data['temp'] = 'site/user/edit';
            $this->load->view('site/user/edit', $this->data);
        }
        // hiển thị thông tin thành viên
        function index()
        {
            if(!$this->session->userdata('user_login'))
            {
                redirect(site_url('user/login'));
            }
            $user_id = $this->session->userdata('user_login');
            $user = $this->user_model->get_info($user_id);
            if(!$user)
            {
                redirect();
            }
            $this->data['user'] = $user;
            // hiển thị ra view
            // $this->data['temp'] = 'site/user/index';
            $this->load->view('site/user/index', $this->data);
        }

        // hàm logout
        function logout()
        {
            if($this->session->userdata('user_login'))
            {
                $this->session->unset_userdata('user_login');
                //delete login status & user info from session
                $this->session->unset_userdata('loggedIn');
                $this->session->unset_userdata('userData');
                $this->session->sess_destroy();
            }
            redirect();
        }

        
        
    }
?>