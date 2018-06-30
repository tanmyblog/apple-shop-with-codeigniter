<?php
    Class Contact extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('contact_model');

            // lay noi dung cua bien message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
        }

        function index()
        {
            // lấy tổng các contact
            $total_rows = $this->contact_model->get_total();
            $this->data['total_rows'] = $total_rows;

            $contacts = $this->contact_model->get_list();
            $this->data['contacts'] = $contacts;

            $this->data['temp'] = 'admin/contact/index';
            $this->load->view('admin/main', $this->data);
        }

        // Xóa 1 slide
        function delete()
        {
            // lấy phân phân đoạn trên url
            $id = $this->uri->rsegment('3');
            $this->del($id);
            $this->session->set_flashdata('message', 'Xóa liên hệ thành công');
            redirect(admin_url('contact'));
        }
    
        // xóa nhiều slide
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
            $slide = $this->contact_model->get_info($id);
            if(!$slide)
            {
                $this->session->set_flashdata('message', 'Không tồn tại liên hệ này');
                redirect(admin_url('slide'));
            }
            // tiến hành xóa slide
            $this->contact_model->delete($id);
        }
    }
?>