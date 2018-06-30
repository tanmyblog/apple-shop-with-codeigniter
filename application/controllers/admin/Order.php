<?php
    Class Order extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('order_model');
            $this->load->model('products_model');

            // lay noi dung cua bien message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
        }

        function index()
        {
            // lấy tổng đơn hàng
            $total = $this->db->query("SELECT o.id as total FROM `order` as o inner JOIN `transaction` t on o.transaction_id = t.id inner JOIN `product` AS p on o.product_id = p.id");
            $total_rows = $total->num_rows();
            $this->data['total_rows'] = $total_rows;

            $query = $this->db->query("SELECT o.id as orderId, t.id as tranID, p.name as name, p.image_link as image, p.price as price, p.discount as discount, o.qty as quantity ,t.amount as amount, o.status as orderStatus, t.status as tranStatus, t.created FROM `order` as o inner JOIN `transaction` t on o.transaction_id = t.id inner JOIN `product` AS p on o.product_id = p.id ORDER BY orderId DESC");
            $this->data['query'] = $query;

            // Kiểm tra có thực hiện submit form không
            $id = $this->input->get('id');
            $id = intval($id);
            $input['where'] = array();
            if($id > 0)
            {
                $query = $this->db->query("SELECT o.id as orderId, t.id as tranID, p.name as name, p.image_link as image, p.price as price, p.discount as discount, o.qty as quantity ,t.amount as amount, o.status as orderStatus, t.status as tranStatus, t.created FROM `order` as o inner JOIN `transaction` t on o.transaction_id = t.id inner JOIN `product` AS p on o.product_id = p.id WHERE o.id = $id
                ");
            }
            $name = $this->input->get('name');
            if($name)
            {
                $query = $this->db->query("SELECT o.id as orderId, t.id as tranID, p.name as name, p.image_link as image, p.price as price, p.discount as discount, o.qty as quantity ,t.amount as amount, o.status as orderStatus, t.status as tranStatus, t.created FROM `order` as o inner JOIN `transaction` t on o.transaction_id = t.id inner JOIN `product` AS p on o.product_id = p.id WHERE p.name LIKE '%$name%'");
            }
            $orderStatus = $this->input->get('orderStatus');
            $orderStatus = intval($orderStatus);
            if($orderStatus >= 0)
            {
                $query = $this->db->query("SELECT o.id as orderId, t.id as tranID, p.name as name, p.image_link as image, p.price as price, p.discount as discount, o.qty as quantity ,t.amount as amount, o.status as orderStatus, t.status as tranStatus, t.created FROM `order` as o inner JOIN `transaction` t on o.transaction_id = t.id inner JOIN `product` AS p on o.product_id = p.id 
                WHERE o.status = $orderStatus ORDER BY o.id DESC");
            }

            // lấy danh sách sp
            $this->data['query'] = $query;

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

            // lay noi dung cua bien message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            $this->data['temp'] = 'admin/order/index';
            $this->load->view('admin/main', $this->data);
        }

        // Cập nhật đơn hàng
        function edit()
        {
            $tranID = $this->uri->rsegment(3);
            $query = $this->db->query("SELECT o.`id`, p.`name`, o.`qty`, o.`amount`, o.`status` FROM `transaction` as t INNER JOIN `order` as o ON t.`id` = o.`transaction_id` INNER JOIN `product` as p ON o.`product_id` = p.`id` WHERE o.`transaction_id` = $tranID ORDER BY o.`id` DESC");
            $user = $this->db->query("SELECT t.`user_name`, t.`user_email`, t.`user_phone`, t.`message` FROM `transaction` as t INNER JOIN `order` as o ON t.`id` = o.`transaction_id` INNER JOIN `product` as p ON o.`product_id` = p.`id` WHERE o.`transaction_id` = $tranID LIMIT 0,1");
            $tran = $this->db->query("SELECT * FROM `transaction` WHERE `id` = $tranID ");
            foreach($tran->result() as $row)
            {
                $id = $row->id;
            }

            $this->data['query'] = $query;
            $this->data['user'] = $user;
            $this->data['tran'] = $tran;
            
            // Nếu có submit form
            if($this->input->post())
            {
                $up = $this->db->query("SELECT `o`.`product_id` as `proId`, `o`.`qty` as `qty` FROM `order` as `o` INNER JOIN `transaction` as `t` ON `o`.`transaction_id` = `t`.`id` WHERE `t`.`id` = ".$id);
                foreach($up->result() as $item)
                {
                    $product = $this->products_model->get_info($item->proId);
                    $data = array();
                    $data['buyed'] = $product->buyed + $item->qty; //cap nhat so luong da mua
                    $data['quantity'] = $product->quantity - $item->qty;
 
                    $this->products_model->update($product->id,$data);
                }
                
                $this->db->set('status', $this->input->post('status'), FALSE);
                $this->db->where('transaction_id', $id);
                

                if($this->db->update('order'))
                {
                    
                    
                    $this->session->set_flashdata('message', 'Đã cập nhật đơn hàng');
                    redirect(admin_url('order'));
                }
                else
                {
                    $this->session->set_flashdata('message', 'Cập nhật thất bại');
                }
            }
            $this->data['temp'] = 'admin/order/edit';
            $this->load->view('admin/main', $this->data);
        }

        function export()
        {
            // lấy tổng đơn hàng
            $query = $this->db->query("SELECT o.id as orderId, t.id as tranID, p.name as name, p.image_link as image, p.price as price, p.discount as discount, o.qty as quantity ,t.amount as amount, o.status as orderStatus, t.status as tranStatus, t.created FROM `order` as o inner JOIN `transaction` t on o.transaction_id = t.id inner JOIN `product` AS p on o.product_id = p.id ORDER BY orderId DESC");
            $this->data['query'] = $query;

            $this->data['query'] = $query;

            $this->load->view('admin/order/export', $this->data);
        }
    }
?>
