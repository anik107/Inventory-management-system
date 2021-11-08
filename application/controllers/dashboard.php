<?php

class Dashboard extends CI_Controller{
	
	public function index(){

		$this->load->model('dashboard_model');

				$total_brand=$this->dashboard_model->total_brand();
				$total_category=$this->dashboard_model->total_category();
				$total_product=$this->dashboard_model->total_product();
				$total_order=$this->dashboard_model->total_order();

		$this->load->view('admin/dashboard',['total_brand'=>$total_brand, 'total_category'=>$total_category, 'total_product'=>$total_product, 'total_order'=>$total_order]);
				
	}

}

?>