<?php

class register extends CI_controller
{


	public function index()
	{
		$this->load->view('public/register');
	}

	public function admin_registration()
	{
		$insert=array();

		$insert['username']=$this->input->post('username');
		$insert['email']=$this->input->post('email');
		$insert['password']=md5($this->input->post('password'));
		
		unset($insert['submit']);

		$this->load->model('register_model');
		if($this->register_model->add_user($insert)){
				// echo "insert successfull";
				$this->session->set_flashdata('feedback', "User Added Successfully");
				$this->session->set_flashdata('feedback_class', 'alert-success');
		}else{
				// echo "insert failed";
				$this->session->set_flashdata('feedback', "User Failed To Add, Please Try Again.");
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}

			return redirect ('login');
	}
}
?>