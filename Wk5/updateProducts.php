<?php
include('products.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dave's Record Store IMS: Update Products</title>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
  <main>
    <h1>Dave's Record Store</h1>
    <h2>IMS: Update Products</h2>
    <div class="topnav">
      <a href="home.php">Home</a>
      <a href="displayProducts.php">Products</a>
      <a class="active" href="updateProducts.php">Update Products</a>
    </div>
    <br>

    <!-- Update Product Drop Down Menu -->
    <h3>Update Products:</h3>
    <form action="updateProducts.php" method="post">
      <?php foreach ($productList as $product): ?>
        <input type="hidden" name="productList[]"
               value="<?php echo $product; ?>">
      <?php endforeach; ?>
      <select name="productID">
        <$php <?php foreach ($productList as $id => $product): ?>
          <option value="<?php echo $id; ?>">
          <?php echo $product['Artist'] . ' ' . $product['AlbumName']; ?>
          </option>
        <?php endforeach; ?>
      </select>
      <p>Select a product from the drop down menu to edit.<p>
      <label>&nbsp;</label>
      <input type="submit" name="action" value="Update">

    <!-- Hidden Form to Update -->
    <h3>Product Info:</h3>
    <form action="updateProducts.php" method="post">
      <?php foreach ($productList as $product): ?>
        <input type="hidden" name="productList[]"
               value="<?php echo $product; ?>">
      <?php endforeach; ?>
        <label>Product ID:</label>
        <input type="text" name="productID" value=""><br>
        <label>Genre:</label>
        <input type="text" name="genre" value=""><br>
        <label>Artist:</label>
        <input type="text" name="artist" value=""><br>
        <label>Album:</label>
        <input type="text" name="album" value=""><br>
        <label>Price:</label>
        <input type="text" name="price" value=""><br>
        <p>Fill out the above form to enter product detail.<p>
        <label>&nbsp;</label>
        <input type="submit" name="action" value="Update">
        <input type="submit" name="action" value="Cancel">
    </form>

  </main>
  <br><br>
  <footer>Copyright Dave's Record Store: Dave Snyder sny3714@calu.edu</footer>
</body>
</html>
