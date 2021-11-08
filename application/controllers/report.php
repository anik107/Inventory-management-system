<?php

class Report extends CI_Controller{

   function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
      
    }

     public function purchase_report($purchase_id) { 

          $this->load->model('report_model');
          $purchase_report = $this->report_model->purchase_report($purchase_id);    
          
           $this->load->view('admin/report/purchase_report', ['purchase_report' => $purchase_report]);
           
          // Get output html
          $html = $this->output->get_output();
          
          // Load library
          $this->load->library('pdf');

          // Convert to PDF
          $this->pdf->load_html($html);
          $this->pdf->render();
          $this->pdf->stream("purchase_receipt.pdf");
          
     }

      public function sell_report($order_id) { 

          $this->load->model('report_model');
          $sell_report = $this->report_model->sell_report($order_id);
          
          $this->load->view('admin/report/sell_report', ['sell_report'=>$sell_report]);
           
          // Get output html
          $html = $this->output->get_output();
          
          // Load library
          $this->load->library('pdf');

          // Convert to PDF
          $this->pdf->load_html($html);
          $this->pdf->render();
          $this->pdf->stream("sell_receipt.pdf");
      }

      public function daily_purchase_report(){

    $query=$this->db->get('purchase', '5', $this->uri->segment(3));
    $data['purchase']=$query->result();
    $query2=$this->db->get('purchase');
    $config=[

        'base_url'      => base_url('Report/daily_purchase_report'),
        'total_rows'    => $query2->num_rows(), 
        'per_page'      => 5, 
        'full_tag_open'   => "<ul class='pagination'>",
        'full_tag_close'  => "</ul>",
        'first_tag_open'  => "<li>",
        'first_tag_close' => "</li>",
        'last_tag_open'   => "<li>",
        'last_tag_close'  => "</li>",
        'next_tag_open'   => "<li>",
        'next_tag_close'  => "</li>",
        'prev_tag_open'   => "<li>",
        'prev_tag_close'  => "</li>",
        'num_tag_open'    => "<li>",
        'num_tag_close'   => "</li>",
        'cur_tag_open'    => "<li class = 'active'><a>",
        'cur_tag_close'   => "</a></li>",
    ];
    $this->load->model('purchase_model');
    $this->pagination->initialize($config);
    $product=$this->purchase_model->product_list( $config['per_page'], $this->uri->segment(3));
    $product_status=$this->purchase_model->get_status();
    $unit_name=$this->purchase_model->get_unit();
    $suppliers=$this->purchase_model->get_suppliers();
    
    $this->load->view('admin/report/daily_purchase_report', ['product'=>$product,'product_status'=>$product_status, 'suppliers'=>$suppliers, 'unit_name'=>$unit_name]);

  }

  public function daily_sells_report(){

    $query=$this->db->get('orders', '5', $this->uri->segment(3));
    $data['orders']=$query->result();
    $query2=$this->db->get('orders');
    $config=[

        'base_url'      => base_url('report/daily_sells_report'),
        'total_rows'    => $query2->num_rows(), 
        'per_page'      => 5, 
        'full_tag_open'   => "<ul class='pagination'>",
        'full_tag_close'  => "</ul>",
        'first_tag_open'  => "<li>",
        'first_tag_close' => "</li>",
        'last_tag_open'   => "<li>",
        'last_tag_close'  => "</li>",
        'next_tag_open'   => "<li>",
        'next_tag_close'  => "</li>",
        'prev_tag_open'   => "<li>",
        'prev_tag_close'  => "</li>",
        'num_tag_open'    => "<li>",
        'num_tag_close'   => "</li>",
        'cur_tag_open'    => "<li class = 'active'><a>",
        'cur_tag_close'   => "</a></li>",
    ];
    $this->load->model('order_model');
    $this->pagination->initialize($config);
    $orders=$this->order_model->order_list( $config['per_page'], $this->uri->segment(3));
    $product_status=$this->order_model->get_status();
    $brand_name=$this->order_model->get_brands();
    $unit_name=$this->order_model->get_unit();
    $customer=$this->order_model->get_customer();
    
    $this->load->view('admin/report/daily_sells_report', ['orders'=>$orders,'brand_name'=>$brand_name,'product_status'=>$product_status, 'customer'=>$customer, 'unit_name'=>$unit_name]);

  }


}


?>