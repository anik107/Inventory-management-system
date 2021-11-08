<?php

class Dashboard_model extends CI_Model
{
	public function total_brand(){

		$q=$this->db->select(['*', 'count(*) as total_brand'])
				 ->from('brands')
				 ->get();
		return $q->result();

	}

	public function total_category(){

		$q=$this->db->select(['*', 'count(*) as total_category'])
				 ->from('categories')
				 ->get();
		return $q->result();

	}

	public function total_product(){

		$q=$this->db->select(['*', 'count(*) as total_product'])
				 ->from('purchase')
				 ->get();
		return $q->result();

	}

	public function total_order(){

		$q=$this->db->select(['*', 'count(*) as total_order'])
				 ->from('orders')
				 ->get();
		return $q->result();

	}
	
}


?>