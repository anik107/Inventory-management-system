<?php

class Unit_model extends CI_Model{

	public function unit_list( $limit, $offset){
		$query=$this->db
						->select('*')
						->from('unit')
						->order_by('unit_id', 'DESC')
						->limit( $limit, $offset)
						->get();
		return $query->result();
	}

	public function search_unit($query){

		$query=$this->db
						->select('*')
						->from('unit')
						->like('unit_name', $query)
						->get();
		return $query->result();
	}	

	public function add_unit($insert){
		$this->db->insert('unit', $insert);
	}


	public function edit_unit($unit_id){

		$query = $this->db
					->select('*')
				 	->where('unit_id', $unit_id)
				 	->get('unit');

		return $query->row();
	}

	public function update_unit($unit_id, Array $post){
		return $this->db
				->where('unit_id', $unit_id)
				->update('unit', $post);
	}


	public function close_unit($unit_id){
		return $this->db
				->where('unit_id', $unit_id)
				->delete('unit');
	}
}

?>