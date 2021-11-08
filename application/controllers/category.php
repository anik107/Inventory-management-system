<?php

class Category extends CI_Controller{
	public function index(){

		$query=$this->db->get('categories', '5', $this->uri->segment(3));
		$data['categories']=$query->result();
		$query2=$this->db->get('categories');
		$config=[

				'base_url' 			=> base_url('Category/index'),
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
		$this->load->model('category_model');
		$this->pagination->initialize($config);
		$category=$this->category_model->category_list( $config['per_page'], $this->uri->segment(3));
		$category_status=$this->category_model->get_status();
		$brand_name=$this->category_model->get_brands();
		$this->load->view('admin/category/category_list', ['categories'=>$category, 'category_status'=>$category_status,'brand_name'=>$brand_name]);

	}

	
	public function add_category(){

		$insert=array();

		$insert['categories_name']=$this->input->post('categories_name');
		$insert['categories_status']=$this->input->post('categories_status');
		$insert['b_id']=$this->input->post('b_id');


		unset($insert['submit']);

		$this->load->model('category_model');
		if($this->category_model->add_category($insert)){
				// echo "insert successfull";
				$this->session->set_flashdata('feedback', "category Added Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
		}else{
				// echo "insert failed";
				$this->session->set_flashdata('feedback', "category Failed To Add, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('category');
	}

	public function edit_category($category_id){

		$this->load->model('category_model');
		$category=$this->category_model->edit_category($category_id);
		$category_status=$this->category_model->get_status();
		$brand_name=$this->category_model->get_brands();
		$this->load->view('admin/category/edit_category', ['category'=>$category,'brand_name'=>$brand_name, 'category_status'=>$category_status]);

	}

	public function update_category($category_id){

		$post=$this->input->post();

		unset($post['submit']);

		$this->load->model('category_model');
		if($this->category_model->update_category($category_id, $post)){
				// echo "update successfull";
				$this->session->set_flashdata('feedback', "Category Updated Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
		}else{
				// echo "update failed";
				$this->session->set_flashdata('feedback', "Category Failed To Updated, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('category');
	}
 


	public function search_category(){

		$this->form_validation->set_rules('query', 'Query', 'required');
		if($this->form_validation->run()){

			$query=$this->input->post('query');
			$this->load->model('category_model');
			$record=$this->category_model->search_category($query);
			$this->load->view('admin/category/search_category_result', ['record'=>$record]);

		}else{
			return redirect('category');
		}

	}


	public function close_category($category_id){

		$this->load->model('category_model');
		$this->category_model->close_category($category_id);
	    redirect ('category');
	}

}


?>