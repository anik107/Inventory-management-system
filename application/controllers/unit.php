<?php

class Unit extends CI_Controller{
	public function index(){

		$query=$this->db->get('unit', '5', $this->uri->segment(3));
		$data['unit']=$query->result();
		$query2=$this->db->get('unit');
		$config=[

				'base_url' 			=> base_url('Unit/index'),
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
		$this->load->model('unit_model');
		$this->pagination->initialize($config);
		$unit=$this->unit_model->unit_list( $config['per_page'], $this->uri->segment(3));
		$this->load->view('admin/unit/unit_list', ['unit'=>$unit]);

	}

	
	public function add_unit(){

		$insert=array();

		$insert['unit_name']=$this->input->post('unit_name');
		
		unset($insert['submit']);

		$this->load->model('unit_model');
		if($this->unit_model->add_unit($insert)){
				// echo "insert successfull";
				$this->session->set_flashdata('feedback', "Brand Added Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
		}else{
				// echo "insert failed";
				$this->session->set_flashdata('feedback', "Brand Failed To Add, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('unit');
	}

	public function edit_unit($unit_id){

		$this->load->model('unit_model');
		$unit=$this->unit_model->edit_unit($unit_id);
		$this->load->view('admin/unit/edit_unit', ['unit'=>$unit]);

	}

	public function update_unit($unit_id){

		$post=$this->input->post();

		unset($post['submit']);

		$this->load->model('unit_model');
		if($this->unit_model->update_unit($unit_id, $post)){
				// echo "update successfull";
				$this->session->set_flashdata('feedback', "Brand Updated Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
		}else{
				// echo "update failed";
				$this->session->set_flashdata('feedback', "Brand Failed To Updated, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('unit');
	}
 


	public function search_unit(){

		$this->form_validation->set_rules('query', 'Query', 'required');
		if($this->form_validation->run()){

			$query=$this->input->post('query');
			$this->load->model('unit_model');
			$record=$this->unit_model->search_unit($query);
			$this->load->view('admin/unit/search_unit_result', ['record'=>$record]);

		}else{
			return redirect('unit');
		}

	}


	public function close_unit($unit_id){

		$this->load->model('unit_model');
		$this->unit_model->close_unit($unit_id);
	    redirect ('unit');
	}

}


?>