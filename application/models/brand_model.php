<?php

class Brand_model extends CI_Model{

	public function get_status(){

 	 $this->db->select('*');
  	 $this->db->from('status');
   	 $query = $this->db->get();
     return $query->result();

 	}

	public function brand_list( $limit, $offset){
		$query=$this->db
						->select('*')
						->from('brands')
						->join('status', 'status.active=brands.brand_status')
						->order_by('brand_id', 'DESC')
						->limit( $limit, $offset)
						->get();
		return $query->result();
	}

	public function search_brand($query){

		$query=$this->db
						->select('*')
						->from('brands')
						// ->where('brand_status', '1')
						->join('status', 'status.active=brands.brand_status')
						->like('brand_name', $query)
						->get();
		return $query->result();
	}	

	public function add_brand($insert){
		$this->db->insert('brands', $insert);
	}


	public function edit_brand($brand_id){

		$query = $this->db
					->select('*')
				 	->where('brand_id', $brand_id)
				 	->join('status', 'status.active=brands.brand_status')
				 	->get('brands');

		return $query->row();
	}

	public function update_brand($brand_id, Array $post){
		return $this->db
				->where('brand_id', $brand_id)
				->update('brands', $post);
	}


	public function close_brand($brand_id){
		return $this->db
				->where('brand_id', $brand_id)
				->delete('brands');
	}
}

?>