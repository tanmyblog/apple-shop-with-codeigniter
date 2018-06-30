<?php
    Class Transaction extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('transaction_model');
        }

        function index()
        {
            //lay tong so luong ta ca cac giao dich trong websit
            $total_rows = $this->transaction_model->get_total();
            $this->data['total_rows'] = $total_rows;
            
            //load ra thu vien phan trang
            $this->load->library('pagination');
            $config = array();
            $config['total_rows']  = $total_rows;//tong tat ca cac giao dich
            $config['base_url']    = admin_url('transaction/index'); //link hien thi ra danh
            $config['per_page']    = 10; // so luong giao dich hien thi tren 1 trang
            $config['uri_segment'] = 4; // phan doan hien thi ra so trang tren url
            $config['next_link']   = ' >> ';
            $config['prev_link']   = ' << ';
            //khoi tao cac cau hinh phan trang
            $this->pagination->initialize($config);
            
            $segment = $this->uri->segment(4);
            $segment = intval($segment);
            
            $input = array();
            $input['limit'] = array($config['per_page'], $segment);
            
            //kiem tra co thuc hien loc du lieu hay khong
            $id = $this->input->get('id');
            $id = intval($id);
            $where = array();
            $input['where'] = array();
            if($id > 0)
            {
                $input['where']['id'] = $id;
            }
            //lọc theo thành viên
            $user = $this->input->get('user');
            if($user)
            {
                $where['user_id'] = $user;
            }
            
            //lọc theo cổng thanh toán
            $payment = $this->input->get('payment');
            if($payment)
            {
                $where['payment'] = $payment;
            }
            
            //lọc theo trạng thái thanh toán
            $status = $this->input->get('status');
            if($status != '')
            {
                $where['status'] = $status;
            }

            //lọc theo thời gian
            $created_to = $this->input->get('created_to');
            $created    = $this->input->get('created');
            if($created && $created_to)
            {
                //Tìm theo ngày từ A -> B
                $time = get_time_between_day($created,$created_to);
                //nếu dữ liệu trả về hợp lệ
                if(is_array($time))
                {   
                    $where['created >='] = $time['start'];
                    $where['created <='] = $time['end'];
                }
            }
            //gắn các điệu điện lọc
            $input['where'] = $where;
            
            //lay danh sach san pham
            $list = $this->transaction_model->get_list($input);
            $this->data['list'] = $list;
        
            $this->data['filter'] = $input['where'];
            $this->data['created_to'] = $created_to;
            $this->data['created']    = $created;

            // lay noi dung cua bien message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            $this->data['temp'] = 'admin/transaction/index';
            $this->load->view('admin/main', $this->data);
        }
        
        // Cập nhật giao dịch
        function edit()
        {
            $id = $this->uri->rsegment('3');
            $transaction = $this->transaction_model->get_info($id);
            if(!$transaction)
            {
                $this->session->set_flashdata('message', 'Không tồn tại giao dịch này');
                redirect(admin_url('transaction'));
            }
            $this->data['transaction'] = $transaction;
            
            //neu co du lieu post len thi kiem tra
            if($this->input->post())
            {
                // dữ liệu thêm vào db
                $data = array(
                    'status'          => $this->input->post('status'),
                );
               
                if($this->transaction_model->update($transaction->id,$data))
                {
                    $this->session->set_flashdata('message', 'Cập nhật giao dịch thành công');
                }
                else
                {
                    $this->session->set_flashdata('message', 'Cập nhật dịch thất bại!');
                }
                redirect(admin_url('transaction'));
            }
            $this->data['temp'] = 'admin/transaction/edit';
            $this->load->view('admin/main', $this->data);
        }

        /*
        * Xuất dữ liệu ra file excel
        */
        public function export()
        {
            //lay toan bo giao dịch
            $list = array();
            $list = $this->transaction_model->get_list();
            foreach ($list as $row)
            {
                $row->_amount = number_format($row->amount);
                if($row->status == 0)
                {
                    $row->_status = 'pending';
                }
                elseif($row->status == 1)
                {
                    $row->_status = 'completed';
                }
                elseif($row->status == 2)
                {
                    $row->_status = 'cancel';
                }
        
            }
            $this->data['list'] = $list;
            // Hien thi view
            $this->load->view('admin/transaction/export', $this->data);
        }
    }
?>
