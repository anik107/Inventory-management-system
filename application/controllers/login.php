<?php

class Login extends CI_Controller{

	public function index(){

		if($this->session->userdata('user_id'))
			return redirect('dashboard');

		$this->load->view('public/login');
	}

	public function admin_login(){

		
		
		if($this->form_validation->run('admin_login')){

			$username=$this->input->post('username');
			$password=md5($this->input->post('password'));
			
			$this->load->model('login_model');
			$login_id=$this->login_model->login_valid($username, $password);
			if($login_id){
				// echo "password match";
				$this->session->set_userdata('user_id', $login_id);
				return redirect('dashboard');
			}else{
				$this->session->set_flashdata('login_failed', 'Invalid Username or Password');
				return redirect ('login');
			}
		}else{
			
			$this->load->view('public/login');
		}
	}

	public function logout(){
		$this->session->unset_userdata('user_id');
		return redirect ('login');
	}
}


?>