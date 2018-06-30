<?php 
    Class Admin extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('admin_model');
        }

        /*
         * Lay danh sach admin
         */
        function index()
        {
            $input = array();
            $list = $this->admin_model->get_list($input);
            $this->data['list'] = $list;

            $id = $this->input->get('id');
            $id = intval($id);
            $input['where'] = array();
            if($id > 0)
            {
                $input['where']['id'] = $id;
            }

            // lấy danh sách tài khoản
            $list = $this->admin_model->get_list($input);
            $this->data['list'] = $list;

            $total = $this->admin_model->get_total();
            $this->data['total'] = $total;

            // lay noi dung cua bien message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            $this->data['temp'] = 'admin/admin/index';
            $this->load->view('admin/main', $this->data);
        }

        /*
         * Kiem tra username da ton tai chua?
         */
        function check_username()
        {
            $action = $this->uri->rsegment(2);
            $username = $this->input->post('username');
            $where = array('username' => $username);

            $check = true;
            if($action == 'edit')
            {
                $info = $this->data['info']; // lấy ra thông tin quản trị muốn sửa
                if($info->username == $username)
                {
                    $check = false;
                }
            }

            // kiem tra username ton tai trong csdl chua?
            if($check && $this->admin_model->check_exists($where))
            {
                // neu ton tai username trong csdl thi thong bao loi & tra ve false
                $this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại!');
                return false;
            }
            return true;
        }

        /*
         * Them moi quan tri vien
         */
        function add()
        {
            $this->load->library('form_validation');
            $this->load->helper('form');

            // neu co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Tên','required');
                $this->form_validation->set_rules('username','Tài khoản đăng nhập','required|callback_check_username');
                $this->form_validation->set_rules('password','Mật khẩu','required|min_length[8]');
                $this->form_validation->set_rules('re_password','Nhập lại mật khẩu','required|matches[password]');

                // kiem tra nhap du lieu co chinh xac?
                if($this->form_validation->run())
                {
                    // true thi them vao csdl
                    $name = $this->input->post('name');
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');

                    $data = array(
                        'name'      => $name,
                        'username'  => $username,
                        'password'  => md5($password)
                    );

                    $permissions = $this->input->post('permissions');
                    $data['permissions'] = json_encode($permissions);

                    if($this->admin_model->create($data))
                    {
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thất bại!');
                    }
                    redirect(admin_url('admin'));
                }
            }
            $this->config->load('permissions',true);
            $config_permissions = $this->config->item('permissions');
            $this->data['config_permissions'] = $config_permissions;

            $this->data['temp'] = 'admin/admin/add';
            $this->load->view('admin/main', $this->data);
        }

        // ham sua
        function edit()
        {
            // lay id tai khoan can edit
            $id = $this->uri->rsegment('3');
            $id = intval($id);  // ep kieu sang so nguyen
            
            $this->load->library('form_validation');
            $this->load->helper('form');

            // lay thong tin cua tai khoan
            $info = $this->admin_model->get_info($id);
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Không tồn tại tài khoản này');
                redirect(admin_url('admin'));
            }

            // truyen du lieu lay duoc sang form edit

            $info->permissions = json_decode($info->permissions);
            $this->data['info'] = $info; 

            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Tên','required');
                $this->form_validation->set_rules('username','Tài khoản đăng nhập','required|callback_check_username');
                
                $password = $this->input->post('password');
                if($password)
                {
                    $this->form_validation->set_rules('password','Mật khẩu','required|min_length[8]');
                    $this->form_validation->set_rules('re_password','Nhập lại mật khẩu','matches[password]');
                }
                
                if($this->form_validation->run())
                {
                    // true thi them vao csdl
                    $name     = $this->input->post('name');
                    $username = $this->input->post('username');

                    $data = array(
                        'name'      => $name,
                        'username'  => $username
                    );

                    $permissions = $this->input->post('permissions');
                    $data['permissions'] = json_encode($permissions);

                    // Neu co thay doi mat khau moi gan du lieu
                    if($password)
                    {
                        $data['password'] = md5($password);
                    }

                    if($this->admin_model->update($id,$data))
                    {
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
                    }
                    redirect(admin_url('admin'));
                }
            }

            $this->config->load('permissions',true);
            $config_permissions = $this->config->item('permissions');
            $this->data['config_permissions'] = $config_permissions;

            $this->data['temp'] = 'admin/admin/edit';
            $this->load->view('admin/main', $this->data);
        }

        // ham xoa du lieu
        function delete()
        {
            $id = $this->uri->rsegment('3');
            $id = intval($id);

            $this->load->library('form_validation');
            $this->load->helper('form');

            // lay thong tin cua tai khoan
            $info = $this->admin_model->get_info($id);
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Không tồn tại tài khoản này');
                redirect(admin_url('admin'));
            }

            // Thuc hien xoa
            $this->admin_model->delete($id);
            $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
            redirect(admin_url('admin'));
        }
    }
?>