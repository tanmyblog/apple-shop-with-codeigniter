<?php
    Class slide extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('slide_model');
        }

        function index()
        {
            // lấy tổng slide
            $total_rows = $this->slide_model->get_total();
            $this->data['total_rows'] = $total_rows;

            $input = array();
            $list = $this->slide_model->get_list();
            $this->data['list'] = $list;

            // lấy danh sách bài viết
            $list = $this->slide_model->get_list($input);
            $this->data['list'] = $list;

            // lay noi dung cua bien message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            $this->data['temp'] = 'admin/slide/index';
            $this->load->view('admin/main', $this->data);
        }
        
        // Thêm slide
        function add()
        {
            // load thư viên validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');

            //neu co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Tiêu đề','required');
                
                // kiểm tra dữ liệu có chính xác ?
                if($this->form_validation->run())
                {
                    // lấy tên file ảnh đại diện upload lên
                    $this->load->library('upload_library');
                    $upload_path = './upload/slide';
                    $upload_data = $this->upload_library->upload($upload_path, 'image');
                    $image_link = '';
                    // kiểm tra upload
                    if(isset($upload_data['file_name']))
                    {
                        $image_link = $upload_data['file_name'];
                    }
                    // dữ liệu thêm vào db
                    $data = array(
                        'name'          => $this->input->post('name'),
                        'description'   => $this->input->post('description'),
                        'image_link'    => $image_link,
                        'link'          => $this->input->post('link'),
                        'sort_order'    => $this->input->post('sort_order'),
                        'status'        => $this->input->post('status')
                    );
                    if($this->slide_model->create($data))
                    {
                        $this->session->set_flashdata('message', 'Thêm slide mới thành công');
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Thêm slide mới thất bại!');
                    }
                    redirect(admin_url('slide'));
                }
            }
            $this->data['temp'] = 'admin/slide/add';
            $this->load->view('admin/main', $this->data);
        }
        
        // Cập nhật sản phẩm
        function edit()
        {
            $id = $this->uri->rsegment('3');
            $slide = $this->slide_model->get_info($id);
            if(!$slide)
            {
                $this->session->set_flashdata('message', 'Slide này không tồn tại');
                redirect(admin_url('slide'));
            }
            $this->data['slide'] = $slide;
            
            // load thư viên validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            //neu co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('name','Tiêu đề','required');
                // kiem tra nhap du lieu co chinh xac?
                if($this->form_validation->run())
                {
                    // lấy tên file ảnh đại diện upload lên
                    $this->load->library('upload_library');
                    $upload_path = './upload/slide';
                    $upload_data = $this->upload_library->upload($upload_path, 'image');
                    $image_link = '';
                    // kiểm tra upload
                    if(isset($upload_data['file_name']))
                    {
                        $image_link = $upload_data['file_name'];
                    }
                    // dữ liệu thêm vào db
                    $data = array(
                        'name'          => $this->input->post('name'),
                        'description'   => $this->input->post('description'),
                        'link'          => $this->input->post('link'),
                        'sort_order'    => $this->input->post('sort_order'),
                        'status'        => $this->input->post('status')
                    );
                    if($image_link != '')
                    {
                        $data['image_link'] = $image_link;
                    }
                    if($this->slide_model->update($slide->id,$data))
                    {
                        $this->session->set_flashdata('message', 'Cập nhật slide thành công');
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Cập nhật slide thất bại!');
                    }
                    redirect(admin_url('slide'));
                }
            }
            $this->data['temp'] = 'admin/slide/edit';
            $this->load->view('admin/main', $this->data);
        }
    
        // Xóa 1 slide
        function delete()
        {
            // lấy phân phân đoạn trên url
            $id = $this->uri->rsegment('3');
            $this->del($id);
            $this->session->set_flashdata('message', 'Xóa slide thành công');
            redirect(admin_url('slide'));
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
            $slide = $this->slide_model->get_info($id);
            if(!$slide)
            {
                $this->session->set_flashdata('message', 'Không tồn tại slide này');
                redirect(admin_url('slide'));
            }
            // tiến hành xóa slide
            $this->slide_model->delete($id);
            // xóa ảnh đại diện
            $image_link = './upload/slide/'. $slide->image_link;
            if(file_exists($image_link))
            {
                unlink($image_link);
            }
        }
    }
?>
