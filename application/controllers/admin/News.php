<?php
    Class news extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('news_model');

            $this->load->library('ckeditor');
            $this->load->library('ckfinder');
         
            $this->ckeditor->basePath = base_url().'asset/ckeditor/';
            $this->ckeditor->config['toolbar'] = array(
                                                array( 
                                                    'Source', 
                                                    '-',
                                                    'Styles',
                                                    'Format',
                                                    'Font',
                                                    'FontSize',
                                                    'SelectColor',
                                                    '-',
                                                    'Bold',
                                                    'Italic',
                                                    'Underline',
                                                    '-',
                                                    'PasteText',
                                                    'PasteFromWord',
                                                    '-',
                                                    'Link',
                                                    'Unlink',
                                                    'Anchor',
                                                    '-',
                                                    'Image',
                                                    'Table',
                                                    '-',
                                                    'NumberedList',
                                                    'BulletedList' )
                                            );
            $this->ckeditor->config['language'] = 'en';
            $this->ckeditor->config['height'] = '300px';
            $this->ckeditor->config['toolbarCanCollapse'] = true;
         
            //Add Ckfinder to Ckeditor
            $this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/');
        }

        function index()
        {
            // lấy tổng bài viết
            $total_rows = $this->news_model->get_total();
            $this->data['total_rows'] = $total_rows;

            $list = $this->news_model->get_list();
            $this->data['list'] = $list;

            // load thư viên phân trang
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total_rows; // biên chứa tổng bài viết
            $config['base_url'] = admin_url('news/index'); // link hiển thị ra bài viết
            $config['per_page'] = 10;   // số lượng bài viết hiển thị trên trang
            $config['uri_segment'] = 4; // phân đoạn hiển thị số trang trên url
            $config['next_link'] = ' >> ';
            $config['prev_link'] = ' << ';
            // khởi tạo các cấu hình phân trang
            $this->pagination->initialize($config);

            // lấy dữ liệu phân trang
            $segment = $this->uri->segment(4);
            $segment = intval($segment);
            $input = array();
            $input['limit'] = array( $config['per_page'], $segment);

            // Kiểm tra có thực hiện submit form không
            $title = $this->input->get('title');
            if($title)
            {
                $input['like'] = array('title', $title);
            }

            // lấy danh sách bài viết
            $list = $this->news_model->get_list($input);
            $this->data['list'] = $list;

            // lay noi dung cua bien message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            $this->data['temp'] = 'admin/news/index';
            $this->load->view('admin/main', $this->data);
        }
        
        // Thêm sản phẩm
        function add()
        {
            // load thư viên validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');

            //neu co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('title','Tiêu đề','required');
                $this->form_validation->set_rules('content','Nội dung','required');
                
                // kiểm tra dữ liệu có chính xác ?
                if($this->form_validation->run())
                {
                    // lấy tên file ảnh đại diện upload lên
                    $this->load->library('upload_library');
                    $upload_path = './upload/news';
                    $upload_data = $this->upload_library->upload($upload_path, 'image');
                    $image_link = '';
                    // kiểm tra upload
                    if(isset($upload_data['file_name']))
                    {
                        $image_link = $upload_data['file_name'];
                    }
                    // dữ liệu thêm vào db
                    $data = array(
                        'title'         => $this->input->post('title'),
                        'short_desc'    => $this->input->post('short_desc'),
                        'content'       => $this->input->post('content'),
                        'meta_desc'     => $this->input->post('meta_desc'),
                        'meta_key'      => $this->input->post('meta_key'),
                        'image_link'    => $image_link,
                        'created'       => date("Y-m-d h:i:s",time()),
                        'site_title'    => $this->input->post('site_title')
                    );
                    if($this->news_model->create($data))
                    {
                        $this->session->set_flashdata('message', 'Thêm bài viết mới thành công');
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Thêm bài viết mới thất bại!');
                    }
                    redirect(admin_url('news'));
                }
            }
            $this->data['temp'] = 'admin/news/add';
            $this->load->view('admin/main', $this->data);
        }
        
        // Cập nhật sản phẩm
        function edit()
        {
            $id = $this->uri->rsegment('3');
            $new = $this->news_model->get_info($id);
            if(!$new)
            {
                $this->session->set_flashdata('message', 'Sản phẩm này không tồn tại');
                redirect(admin_url('news'));
            }
            $this->data['new'] = $new;
            
            // load thư viên validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            //neu co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('title','Tiêu đề','required');
                $this->form_validation->set_rules('content','Nội dung','required');
                
                // kiem tra nhap du lieu co chinh xac?
                if($this->form_validation->run())
                {
                    // lấy tên file ảnh đại diện upload lên
                    $this->load->library('upload_library');
                    $upload_path = './upload/news';
                    $upload_data = $this->upload_library->upload($upload_path, 'image');
                    $image_link = '';
                    // kiểm tra upload
                    if(isset($upload_data['file_name']))
                    {
                        $image_link = $upload_data['file_name'];
                    }
                    
                    // dữ liệu thêm vào db
                    $data = array(
                        'title'         => $this->input->post('title'),
                        'short_desc'    => $this->input->post('short_desc'),
                        'content'       => $this->input->post('content'),
                        'meta_desc'     => $this->input->post('meta_desc'),
                        'meta_key'      => $this->input->post('meta_key'),
                        'created'       => date("Y-m-d h:i:s",time()),
                        'site_title'    => $this->input->post('site_title')
                    );
                    if($image_link != '')
                    {
                        $data['image_link'] = $image_link;
                    }
                    if($this->news_model->update($new->id,$data))
                    {
                        $this->session->set_flashdata('message', 'Cập nhật bài viết thành công');
                    }
                    else
                    {
                        $this->session->set_flashdata('message', 'Cập nhật bài viết thất bại!');
                    }
                    redirect(admin_url('news'));
                }
            }
            $this->data['temp'] = 'admin/news/edit';
            $this->load->view('admin/main', $this->data);
        }
    
        // Xóa 1 sản phẩm
        function delete()
        {
            // lấy phân phân đoạn trên url
            $id = $this->uri->rsegment('3');
            $this->del($id);
            $this->session->set_flashdata('message', 'Xóa bài viết thành công');
            redirect(admin_url('news'));
        }
    
        // xóa nhiều sản phẩm
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
            $new = $this->news_model->get_info($id);
            if(!$new)
            {
                $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
                redirect(admin_url('news'));
            }
            // tiến hành xóa bài viết
            $this->news_model->delete($id);
            // xóa ảnh đại diện
            $image_link = './upload/news/'. $new->image_link;
            if(file_exists($image_link))
            {
                unlink($image_link);
            }
        }
    }
?>
