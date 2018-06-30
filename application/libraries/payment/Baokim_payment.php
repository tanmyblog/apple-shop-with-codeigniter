<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Baokim_payment{
		var $CI = '';
		var $data = array();

		//Thông số cài đặt payment
		var $code 	 = 'baokim';
		var $setting = array(
			'business'		=> 'kd.aigapa@gmail.com',
			'merchant_id'	=> '33569',
			'secure_pass'	=> '00110e9bf626e72a',
			'cost_constant'	=> 1700,
			'cost_percent'	=> 1,
		);

		// các biến giao tiếp của payment
		var $url = 'https://www.baokim.vn/payment/customize_payment/order';
		var $ip = array('201.245.80.14', '210.245.83.89', '210.245.83.94', '42.112.21.10', '210.245.83.90', '210.245.80.104', '210.245.88.180', '210.245.83.82', '210.245.83.87');

		public function __construct()
		{
			$this->CI =& get_instance();
		}

		/* Chuyển đến payment
		* $tran_id: id của bảng transaction, cho biết thanh toán giao dịch nào trên website
		* $amount: cột amount trong bảng transaction, là số tiền khách cần thanh toán,
		* $return_url: link trả về khi thanh toán thành công hay hủy bỏ.
		*/
		function payment($tran_id, $amount, $return_url)	
		{
			$tran_info = 'Thanh toán đơn hàng '.$tran_id;

			$url = array();
			$url['success'] = $return_url;
			$url['cancel'] 	= $return_url;
			$url['detail'] 	= $return_url;
				
			$url = $this->createRequestUrl($tran_id, $this->setting['business'], $amount, '', '', $tran_info, $return_url, $return_url, $return_url);
			redirect($url);
		}

		// xử lý kết quả trả về từ payment
		function result($tran_id, $amount)
		{
			// Lưu dữ liệu trả về, lưu vào cột payment_info trong giỏ bảng transaction
			$result = $this->CI->input->post();
			$this->CI->load->model('transaction_model');
			$data = array();
			$data['payment_info'] = serialize($result);
			$this->CI->transaction_model->update($tran_id, $data);

			// Nếu link user chuyển về từ bảo kim s khi thanh toán thành công
			if(!$this->CI->input->post('order_id'))
			{
				return NULL;
			}

			// Kiểm tra ip
			if($this->ip != $this->CI->input->ip_address())
			{
				return FALSE;
			}

			// kiểm tra mã số giao dịch
			if($tran_id != $this->CI->input->post('order_id'))
			{
				return FALSE;
			}

			// kiểm tra amount
			$amount_pay = floatval($this->CI->input->post('total_amount'));
			$amount = floatval($amount);
			if($amount_pay < $amount)
			{
				return FALSE;
			}

			// kiểm tra trạng thái giao dịch
			if($this->CI->input->post('transaction_status') != 4)
			{
				return NULL;
			}

			return TRUE;
		}

		// lấy tran_id từ kết quả trả về của bảo kim
		function checkout_result_get_tran_id(&$security='')
		{
			$tran_id = $this->CI->input->post('order_id');
			return $tran_id;
		}

		/**
		 * Hàm xây dựng url chuyển đến BaoKim.vn thực hiện thanh toán, trong đó có tham số mã hóa (còn gọi là public key)
		 * @param $order_id				Mã đơn hàng
		 * @param $business 			Email tài khoản người bán
		 * @param $total_amount			Giá trị đơn hàng
		 * @param $shipping_fee			Phí vận chuyển
		 * @param $tax_fee				Thuế
		 * @param $order_description	Mô tả đơn hàng
		 * @param $url_success			Url trả về khi thanh toán thành công
		 * @param $url_cancel			Url trả về khi hủy thanh toán
		 * @param $url_detail			Url chi tiết đơn hàng
		 * @return url cần tạo
		 */
		private function createRequestUrl($order_id, $business, $total_amount, $shipping_fee, $tax_fee, $order_description, $url_success, $url_cancel, $url_detail)
		{
			// Mảng các tham số chuyển tới baokim.vn
			$params = array(
				'merchant_id'		=>	strval($this->setting['merchant_id']),
				'order_id'			=>	strval($order_id),
				'business'			=>	strval($business),
				'total_amount'		=>	strval($total_amount),
				'shipping_fee'		=>  strval($shipping_fee),
				'tax_fee'			=>  strval($tax_fee),
				'order_description'	=>	strval($order_description),
				'url_success'		=>	strtolower($url_success),
				'url_cancel'		=>	strtolower($url_cancel),
				'url_detail'		=>	strtolower($url_detail)
			);
			ksort($params);
			
			$str_combined = $this->setting['secure_pass'].implode('', $params);
			$params['checksum'] = strtoupper(md5($str_combined));
			
			//Kiểm tra  biến $redirect_url xem có '?' không, nếu không có thì bổ sung vào
			$redirect_url = $this->url;
			if (strpos($redirect_url, '?') === false)
			{
				$redirect_url .= '?';
			}
			else if (substr($redirect_url, strlen($redirect_url)-1, 1) != '?' && strpos($redirect_url, '&') === false)
			{
				// Nếu biến $redirect_url có '?' nhưng không kết thúc bằng '?' và có chứa dấu '&' thì bổ sung vào cuối
				$redirect_url .= '&';			
			}
					
			// Tạo đoạn url chứa tham số
			$url_params = '';
			foreach ($params as $key=>$value)
			{
				if ($url_params == '')
					$url_params .= $key . '=' . urlencode($value);
				else
					$url_params .= '&' . $key . '=' . urlencode($value);
			}
			return $redirect_url.$url_params;
		}

		/**
		 * Hàm thực hiện xác minh tính chính xác thông tin trả về từ BaoKim.vn
		 * @param $data chứa tham số trả về trên url
		 * @return true nếu thông tin là chính xác, false nếu thông tin không chính xác
		 */
		private function verifyResponseUrl($data = array())
		{
			$checksum = $data['checksum'];
			unset($data['checksum']);
			
			ksort($data);
			$str_combined = $this->setting['secure_pass'].implode('', $data);

	        // Mã hóa các tham số
			$verify_checksum = strtoupper(md5($str_combined));
			
			// Xác thực mã của chủ web với mã trả về từ baokim.vn
			if ($verify_checksum === $checksum) 
				return true;
			
			return false;
		}
	}
?>