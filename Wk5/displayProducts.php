<?php

session_start();

if(!isset($_SESSION['products'])){
  include('products.php');
  $_SESSION['products'] = $productList;
}

$products = $_SESSION['products'];

$action = filter_input(INPUT_POST, 'action');

switch($action) {
  case 'Add Product':
    $new_prodID = filter_input(INPUT_POST, 'newProductID');
    $new_genre = filter_input(INPUT_POST, 'newGenre');
    $new_artist = filter_input(INPUT_POST, 'newArtist');
    $new_album = filter_input(INPUT_POST, 'newAlbum');
    $new_price = filter_input(INPUT_POST, 'newPrice');

    $products[] = array('ProductID' => $new_prodID,
                        'Genre' => $new_genre,
                        'Artist' => $new_artist,
                        'AlbumName' => $new_album,
                        'Price' => $new_price,);

    $_SESSION['products'] = $products;

    break;
  case 'Delete':
    $prod_index = filter(INPUT_POST, 'prodid', FILTER_VALIDATE_INT);

      unset($productList[$prod_index]);
      $productList = array_values($productList);

    break;
  default:
    break;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dave's Record Store IMS: Add Products</title>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
  <main>
    <h1>Dave's Record Store</h1>
    <h2>IMS: Add Products</h2>
    <div class="topnav">
      <a href="home.php">Home</a>
      <a class="active" href="displayProducts.php">Products</a>
      <a href="updateProducts.php">Update Products</a>
    </div>
    <br>

    <!-- Product Inventory Table (from array) -->
    <table>
      <tr>
        <th>Product ID</th>
        <th>Genre</th>
        <th>Artist</th>
        <th>Album Name</th>
        <th>Price</th>
      </tr>
      <?php foreach($products as $id => $prod): ?>
      <tr>
        <td><?php echo $prod['ProductID']; ?></td>
        <td><?php echo $prod['Genre']; ?></td>
        <td><?php echo $prod['Artist']; ?></td>
        <td><?php echo $prod['AlbumName']; ?></td>
        <td><?php echo '$' . $prod['Price']; ?></td>
      </tr>
      <?php endforeach; ?>
    </table>

    <p>Above is the current inventory.<p>

    <h3>Add Product:</h3>
    <form action="displayProducts.php" method="post">

    <!-- Hiiden Form Fields -->
    <?php foreach($products as $id => $prod): ?>
      <?php foreach($prod as $k => $item): ?>
        <input type="hidden" name="products[<?php echo $id; ?>][<?php echo $k; ?>]"
               value="<?php echo $item; ?>">
      <?php endforeach; ?>
    <?php endforeach; ?>

    <!-- Add Product Form -->
      <label>Product ID:</label>
      <input type="text" name="newProductID" id="newProductID"><br>
      <label>Genre:</label>
      <input type="text" name="newGenre" id="newGenre"><br>
      <label>Artist:</label>
      <input type="text" name="newArtist" id="newArtist"><br>
      <label>Album:</label>
      <input type="text" name="newAlbum" id="newAlbum"><br>
      <label>Price:</label>
      <input type="text" name="newPrice" id="newPrice"><br>
      <label>&nbsp;</label>
      <input type="submit" name="action" value="Add Product">
    </form>

    <p>Fill out the above form to enter product detail.<p>

    <!-- Drop Down List to Delete Product -->
    <h3>Delete Products:</h3>
    <form action="displayProducts.php" method="post">
      <?php foreach ($productList as $products): ?>
        <input type="hidden" name="productList[]"
                 value="<?php echo $product; ?>">
      <?php endforeach; ?>
      <select name="prodid">
        <?php foreach ($productList as $id => $products): ?>
          <option value="<?php echo $id; ?>">
            <?php echo $products['Artist'] . ' ' . $products['AlbumName']; ?>
          </option>
        <?php endforeach; ?>
      </select>

      <p>Select a product from the drop down menu to delete.<p>

      <label>&nbsp;</label>
      <input type="submit" name="action" value="Delete">
      <input typw="submit" name="action" value="Modify">
      </form>

  </main>
  <br><br>
  <footer>Copyright Dave's Record Store: Dave Snyder sny3714@calu.edu</footer>
</body>
</html>
