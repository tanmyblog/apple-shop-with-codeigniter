<?php
    class Home extends MY_Controller
    {
        function __construct()
        {
            // ke thua tu ci_controller
            parent::__construct();
            $this->load->model('categories_model');
            $this->load->model('products_model');
        }

        function index()
        {
            $input = array();
            // load danh sach san pham moi nhat
            $input['limit'] = array(8,0);
            $products = $this->products_model->get_list($input);
            $this->data['products'] = $products;
            // laod danh sach san pham mua nhieu
            $input['order'] = array('buyed' , 'DESC');
            $product_buyed = $this->products_model->get_list($input);
            $this->data['product_buyed'] = $product_buyed;

            $this->data['temp'] = 'site/home/index';
            $this->load->view('site/layout', $this->data);
        }
    }
?>