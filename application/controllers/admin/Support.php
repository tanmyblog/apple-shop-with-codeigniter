<?php 
    Class Support extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('support_model');
        }

        /*
         * Lấy danh sách danh mục sản phẩm
         */
        function index()
        {
            $list = $this->support_model->get_list();
            $this->data['list'] = $list;

            $id = $this->input->get('name');
            $id = intval($id);
            $input['where'] = array();
            if($id > 0)
            {
                $input['where']['name'] = $id;
            }

            // lấy danh sách tài khoản
            $list = $this->support_model->get_list($input);
            $this->data['list'] = $list;

            // lay noi dung cua bien message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            $this->data['temp'] = 'admin/support/index';
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
                $this->form_validation->set_rules('name','Tên người hỗ trợ','required');
                $this->form_validation->set_rules('gmail','Gmail','required');
                $this->form_validation->set_rules('facebook','Facebook','required');
                $this->form_validation->set_rules('phone','Số điện thoại','required');
                
                if($this->form_validation->run())
                {
                    $data = array(
                        'name'      => $this->input->post('name'),
                        'gmail'     => $this->input->post('gmail'),
                        'facebook'  => $this->input->post('facebook'),
                        'phone'     => $this->input->post('phone')
                    );

                    if($this->support_model->create($data))
                    {
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thất bại!');
                    }
                    redirect(admin_url('support'));
                }
            }

            $this->data['temp'] = 'admin/support/add';
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
            $info   = $this->support_model->get_info($id);
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Không tồn tại người hỗ trợ này');
                redirect(admin_url('support'));
            }
            // gửi thông tin $info sang trang edit
            $this->data['info'] = $info; 

            //neu co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Tên người hỗ trợ','required');
                $this->form_validation->set_rules('gmail','Gmail','required');
                $this->form_validation->set_rules('facebook','Facebook','required');
                $this->form_validation->set_rules('phone','Số điện thoại','required');

                // kiem tra nhap du lieu co chinh xac?
                if($this->form_validation->run())
                {
                    $data = array(
                        'name'      => $this->input->post('name'),
                        'gmail'     => $this->input->post('gmail'),
                        'facebook'  => $this->input->post('facebook'),
                        'phone'     => $this->input->post('phone')
                    );

                    if($this->support_model->update($id,$data))
                    {
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
                    }
                    redirect(admin_url('support'));
                }
            }

            $this->data['temp'] = 'admin/support/edit';
            $this->load->view('admin/main', $this->data);
        }

        // xóa danh mục
        function delete()
        {
            // lấy phân phân đoạn trên url
            $id = $this->uri->rsegment('3');
            $this->del($id);
            $this->session->set_flashdata('message', 'Đã xóa danh mục này');
            redirect(admin_url('support'));
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
        private function del($id)
        {
            $info = $this->support_model->get_info($id);
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Không tồn tại danh mục này');
                if($redirect)
                {
                    redirect(admin_url('support'));
                }
                else
                {
                    return false;
                }
            }
            // tiến hành xóa danh mục
            $this->support_model->delete($id);
        }
    }
?>