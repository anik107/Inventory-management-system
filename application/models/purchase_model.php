<?php

class Purchase_model extends CI_Model{

	public function get_status(){

 	 $this->db->select('*');
  	 $this->db->from('status');
   	 $query = $this->db->get();
     return $query->result();

 	}



 	public function get_suppliers(){

 	 $this->db->select('*');
  	 $this->db->from('supplier');
   	 $query = $this->db->get();
     return $query->result();

 	}


 	public function get_product($supplier_id){

 	 $this->db->select('*');
  	 $this->db->from('product');
  	 $this->db->join('brands', 'brands.brand_id=product.b_id');
  	 $this->db->join('categories', 'categories.categories_id=product.c_id');
  	 $this->db->where('s_id', $supplier_id);
   	 $query = $this->db->get();
     return $query->result();
 	}


 	public function get_unit(){

 	 $this->db->select('*');
  	 $this->db->from('unit');
   	 $query = $this->db->get();
     return $query->result();

 	}



	public function product_list( $limit, $offset){
		
		$query=$this->db
						->select('*')
						->from('purchase')
						->where('quantity >', 0)
						->join('status', 'status.active=purchase.status')
						->join('supplier','supplier.supplier_id=purchase.supplier_id', 'LEFT')
						->join('product','product.product_id=purchase.product_id', 'LEFT')
						->join('brands','brands.brand_id=product.b_id', 'LEFT')
						->join('categories','categories.categories_id=product.c_id', 'LEFT')
						->join('unit','unit.unit_id=purchase.unit_id', 'LEFT')
						->order_by('purchase_id', 'DESC')
						->limit( $limit, $offset)
						->get();
		return $query->result();
	}

	

	public function search_product($query){

		$query=$this->db
						->select('*')
						->from('purchase')
						->join('status', 'status.active=purchase.status')
						->join('supplier','supplier.supplier_id=purchase.supplier_id', 'LEFT')
						->join('product','product.product_id=purchase.product_id', 'LEFT')
						->join('brands','brands.brand_id=product.b_id', 'LEFT')
						->join('categories','categories.categories_id=product.c_id', 'LEFT')
						->join('unit','unit.unit_id=purchase.unit_id', 'LEFT')
						->like('product_name', $query)
						->get();
		return $query->result();
	}	

	public function add_product($post){
		$this->db->insert('purchase', $post);
	}


	public function edit_product($purchase_id){

		$query = $this->db
					->select('*')
				 	->where('purchase_id', $purchase_id)
				 	->join('status', 'status.active=purchase.status')
					->join('supplier','supplier.supplier_id=purchase.supplier_id', 'LEFT')
					->join('product','product.product_id=purchase.product_id', 'LEFT')
					->join('brands','brands.brand_id=product.b_id', 'LEFT')
					->join('categories','categories.categories_id=product.c_id', 'LEFT')
					->join('unit','unit.unit_id=purchase.unit_id', 'LEFT')
				 	->get('purchase');

		return $query->row();
	}

	public function update_product($purchase_id, Array $post){
		return $this->db
				->where('purchase_id', $purchase_id)
				->update('purchase', $post);
	}

	public function close_product($purchase_id){
		return $this->db
				->where('purchase_id', $purchase_id)
				->delete('purchase');
	}
}

?>