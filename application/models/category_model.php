<?php

class Category_model extends CI_Model{

	public function get_status(){

 	 $this->db->select('*');
  	 $this->db->from('status');
   	 $query = $this->db->get();
     return $query->result();

 	}


public function get_brands(){

 	 $this->db->select('*');
  	 $this->db->from('brands');
   	 $query = $this->db->get();
     return $query->result();

 	}



	public function category_list( $limit, $offset){
		$query=$this->db
						->select('*')
						->from('categories')
						->join('status','status.active=categories.categories_status')
						->join('brands','brands.brand_id=categories.b_id')
						->order_by('categories_id','DESC')
						->limit($limit,$offset)
						->get();
		return $query->result();
	}

	public function search_category($query){

		$query=$this->db
						->select('*')
						->from('categories')
						// ->where('categories_status','1')
						->join('status','status.active=categories.categories_status')
						->join('brands','brands.brand_id=categories.b_id')

						->like('categories_name',$query)
						->get();
		return $query->result();
	}	

	public function add_category($insert){
		$this->db->insert('categories', $insert);
	}


	public function edit_category($category_id){

		$query = $this->db
					->select('*')
				 	->where('categories_id', $category_id)
				 	->join('status', 'status.active=categories.categories_status')
				 	->join('brands','brands.brand_id=categories.b_id')
				 	->get('categories');

		return $query->row();
	}

	public function update_category($category_id, Array $post){
		return $this->db
				->where('categories_id', $category_id)
				->update('categories', $post);
	}


	public function close_category($category_id){
		return $this->db
				->where('categories_id', $category_id)
				->delete('categories');
	}
}

?>