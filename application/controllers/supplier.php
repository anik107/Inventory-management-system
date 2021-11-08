<?php

class Supplier extends CI_Controller{

	public function index(){

		$query=$this->db->get('supplier', '5', $this->uri->segment(3));
		$data['supplier']=$query->result();
		$query2=$this->db->get('supplier');
		$config=[

				'base_url' 			=> base_url('Supplier/index'),
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
		$this->load->model('supplier_model');
		$this->pagination->initialize($config);
		$supplier=$this->supplier_model->supplier_list( $config['per_page'], $this->uri->segment(3));
		$this->load->view('admin/supplier/supplier_list', ['supplier'=>$supplier]);

	}

	public function product_list($supplier_id){

		$query=$this->db->get('supplier', '5', $this->uri->segment(3));
		$data['product']=$query->result();
		$query2=$this->db->get('supplier');
		$config=[

				'base_url' 			=> base_url('Supplier/product_list'),
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
		$this->load->model('supplier_model');
		$this->pagination->initialize($config);
		$product=$this->supplier_model->product_list($supplier_id, $config['per_page'], $this->uri->segment(3));
		$this->load->view('admin/supplier/product_list', ['product'=>$product]);

	}

	public function get_categories(){

		$brand_id=$this->input->post('brand_id');
		$this->load->model('supplier_model');
		$category=$this->supplier_model->get_categories($brand_id);
		if(count($category)>0){

			$pro_select_box ='';
			$pro_select_box .='<option value="">Select Product</option>';
			foreach ($category as $category) {
				$pro_select_box .='<option value="'.$category->categories_id.'">'.$category->categories_name.'</option>';
			}
			echo json_encode($pro_select_box);
		}
	}

	
	public function add_supplier(){

		$insert=array();

		$insert['supplier_name']=$this->input->post('supplier_name');
		$insert['company_name']=$this->input->post('company_name');
		$insert['address']=$this->input->post('address');
		$insert['email']=$this->input->post('email');
		$insert['contact_no']=$this->input->post('contact_no');

		unset($insert['submit']);

		$this->load->model('supplier_model');
		if($this->supplier_model->add_supplier($insert)){
				// echo "insert successfull";
				$this->session->set_flashdata('feedback', "Brand Added Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
		}else{
				// echo "insert failed";
				$this->session->set_flashdata('feedback', "Brand Failed To Add, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('supplier');
	}

	public function new_supplier(){

		$insert=array();

		$insert['supplier_name']=$this->input->post('supplier_name');
		$insert['company_name']=$this->input->post('company_name');
		$insert['address']=$this->input->post('address');
		$insert['email']=$this->input->post('email');
		$insert['contact_no']=$this->input->post('contact_no');

		unset($insert['submit']);

		$this->load->model('supplier_model');
		if($this->supplier_model->add_supplier($insert)){
				// echo "insert successfull";
				$this->session->set_flashdata('feedback', "Brand Added Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
		}else{
				// echo "insert failed";
				$this->session->set_flashdata('feedback', "Brand Failed To Add, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('purchase/purchase_product');
	}

	public function edit_supplier($supplier_id){

		$this->load->model('supplier_model');
		$supplier=$this->supplier_model->edit_supplier($supplier_id);
		$this->load->view('admin/supplier/edit_supplier', ['supplier'=>$supplier]);

	}

	public function update_supplier($supplier_id){

		$post=$this->input->post();

		unset($post['submit']);

		$this->load->model('supplier_model');
		if($this->supplier_model->update_supplier($supplier_id, $post)){
				// echo "update successfull";
				$this->session->set_flashdata('feedback', "Brand Updated Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
		}else{
				// echo "update failed";
				$this->session->set_flashdata('feedback', "Brand Failed To Updated, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('supplier');
	}


	public function add_product($supplier_id){

		$this->load->model('supplier_model');
		$supplier=$this->supplier_model->edit_supplier($supplier_id);
		$brand_name=$this->supplier_model->get_brands();
		// $categories_name=$this->supplier_model->get_categories();
		$unit_name=$this->supplier_model->get_unit();
		$this->load->view('admin/supplier/add_product', ['supplier'=>$supplier, 'unit_name'=>$unit_name, 'brand_name'=>$brand_name]);

	}




	public function include_product(){

		$insert=array();

		$insert['s_id']=$this->input->post('s_id');
		$insert['b_id']=$this->input->post('b_id');
		$insert['c_id']=$this->input->post('c_id');
		$insert['product_name']=$this->input->post('product_name');
		$insert['u_id']=$this->input->post('u_id');
		
		unset($insert['submit']);

		$this->load->model('supplier_model');
		if($this->supplier_model->include_product($insert)){
				// echo "insert successfull";
				$this->session->set_flashdata('feedback', "Brand Added Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
		}else{
				// echo "insert failed";
				$this->session->set_flashdata('feedback', "Brand Failed To Add, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('supplier');
	}



	public function edit_product($product_id){

		$this->load->model('supplier_model');
		$supplier=$this->supplier_model->edit_product($product_id);
		$unit_name=$this->supplier_model->get_unit();
		$this->load->view('admin/supplier/edit_product', ['supplier'=>$supplier, 'unit_name'=>$unit_name]);

	}

	public function update_product($product_id){

		$post=$this->input->post();

		unset($post['submit']);

		$this->load->model('supplier_model');
		if($this->supplier_model->update_product($product_id, $post)){
				// echo "update successfull";
				$this->session->set_flashdata('feedback', "Brand Updated Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
		}else{
				// echo "update failed";
				$this->session->set_flashdata('feedback', "Brand Failed To Updated, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('supplier');
	}
 


	public function search_supplier(){

		$this->form_validation->set_rules('query', 'Query', 'required');
		if($this->form_validation->run()){

			$query=$this->input->post('query');
			$this->load->model('supplier_model');
			$record=$this->supplier_model->search_supplier($query);
			$this->load->view('admin/supplier/search_supplier_result', ['record'=>$record]);

		}else{
			return redirect('supplier');
		}

	}


	public function search_product(){

		$this->form_validation->set_rules('query', 'Query', 'required');
		if($this->form_validation->run()){

			$query=$this->input->post('query');
			$this->load->model('supplier_model');
			$record=$this->supplier_model->search_product($query);
			$this->load->view('admin/supplier/search_product_result', ['record'=>$record]);

		}else{
			return redirect('supplier');
		}

	}


	public function close_supplier($supplier_id){

		$this->load->model('supplier_model');
		$this->supplier_model->close_supplier($supplier_id);
	    redirect ('supplier');
	}

	public function close_product($product_id){

		$this->load->model('supplier_model');
		$this->supplier_model->close_product($product_id);
	    redirect ('supplier');
	}

}


?>