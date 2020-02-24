<?php
  // get data from index.php
  $product_name = $_POST['product_name'];
  $quantity = filter_input(INPUT_POST, 'quantity',
    FILTER_VALIDATE_INT);
  $unit_price = filter_input(INPUT_POST, 'unit_price',
    FILTER_VALIDATE_INT);

  // calc discount
  $total_price = $quantity * $unit_price;
  $discount_price = $total_price - ($total_price * 0.1);

  // currency and percent formatting
  $unit_price_f = '$'.number_format($unit_price, 2);
  $total_price_f = '$'.number_format($total_price, 2);
  $discount_price_f = '$'.number_format($discount_price, 2);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Product Discount Calculator</h1>
        <label>Product Name:</label>
        <span><?php echo $product_name; ?></span><br>

        <label>Quantity:</label>
        <span><?php echo $quantity; ?></span><br>

        <label>Unit Price:</label>
        <span><?php echo $unit_price_f; ?></span><br>

        <label>Total Price:</label>
        <span><?php echo $total_price_f; ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo $discount_price_f; ?></span><br>
    </main>
</body>
</html>
