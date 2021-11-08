<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    .noborders td {
        border:0;
    }
  </style>
</head>
<body>
  <table border="10" width="100%" cellpadding="5" cellspacing="">
  <tr >
    <th  colspan="5"><h2>Purchase Report</h2></th>
  </tr>

   <?php if(count($purchase_report)): 
  $count=$this->uri->segment(3, 0);
  foreach($purchase_report as $product): ?>

  <tr >
    <td colspan="5">
      Date : <?= $product->purchase_date; ?>
      <br>
      Receipt No . <?= $product->bill_no; ?>
      <br>
      <h2><b>Micro Asia Company Ltd.</b></h2>
      <h4>Malopara , Boalia <br>
      Rajshahi</h4>
    </td>
  </tr>
  <tr>
    <td colspan="5">
      <h3>To</h3>
      <h4>
        <?= $product->supplier_name; ?> <br>
        Address : <?= $product->address; ?> <br>
        Contact NO : <?= $product->contact_no; ?> <br>
        Email : <?= $product->email; ?> <br>
      </h4>
    </td>
  </tr>

 


  <tr style="background:red ">
      <td>NO</td>
      <td>Product</td>
      <td>Quantity</td>
      <td>Rate</td>
      <td>Total</td>
  </tr>

  

  <tr >
      <td>1</td>
      <td><?= $product->product_name; ?></td>
      <td><?= $product->quantity; ?></td>
      <td><?= $product->buy_rate; ?></td>
      <td><?= $product->total; ?></td>
  </tr>

  

  <tr class="noborders">
    <td colspan="4">
      <h4>
        Paid Amount : <?= $product->payment; ?> <br>
        Due Amount : <?= $product->due; ?><br>
        <!-- Due Date : 10-10-19<br> -->
        <br>
      </h4>
    </td>
   <td><br><h3 style="text-align:center; ">Signature</h3></td>
  </tr>
  <?php endforeach; ?>
  <?php endif; ?>
</table>

</body>
</html>