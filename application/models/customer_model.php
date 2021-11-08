<?php

class Customer_model extends CI_Model{


	public function customer_list( $limit, $offset){
		$query=$this->db
						->select('*')
						->from('customer')
						->order_by('customer_id', 'DESC')
						->limit( $limit, $offset)
						->get();
		return $query->result();
	}

	public function search_customer($query){

		$query=$this->db
						->select('*')
						->from('customer')
						->like('customer_name', $query)
						->get();
		return $query->result();
	}	

	public function add_customer($insert){
		$this->db->insert('customer', $insert);
	}


	public function edit_customer($customer_id){

		$query = $this->db
					->select('*')
				 	->where('customer_id', $customer_id)
				 	->get('customer');

		return $query->row();
	}

	public function update_customer($customer_id, Array $post){
		return $this->db
				->where('customer_id', $customer_id)
				->update('customer', $post);
	}


	public function close_customer($customer_id){
		return $this->db
				->where('customer_id', $customer_id)
				->delete('customer');
	}
}

?>