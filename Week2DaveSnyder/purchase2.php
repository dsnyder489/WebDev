<?php
  // set variable values
  if (!isset($product_name)) {$product_name = '';}
  if (!isset($quantity)) {$quantity = '';}
  if (!isset($unit_price)) {$unit_price = '';}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Purchase Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
    <h1>Purchase Discount Calculator</h1>
    <form action="discount2.php" method="post">
    <?php if (!empty($error_message)){ ?>
        <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
    <?php } ?>
      <div id="data">
        <label>Product Name:</label>
        <input type="text" name="product_name"
          value="<?php echo htmlspecialchars($product_name); ?>">
        <br>

        <label>Quantity:</label>
        <input type="text" name="quantity"
          value="<?php echo htmlspecialchars($quantity); ?>">
        <br>

        <label>Unit Price:</label>
        <input type="text" name="unit_price"
          value="<?php echo htmlspecialchars($unit_price); ?>">
        <br>
      </div>
      <div id="button">
        <label>&nbsp;</label>
        <input type="submit" value="Calculate">
        <br>
      </div>
    </form>
    </main>
  </body>
  </html>
