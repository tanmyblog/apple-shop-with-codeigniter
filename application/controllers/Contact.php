<?php
    class Contact extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            // load validation
            $this->load->library('form_validation');
            $this->load->helper('form');

            //load fil model
            $this->load->model('contact_model');

            // lay noi dung cua bien message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
        }

        public function index()
        {
            // Nếu có dữ liệu post lên
            if($this->input->post())
            {
                // set các tập luật cho thẻ input
                $this->form_validation->set_rules('name','Tên ','required');
                $this->form_validation->set_rules('email','Email ','required|valid_email');
                $this->form_validation->set_rules('content','Nội dung','required');
                $this->form_validation->set_rules('phone','Số điên thoại','required|numeric');
                // kiểm tra dữ liệu có đúng?
                if($this->form_validation->run())
                {
                    // Lưu vào bảng contact
                    $data = array(
                        'name'      => $this->input->post('name'),
                        'email'     => $this->input->post('email'),
                        'content'   => $this->input->post('content'),
                        'phone'     => $this->input->post('phone'),
                        'created'   => date("Y-m-d h:i:s",time()),
                    );
                    if($this->contact_model->create($data))
                    $this->session->set_flashdata('message', 'Gửi thông tin khoản thành công');
                    redirect('contact');
                }
            }
            // hiển thị ra view
            // $this->data['temp'] = 'site/contact/index';
            $this->load->view('site/contact/index', $this->data);
        }

        
    }
?>