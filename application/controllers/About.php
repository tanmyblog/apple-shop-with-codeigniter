<?php
	Class About extends MY_Controller
	{
		function __construct()
		{
			parent::__construct();
		}

		function index()
		{
			$view = $this->db->query("SELECT count(id) as viewPro FROM `product`");
            $this->data['view'] = $view;

            $user = $this->db->query("SELECT count(id) as userCount FROM `user`");
            $this->data['user'] = $user;

            $tran = $this->db->query("SELECT count(id) as tranCount FROM `transaction`");
			$this->data['tran'] = $tran;
			
			$this->load->view('site/about/index', $this->data);
		}
	}
?>