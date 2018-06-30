<?php
    Class Home extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        function index()
        {

            $view = $this->db->query("SELECT SUM(view) as viewCount FROM `product`");
            $this->data['view'] = $view;

            $user = $this->db->query("SELECT count(id) as userCount FROM `user`");
            $this->data['user'] = $user;

            $order = $this->db->query("SELECT count(id) as orderCount FROM `order`");
            $this->data['order'] = $order;

            $tran = $this->db->query("SELECT count(id) as tranCount FROM `transaction`");
            $this->data['tran'] = $tran;

            $this->data['temp'] = 'admin/home/index';
            $this->load->view('admin/main', $this->data);
        }

        // ham logout
        function logout()
        {
            if($this->session->userdata('login'))
            {
                $this->session->unset_userdata('login');
            }
            redirect(admin_url('login'));
        }
    }
?>