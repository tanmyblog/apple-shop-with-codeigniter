<?php 
    Class Order extends MY_Controller
    {
        function __construct()
        {
            
            parent::__construct();

            // lay noi dung cua bien message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
        }
        // Lấy thông tin của khách hàng
        function checkout()
        {
            // Lay danh sách giỏ hàng
            $carts = $this->cart->contents();
            // Tổng sp trong giỏ
            $total_items = $this->cart->total_items();
            
            if($total_items <= 0)
            {
                redirect();
            }
            // lấy ra tổng sô tiền cần thanh toán
            $total_amount = 0;
            foreach($carts as $row)
            {
                $total_amount += $row['subtotal'];
            }
            $this->data['total_amount'] = $total_amount;
            // nếu thành viên đăng nhập thì lấy thông tin của thành viên
            $user_id = 0;
            $user = '';
            if($this->session->userdata('user_login'))
            {
                // lây thông thành viên
                $user_id = $this->session->userdata('user_login');
                $user = $this->user_model->get_info($user_id);
            }
            $this->data['user'] = $user;

            $this->load->library('form_validation');
            $this->load->helper('form');
            // neu co du lieu post len thi kiem tra
            if($this->input->post())
            {
               
                $this->form_validation->set_rules('email','Email đặt hàng','required|valid_email');
                $this->form_validation->set_rules('name','Tên khách hàng','required|min_length[6]');
                $this->form_validation->set_rules('phone','Số điện thoại', 'required');
                $this->form_validation->set_rules('message','Ghi chú', 'required');
                $this->form_validation->set_rules('option_payment','Cổng thanh toán', 'required');

                // kiem tra nhap du lieu co chinh xac?
                if($this->form_validation->run())
                {
                    $payment  = $this->input->post('option_payment');
                    $bankcode = '';
                    $bankcode = $this->input->post('bankcode');
                    $name     = $this->input->post('name');
                    $email    = $this->input->post('email');
                    $phone    = $this->input->post('phone');
                    $address  = $this->input->post('address');

                    $data = array(
                        'status'     => 0, // Trạng thái chưa thanh toán
                        'user_id'    => $user_id,
                        'user_email' => $email,
                        'user_name'  => $name,
                        'user_phone' => $phone,
                        'message'    => $this->input->post('message'),
                        'amount'     => $total_amount, //Tổng số tiền cần thanh toán
                        'payment'    => $payment, // Cổng thanh toán
                        'created'    => date("Y-m-d h:i:s",time()),
                        'user_address' => $address,
                    );

                    // tiến hành thêm data vào transaction
                    $this->load->model('transaction_model');
                    $this->transaction_model->create($data);
                    // lấy ra id của giao dịch vừa thêm vào
                    $transaction_id = $this->db->insert_id(); 
                    // Thêm vào bảng order
                    $this->load->model('order_model');
                    foreach($carts as $row)
                    {
                        $data = array(
                            'transaction_id'    => $transaction_id,
                            'product_id'        => $row['id'],
                            'qty'               => $row['qty'],
                            'amount'            => $row['subtotal'],
                            'status'            => '0',
                            'createdDate'        => date("Y-m-d h:i:s",time())
                        );
                        $this->order_model->create($data);
                    }
                    // Xóa giỏ hàng
                    $this->cart->destroy();

                    // nếu thanh toán khi nhận hàng
                    if($payment == 'offline')
                    {
                        $this->session->set_flashdata('message', 'Đặt hàng thành công, chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất');  
                        redirect(site_url('gio-hang'));
                    }
                    else if($payment=='baokim')
                    {
                        // load thư viện payment
                        $this->load->library('payment/baokim_payment');
                        // Chuyển sang trang thanh toán.
                        $this->baokim_payment->payment($transaction_id, $total_amount, base_url());
                    }
                    else if(in_array($payment, array('NL', 'ATM_ONLINE','IB_ONLINE','ATM_OFFLINE','NH_OFFLINE'.'VISA','CREDIT_CARD_PREPAID')))
                    {
                        // load thư viện payment
                        $this->load->library('payment/nganluong_payment');
                        // Chuyển sang trang thanh toán.
                        $this->nganluong_payment->payment($name, $email, $phone, $address, $payment, $bankcode, $total_amount);
                    }
                }
            }

            // hiển thị ra view
            // $this->data['temp'] = 'site/order/checkout';
			$this->load->view('site/order/checkout', $this->data);
        }

        // nhận kết quả trả về từ cổng thanh toán
        function result()
        {
            // load thư viện payment
            $this->load->library('payment/baokim_payment');
            $this->load->model('transaction_model');
            // id của giao dịch
            $tran_id = $this->input->post('order_id');
            // lấy thông tin giao dịch
            $transaction = $this->transaction_model->get_info($tran_id);
            if(!$transaction)
            {
                redirect();
            }
            // gọi tới hàm kiểm tra trại thái thanh toán
            $stutus = $this->baokim_payment->result($tran_id,$transaction->amount);
            if($status == true)
            {
                // cập nhật lại trạng thái đơn hàng đã thanh toán
                $data = array();
                $data['status'] = 1;
                $this->transaction_model->update($tran_id, $data);
            }
            else if($status == false)
            {
                // cập nhật lại trạng thái đơn hàng thanh toán thất bại
                $data = array();
                $data['status'] = 2;
                $this->transaction_model->update($tran_id, $data);
            }
        }

        // nhận kết quả trả về từ cổng thanh toán ngân lượng
        function resultNL()
        {
            // load thư viện payment
            $this->load->library('payment/nganluong_payment');
            $this->load->model('transaction_model');
            // id của giao dịch
            $tran_id = $this->input->post('order_id');
            // lấy thông tin giao dịch
            $transaction = $this->transaction_model->get_info($tran_id);
            if(!$transaction)
            {
                redirect();
            }
            // gọi tới hàm kiểm tra trại thái thanh toán
            $stutus = $this->nganluong_payment->resultNL($tran_id,$transaction->amount);
            if($status == true)
            {
                // cập nhật lại trạng thái đơn hàng đã thanh toán
                $data = array();
                $data['status'] = 1;
                $this->transaction_model->update($tran_id, $data);
            }
            else if($status == false)
            {
                // cập nhật lại trạng thái đơn hàng thanh toán thất bại
                $data = array();
                $data['status'] = 2;
                $this->transaction_model->update($tran_id, $data);
            }
        }


        function cancelorder()
        {
            // hiển thị ra view
            //$this->data['temp'] = 'site/order/cancelorder';
			$this->load->view('site/order/cancelorder', $this->data);
        }

        function paymentsuccess()
        {
            // hiển thị ra view
            $this->cart->destroy();
            //$this->data['temp'] = 'site/order/paymentsuccess';
			$this->load->view('site/order/paymentsuccess', $this->data);
        }
    }

?>