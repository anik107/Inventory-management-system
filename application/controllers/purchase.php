<?php

class Purchase extends CI_Controller{
	public function index(){

		$query=$this->db->get('purchase', '5', $this->uri->segment(3));
		$data['purchase']=$query->result();
		$query2=$this->db->get('purchase');
		$config=[

				'base_url' 			=> base_url('Purchase/index'),
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
		$this->load->model('purchase_model');
		$this->pagination->initialize($config);
		$product=$this->purchase_model->product_list( $config['per_page'], $this->uri->segment(3));
		$product_status=$this->purchase_model->get_status();
		$unit_name=$this->purchase_model->get_unit();
		$suppliers=$this->purchase_model->get_suppliers();
		
		$this->load->view('admin/purchase/product_list', ['product'=>$product,'product_status'=>$product_status, 'suppliers'=>$suppliers, 'unit_name'=>$unit_name]);

	}

	public function purchase_product(){

		$this->load->model('purchase_model');

		$product_status=$this->purchase_model->get_status();
		$unit_name=$this->purchase_model->get_unit();
		$suppliers=$this->purchase_model->get_suppliers();

		$this->load->view('admin/purchase/purchase_product', ['product_status'=>$product_status, 'suppliers'=>$suppliers, 'unit_name'=>$unit_name]);
	}

	public function get_product(){

		$supplier_id=$this->input->post('supplier_id');
		$this->load->model('purchase_model');
		$product=$this->purchase_model->get_product($supplier_id);
		if(count($product)>0){

			$pro_select_box ='';
			$pro_select_box .='<option value="">Select Product</option>';
			foreach ($product as $product) {
				$pro_select_box .='<option value="'.$product->product_id.'">'.$product->product_name.'______'.'['.$product->brand_name.']'.'['.$product->categories_name.']'.'</option>';
			}
			echo json_encode($pro_select_box);
		}
	}



	
	public function add_product(){
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

			$this->load->model('purchase_model');
			if($this->purchase_model->add_product($post)){
				// echo "insert successfull";
				$this->session->set_flashdata('feedback', "User Added Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
			}else{
				// echo "insert failed";
				$this->session->set_flashdata('feedback', "User Failed To Add, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('purchase');
		}else{
			$post=$this->input->post();
			unset($post['submit']);

			$this->load->model('purchase_model');
			if($this->purchase_model->add_product($post)){
				// echo "insert successfull";
				$this->session->set_flashdata('feedback', "User Added Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
			}else{
				// echo "insert failed";
				$this->session->set_flashdata('feedback', "User Failed To Add, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('purchase');
		}
	}

	public function edit_product($purchase_id){

		$this->load->model('purchase_model');
		$product=$this->purchase_model->edit_product($purchase_id);
		$product_status=$this->purchase_model->get_status();
		$suppliers=$this->purchase_model->get_suppliers();
		$unit_name=$this->purchase_model->get_unit();
		
		
		$this->load->view('admin/purchase/edit_product', ['product'=>$product, 'product_status'=>$product_status, 'suppliers'=>$suppliers, 'unit_name'=>$unit_name]);

	}


		public function update_product($purchase_id){
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

			$this->load->model('purchase_model');
			if($this->purchase_model->update_product($purchase_id, $post)){
				// echo "insert successfull";
				$this->session->set_flashdata('feedback', "User Added Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
			}else{
				// echo "insert failed";
				$this->session->set_flashdata('feedback', "User Failed To Add, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('purchase');
		}else{
			$post=$this->input->post();
			unset($post['submit']);

			$this->load->model('purchase_model');
			if($this->purchase_model->update_product($purchase_id, $post)){
				// echo "insert successfull";
				$this->session->set_flashdata('feedback', "User Added Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
			}else{
				// echo "insert failed";
				$this->session->set_flashdata('feedback', "User Failed To Add, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('purchase');
		}
	}
 


	public function search_product(){

		$this->form_validation->set_rules('query', 'Query', 'required');
		if($this->form_validation->run()){

			$query=$this->input->post('query');
			$this->load->model('purchase_model');
			$record=$this->purchase_model->search_product($query);
			$this->load->view('admin/purchase/search_product_result', ['record'=>$record]);

		}else{
			return redirect('purchase');
		}

	}


	public function close_product($purchase_id){

		$this->load->model('purchase_model');
		$this->purchase_model->close_product($purchase_id);
	    redirect ('purchase');
	}

}


?>