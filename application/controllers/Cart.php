<?php
	Class Cart extends MY_Controller
	{
		function __construct()
		{
			parent::__construct();
		}

		/*
		* Thêm sản phẩm vào giỏ
		*/
		function add()
		{
			// Lấy ra sp muốn thêm vào giỏ
			$this->load->model('products_model');
			$id = $this->uri->rsegment(3);
			$product = $this->products_model->get_info($id);
			if(!$product)
			{
				redirect();
			}
			// Thổng sản phẩm
			$quantity = 1;
			$price = $product->price;
			if($product->discount > 0)
			{
				$price = ($product->price) - ($product->discount);
			}
			// Thông tin thêm vào giỏ
			$data = array();
			$data['id']			= $product->id;
			$data['qty']		= $quantity;
			$data['name']		= url_title($product->name);
			$data['image_link'] = $product->image_link;
			$data['price']		= $price;
			$this->cart->insert($data);

			// chuyển hướng vào trang giỏ hàng khi thêm sp thành công	
			redirect($_SERVER['HTTP_REFERER']);
		}

		// Cập nhật giỏ hàng
		function update()
		{
			// Lay danh sách giỏ hàng
			$carts = $this->cart->contents();

			foreach($carts as $key => $row)
			{
				$total_qty = $this->input->post('qty_'.$row['id']);
				$data = array();
				$data['rowid'] = $key;
				$data['qty'] = $total_qty;
				$this->cart->update($data);
			}
			redirect(base_url('gio-hang'));
		}

		// Xóa sp trong giỏ
		function delete()
		{
			$id = $this->uri->rsegment(3);
			$id = intval($id);
			// trường hợp xóa 1 sp trong giỏ hàng
			if($id>0)
			{
				$carts = $this->cart->contents();
				foreach($carts as $key => $row)
				{
					if($row['id'] == $id)
					{
						$data = array();
						$data['rowid'] = $key;
						$data['qty'] = 0;
						$this->cart->update($data);
					}
				}
			}
			else
			{
				// xóa toàn bộ
				$this->cart->destroy();
			}
			redirect(base_url('gio-hang'));
		}

		/*
		* Hiển thị danh sách sản phẩm trong giỏ hàng
		*/
		function index()
		{
			// Lay danh sách giỏ hàng
			$carts = $this->cart->contents();
			
			// Tổng sp trong giỏ
			$total_items = $this->cart->total_items();

			$this->data['carts'] = $carts;
			$this->data['total_items'] = $total_items;

			//$this->data['temp'] = 'site/cart/index';
			$this->load->view('site/cart/index', $this->data);
		}
	}
?>