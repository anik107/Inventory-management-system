<?php

class Order_model extends CI_Model{

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



 	public function get_categories($brand_id){

 	 $this->db->select('*');
  	 $this->db->from('categories');
  	 $this->db->where('b_id', $brand_id);
   	 $query = $this->db->get();
     return $query->result();

 	}


 	public function get_customer(){

 	 $this->db->select('*');
  	 $this->db->from('customer');
   	 $query = $this->db->get();
     return $query->result();

 	}


 	public function get_product($categories_id){

 	 $this->db->select('*');
  	 $this->db->from('product');
  	 $this->db->join('purchase', 'purchase.product_id=product.product_id');
  	 $this->db->join('unit', 'unit.unit_id=purchase.unit_id');
  	 $this->db->where('c_id', $categories_id);
   	 $query = $this->db->get();
     return $query->result();
 	}


 	public function get_unit(){

 	 $this->db->select('*');
  	 $this->db->from('unit');
   	 $query = $this->db->get();
     return $query->result();

 	}



	public function order_list( $limit, $offset){
		$query=$this->db
						->select('*')
						->from('orders')
						->join('status', 'status.active=orders.order_status')
						->join('customer','customer.customer_id=orders.customer_id', 'LEFT')
						->join('unit','unit.unit_id=orders.unit_id', 'LEFT')
						->order_by('order_id', 'DESC')
						->limit( $limit, $offset)
						->get();
		return $query->result();
	}

	public function search_product($query){

		$query=$this->db
						->select('*')
						->from('orders')
						->join('status', 'status.active=orders.order_status')
						->join('brands','brands.brand_id=orders.brand_id')
						->join('categories','categories.categories_id=orders.categories_id')
						->join('customer','customer.customer_id=orders.customer_id', 'LEFT')
						->join('product','product.product_id=orders.product_id', 'LEFT')
						->join('unit','unit.unit_id=orders.unit_id', 'LEFT')
						->like('bill_no', $query)
						->get();
		return $query->result();
	}	

	public function sales_product($insert, $update, $p_id){
		$this->db
				->where(['purchase_id'=>$p_id])	
				->update('purchase', $update);

		$this->db->insert('orders', $insert);
	}


	public function edit_product($order_id){

		$query = $this->db
					->select('*')
				 	->where('order_id', $order_id)
				 	->join('status', 'status.active=orders.order_status')
					->join('customer','customer.customer_id=orders.customer_id', 'LEFT')
					->join('product','product.product_id=orders.p_id', 'LEFT')
					->join('unit','unit.unit_id=orders.unit_id', 'LEFT')
				 	->get('orders');

		return $query->row();
	}

	public function update_product($order_id, Array $post){
		return $this->db
				->where('order_id', $order_id)
				->update('orders', $post);
	}

	public function close_order($order_id){
		return $this->db
				->where('order_id', $order_id)
				->delete('orders');
	}
}

?>