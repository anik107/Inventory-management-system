<?php

class Customer extends CI_Controller{
	public function index(){

		$query=$this->db->get('customer', '5', $this->uri->segment(3));
		$data['customer']=$query->result();
		$query2=$this->db->get('customer');
		$config=[

				'base_url' 			=> base_url('Customer/index'),
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
		$this->load->model('customer_model');
		$this->pagination->initialize($config);
		$customer=$this->customer_model->customer_list( $config['per_page'], $this->uri->segment(3));
		$this->load->view('admin/customer/customer_list', ['customer'=>$customer]);

	}

	
	public function add_customer(){

		$insert=array();

		$insert['customer_name']=$this->input->post('customer_name');
		$insert['address']=$this->input->post('address');
		$insert['email']=$this->input->post('email');
		$insert['contact_no']=$this->input->post('contact_no');

		unset($insert['submit']);

		$this->load->model('customer_model');
		if($this->customer_model->add_customer($insert)){
				// echo "insert successfull";
				$this->session->set_flashdata('feedback', "Brand Added Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
		}else{
				// echo "insert failed";
				$this->session->set_flashdata('feedback', "Brand Failed To Add, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('customer');
	}

	public function edit_customer($customer_id){

		$this->load->model('customer_model');
		$customer=$this->customer_model->edit_customer($customer_id);
		$this->load->view('admin/customer/edit_customer', ['customer'=>$customer]);

	}

	public function update_customer($customer_id){

		$post=$this->input->post();

		unset($post['submit']);

		$this->load->model('customer_model');
		if($this->customer_model->update_customer($customer_id, $post)){
				// echo "update successfull";
				$this->session->set_flashdata('feedback', "Brand Updated Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
		}else{
				// echo "update failed";
				$this->session->set_flashdata('feedback', "Brand Failed To Updated, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('customer');
	}
 


	public function search_customer(){

		$this->form_validation->set_rules('query', 'Query', 'required');
		if($this->form_validation->run()){

			$query=$this->input->post('query');
			$this->load->model('customer_model');
			$record=$this->customer_model->search_customer($query);
			$this->load->view('admin/customer/search_customer_result', ['record'=>$record]);

		}else{
			return redirect('customer');
		}

	}


	public function close_customer($customer_id){

		$this->load->model('customer_model');
		$this->customer_model->close_customer($customer_id);
	    redirect ('customer');
	}

}


?>