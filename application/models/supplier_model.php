<?php

class Supplier_model extends CI_Model{


	public function get_unit(){

 	 $this->db->select('*');
  	 $this->db->from('unit');
   	 $query = $this->db->get();
     return $query->result();

 	}

 	public function get_brands(){

 	 $this->db->select('*');
  	 $this->db->from('brands');
   	 $query = $this->db->get();
     return $query->result();

 	}



 	public function get_categories($brand_id){

 	 $this->db->select('*');
  	 $this->db->from('categories');
  	 $this->db->where('b_id', $brand_id);
   	 $query = $this->db->get();
     return $query->result();

 	}


	public function supplier_list( $limit, $offset){
		$query=$this->db
						->select('*')
						->from('supplier')
						->order_by('supplier_id', 'DESC')
						->limit( $limit, $offset)
						->get();
		return $query->result();
	}

	public function product_list( $supplier_id){
		$query=$this->db
						->select('*')
						->from('supplier')
						->where('supplier_id', $supplier_id)
						->join('product', 'product.s_id=supplier.supplier_id')
						->join('unit', 'unit.unit_id=product.u_id')
						->order_by('unit_name', 'ASC')
						// ->limit( $limit, $offset)
						->get();
		return $query->result();
	}


	public function search_supplier($query){

		$query=$this->db
						->select('*')
						->from('supplier')
						->like('supplier_name', $query)
						->get();
		return $query->result();
	}


	public function search_product($query){

		$query=$this->db
						->select('*')
						->from('product')
						->join('supplier', 'supplier.supplier_id=product.s_id')
						->join('unit', 'unit.unit_id=product.u_id')
						->like('product_name', $query)
						->get();
		return $query->result();
	}	

	public function add_supplier($insert){
		$this->db->insert('supplier', $insert);
	}


	public function include_product($insert){
		$this->db->insert('product', $insert);
	}


	public function edit_supplier($supplier_id){

		$query = $this->db
					->select('*')
				 	->where('supplier_id', $supplier_id)
				 	->get('supplier');

		return $query->row();
	}

	public function update_supplier($supplier_id, Array $post){
		return $this->db
				->where('supplier_id', $supplier_id)
				->update('supplier', $post);
	}


	public function edit_product($product_id){

		$query = $this->db
					->select('*')
				 	->where('product_id', $product_id)
				 	->join('unit', 'unit.unit_id=product.u_id')
				 	->get('product');

		return $query->row();
	}

	public function update_product($product_id, Array $post){
		return $this->db
				->where('product_id', $product_id)
				->update('product', $post);
	}


	public function close_supplier($supplier_id){
		return $this->db
				->where('supplier_id', $supplier_id)
				->delete('supplier');
	}

	public function close_product($product_id){
		return $this->db
				->where('product_id', $product_id)
				->delete('product');
	}
}

?>