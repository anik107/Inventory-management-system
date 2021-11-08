<?php

class Brand extends CI_Controller{
	public function index(){

		$query=$this->db->get('brands', '5', $this->uri->segment(3));
		$data['brands']=$query->result();
		$query2=$this->db->get('brands');
		$config=[

				'base_url' 			=> base_url('Brand/index'),
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
		$this->load->model('brand_model');
		$this->pagination->initialize($config);
		$brands=$this->brand_model->brand_list( $config['per_page'], $this->uri->segment(3));
		$brand_status=$this->brand_model->get_status();
		$this->load->view('admin/brand/brand_list', ['brands'=>$brands, 'brand_status'=>$brand_status]);

	}

	
	public function add_brand(){

		$insert=array();

		$insert['brand_name']=$this->input->post('brand_name');
		$insert['brand_status']=$this->input->post('brand_status');

		unset($insert['submit']);

		$this->load->model('brand_model');
		if($this->brand_model->add_brand($insert)){
				// echo "insert successfull";
				$this->session->set_flashdata('feedback', "Brand Added Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
		}else{
				// echo "insert failed";
				$this->session->set_flashdata('feedback', "Brand Failed To Add, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('brand');
	}

	public function edit_brand($brand_id){

		$this->load->model('brand_model');
		$brand=$this->brand_model->edit_brand($brand_id);
		$brand_status=$this->brand_model->get_status();
		$this->load->view('admin/brand/edit_brand', ['brand'=>$brand, 'brand_status'=>$brand_status]);

	}

	public function update_brand($brand_id){

		$post=$this->input->post();

		unset($post['submit']);

		$this->load->model('brand_model');
		if($this->brand_model->update_brand($brand_id, $post)){
				// echo "update successfull";
				$this->session->set_flashdata('feedback', "Brand Updated Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
		}else{
				// echo "update failed";
				$this->session->set_flashdata('feedback', "Brand Failed To Updated, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('brand');
	}
 


	public function search_brand(){

		$this->form_validation->set_rules('query', 'Query', 'required');
		if($this->form_validation->run()){

			$query=$this->input->post('query');
			$this->load->model('brand_model');
			$record=$this->brand_model->search_brand($query);
			$this->load->view('admin/brand/search_brand_result', ['record'=>$record]);

		}else{
			return redirect('brand');
		}

	}


	public function close_brand($brand_id){

		$this->load->model('brand_model');
		$this->brand_model->close_brand($brand_id);
	    redirect ('brand');
	}

}


?>