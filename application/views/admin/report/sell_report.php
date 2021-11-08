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
  <table border="5"  width="100%" cellpadding="5" cellspacing="">
  <tr >
    <th  colspan="5"><h2>Sells Report</h2></th>
  </tr>

   <?php if(count($sell_report)): 
  $count=$this->uri->segment(3, 0);
  foreach($sell_report as $product): ?>

  <tr >
    <td colspan="5">
      Date : <?= $product->orders_date; ?>
      <br>
      Receipt No . <?= $product->bill_no; ?>
      <br>
      <h2 style="text-align: center"><b>Micro Asia Company Ltd.</b></h2>
      <h4>Malopara , Boalia <br>
      Rajshahi</h4>
    </td>
  </tr>
  <tr>
    <td colspan="5">
      <h3>To</h3>
      <h4>
        <?= $product->customer_name; ?> <br>
        Address : <?= $product->address; ?> <br>
        Contact NO : <?= $product->contact_no; ?> <br>
        Email : <?= $product->email; ?> <br>
      </h4>
    </td>
  </tr>

 


  <tr style="background:grey ">
      <td>NO</td>
      <td>Product</td>
      <td>Quantity</td>
      <td>Rate</td>
      <td>Total</td>
  </tr>

  

  <tr >
      <td>1</td>
      <td><?= $product->product; ?></td>
      <td><?= $product->quantity; ?></td>
      <td><?= $product->rate; ?></td>
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