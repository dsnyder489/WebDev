<!DOCTYPE html>
<html>
<head>
  <title>Customer Manager</title>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
  <header>
    <h1>Customer Manager</h1>
  </header>

  <main>
    <!-- Errors -->
      <?php if (count($errors) > 0): ?>
      <h2>Errors:</h2>
      <ul>
        <?php foreach($errors as $error): ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>

    <!-- Customers -->
    <h2>Customers</h2>
    <?php if (count($customerList) == 0): ?>
          <p>There are no customers in the customer list.</p>
    <?php else: ?>
      <ul>
        <?php foreach($customerList as $id => $customer): ?>
          <li><?php echo $id + 1 . '. ' . $customer; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <br>

    <!-- Add Customer -->
    <h2>Add Customer:</h2>
    <form action="customer.php" method="post">
      <?php foreach ($customerList as $customer): ?>
        <input type="hidden" name="customerList[]"
              value="<?php echo $customer; ?>">
      <?php endforeach; ?>
      <label>Customer:</label>
      <input type="text" name="customer" id="customer"><br>
      <label>&nbsp;</label>
      <input type="submit" name="action" value="Add Customer"><br>
    </form>

    <!-- Delete / Modify Customer -->
    <h2>Delete/Modify Customer:</h2>
    <?php if (count($customerList) > 0): ?>
    <form action="customer.php" method="post">

      <?php foreach ($customerList as $customer): ?>
        <input type="hidden" name="customerList[]"
                value="<?php echo $customer; ?>">
      <?php endforeach; ?>

      <select name="custid">
        <?php foreach($customerList as $id => $customer): ?>
        <option value="<?php echo $id; ?>">
        <?php echo $customer; ?>
        </option>
        <?php endforeach; ?>
      </select>
      <br>
      <label>&nbsp;</label>
      <input type="submit" name="action" value="Delete">
      <input type="submit" name="action" value="Modify">
    </form>
    <?php endif; ?>
    <br>

    <!-- Modify Hidden Form -->
    <?php if(!empty($cust_to_mod)): ?>
      <h2>Modify Customer:</h2>
      <form action="customer.php" method="post">
      <?php foreach ($customerList as $customer): ?>
        <input type="hidden" name="customerList[]" value="<?php echo $customer; ?>">
      <?php endforeach; ?>
      <label>Customer:</label>
      <input type="hidden" name="ModifyID" value="<?php echo $cust_index; ?>">
      <input type="text" name="ModifyCust" value="<?php echo $cust_to_mod; ?>">
      <label>&nbsp;</label>
      <input type="submit" name="action" value="Save">
      <input type="submit" name="action" value="Cancel">
    </form>
  <?php endif; ?>

  <br><br>
  <a href="index.php">Return to main page</a>
</main>
</body>
</html>
