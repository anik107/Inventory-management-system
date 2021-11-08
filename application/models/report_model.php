<?php

class Report_model extends CI_Model{

	public function purchase_report($purchase_id){

		$q = $this->db->select('*')
				 ->from('purchase')
				 ->where('purchase_id', $purchase_id)
				 ->join('supplier', 'supplier.supplier_id=purchase.supplier_id')
				 ->join('product', 'product.product_id = purchase.product_id')
				 ->get();
		return $q->result();

	}

	public function sell_report($order_id){

		$q = $this->db->select('*')
				 ->from('orders')
				 ->where('order_id', $order_id)
				 ->join('customer', 'customer.customer_id=orders.customer_id')
				 ->get();
		return $q->result();

	}
}

?>