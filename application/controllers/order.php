<?php

class Order extends CI_Controller{
	public function index(){

		$query=$this->db->get('orders', '5', $this->uri->segment(3));
		$data['orders']=$query->result();
		$query2=$this->db->get('orders');
		$config=[

				'base_url' 			=> base_url('order/index'),
				'total_rows' 		=> $query2->num_rows(), 
				'per_page' 			=> 5, 
				'full_tag_open' 	=> "<ul class='pagination'>",
				'full_tag_close'	=> "</ul>",
				'first_tag_open' 	=> "<li>",
				'first_tag_close'	=> "</li>",
				'last_tag_open' 	=> "<li>",
				'last_tag_close'	=> "</li>",
				'next_tag_open' 	=> "<li>",
				'next_tag_close'	=> "</li>",
				'prev_tag_open' 	=> "<li>",
				'prev_tag_close'	=> "</li>",
				'num_tag_open' 		=> "<li>",
				'num_tag_close'		=> "</li>",
				'cur_tag_open'		=> "<li class = 'active'><a>",
				'cur_tag_close'		=> "</a></li>",
		];
		$this->load->model('order_model');
		$this->pagination->initialize($config);
		$orders=$this->order_model->order_list( $config['per_page'], $this->uri->segment(3));
		$product_status=$this->order_model->get_status();
		$brand_name=$this->order_model->get_brands();
		$unit_name=$this->order_model->get_unit();
		$customer=$this->order_model->get_customer();
		
		$this->load->view('admin/order/order_list', ['orders'=>$orders,'brand_name'=>$brand_name,'product_status'=>$product_status, 'customer'=>$customer, 'unit_name'=>$unit_name]);

	}



	public function get_product(){

		$categories_id=$this->input->post('categories_id');
		$this->load->model('order_model');
		$product=$this->order_model->get_product($categories_id);
		if(count($product)>0){

			$pro_select_box ='';
			$pro_select_box .='<option value="">Select Product</option>';
			foreach ($product as $product) {
				$pro_select_box .='<option value="'.$product->product_id.'">'.$product->product_name.'_____'.'['.$product->buy_rate.'-'.$product->unit_name.']'.'__'.'['.$product->sales_rate.'-'.$product->unit_name.']'.'</option>';
			}
			echo json_encode($pro_select_box);
		}
	}

	public function get_categories(){

		$brand_id=$this->input->post('brand_id');
		$this->load->model('order_model');
		$category=$this->order_model->get_categories($brand_id);
		if(count($category)>0){

			$pro_select_box ='';
			$pro_select_box .='<option value="">Select Product</option>';
			foreach ($category as $category) {
				$pro_select_box .='<option value="'.$category->categories_id.'">'.$category->categories_name.'</option>';
			}
			echo json_encode($pro_select_box);
		}
	}

	
	public function sell_product($purchase_id){

		$this->load->model('purchase_model');
		$this->load->model('order_model');
		$product=$this->purchase_model->edit_product($purchase_id);
		$product_status=$this->purchase_model->get_status();
		$suppliers=$this->purchase_model->get_suppliers();
		$unit_name=$this->purchase_model->get_unit();
		$customer=$this->order_model->get_customer();
		
		$this->load->view('admin/order/sell_product', ['product'=>$product, 'product_status'=>$product_status, 'suppliers'=>$suppliers, 'unit_name'=>$unit_name, 'customer'=>$customer]);

	}


	public function sells_Product($purchase_id){

			
			$insert=array();
			$update=array();

			$insert['bill_no']=$this->input->post('bill_no');
			$insert['customer_id']=$this->input->post('customer_id');
			$insert['p_id']=$this->input->post('p_id');
			$insert['product']=$this->input->post('product');
			$insert['brand']=$this->input->post('brand');
			$insert['category']=$this->input->post('category');
			$insert['unit_id']=$this->input->post('unit_id');
			$insert['rate']=$this->input->post('rate');
			$insert['quantity']=$this->input->post('quantity');
			$insert['order_status']=$this->input->post('order_status');
			$insert['total']=$this->input->post('total');
			$insert['vat']=$this->input->post('vat');
			$insert['grand_total']=$this->input->post('grand_total');
			$insert['discount']=$this->input->post('discount');
			$insert['payment']=$this->input->post('payment');
			$insert['due']=$this->input->post('due');
			$insert['description']=$this->input->post('description');

			$p_id=$this->input->post('p_id');
			$update['quantity']=$this->input->post('purchase_quantity');

			unset($post['submit']);

			$this->load->model('order_model');
			if($this->order_model->sales_product($insert, $update, $p_id)){
				// echo "insert successfull";
				$this->session->set_flashdata('feedback', "User Added Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
			}else{
				// echo "insert failed";
				$this->session->set_flashdata('feedback', "User Failed To Add, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('order');
		
	}

	public function edit_product($order_id){

		$this->load->model('order_model');
		$product=$this->order_model->edit_product($order_id);
		$product_status=$this->order_model->get_status();
		$brand_name=$this->order_model->get_brands();
		$customer=$this->order_model->get_customer();
		$unit_name=$this->order_model->get_unit();
		
		
		$this->load->view('admin/order/edit_order', ['product'=>$product,'brand_name'=>$brand_name, 'product_status'=>$product_status, 'customer'=>$customer, 'unit_name'=>$unit_name]);

	}


		public function update_product($order_id){
		$config=[
				'upload_path'	=> './uploads',
				'allowed_types'	=> 'jpg|jpeg|gif|png'
				];

		$this->load->library('upload', $config);

		if($this->upload->do_upload('img_path')){
			$post=$this->input->post();
			unset($post['submit']);

			$data=$this->upload->data();
			$image_path=base_url("uploads/". $data['raw_name'].$data['file_ext']);
			// echo $image_path;
			$post['img_path']=$image_path;

			$this->load->model('order_model');
			if($this->order_model->update_product($order_id, $post)){
				// echo "insert successfull";
				$this->session->set_flashdata('feedback', "User Added Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
			}else{
				// echo "insert failed";
				$this->session->set_flashdata('feedback', "User Failed To Add, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('order');
		}else{
			$post=$this->input->post();
			unset($post['submit']);

			$this->load->model('order_model');
			if($this->order_model->update_product($order_id, $post)){
				// echo "insert successfull";
				$this->session->set_flashdata('feedback', "User Added Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
			}else{
				// echo "insert failed";
				$this->session->set_flashdata('feedback', "User Failed To Add, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('order');
		}
	}
 


	public function search_product(){

		$this->form_validation->set_rules('query', 'Query', 'required');
		if($this->form_validation->run()){

			$query=$this->input->post('query');
			$this->load->model('order_model');
			$record=$this->order_model->search_product($query);
			$this->load->view('admin/order/search_order_result', ['record'=>$record]);

		}else{
			return redirect('order');
		}

	}


	public function close_product($order_id){

		$this->load->model('order_model');
		$this->order_model->close_order($order_id);
	    redirect ('order');
	}

}


?>