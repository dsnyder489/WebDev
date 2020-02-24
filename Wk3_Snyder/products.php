<?php
include('productList.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Products</title>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
  <header>
    <h1>Products</h1>
  </header>
  <main>

    <h2>Product Detail Table</h2>
    <table>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Model Number</th>
        <th>Manufacturer</th>
        <th>Price</th>
      </tr>
      <?php foreach($productList as $item){ ?>
      <tr>
        <td> <?php echo $item['ProductID']; ?></td>
        <td> <?php echo $item['ProductName']; ?></td>
        <td> <?php echo $item['ModelNum']; ?></td>
        <td> <?php echo $item['Manufacturer']; ?></td>
        <td> <?php echo '$', $item['Price']; ?></td>
      </tr>
      <?php } ?>
    </table>
    <br>

    <h2>Product Detail Dropdown List</h2>
    <select name="productList">
      <?php foreach($productList as $item): ?>
        <option value="<?php echo $item; ?>">
          <?php echo $item['ProductID'], '  ', $item['ProductName'], '  ',
                     $item['ModelNum'], '  ', $item['Manufacturer'], '  ',
                     '$', $item['Price']; ?>
        </option>
      <?php endforeach; ?>
    </select>
    <br>

    <h2>Product Name and Manufacturer in ul</h2>
    <?php foreach($productList as $item){ ?>
      <ul>
        <li> <?php echo $item['ProductName']; ?></li>
        <li> <?php echo $item['Manufacturer']; ?></li>
      </ul>
    <?php } ?>
    <br>

    <h2>Black & Decker Products Table</h2>
    <table>
      <tr>
        <th>Product Name</th>
        <th>Manufacturer</th>
      </tr>
    <?php foreach($productList as $key => $item){
          echo '<tr>';
          if ($item['Manufacturer'] === 'Black and Decker'){
          echo '<td>'.$item['ProductName'].' | '.$item['Manufacturer'].'</td>';
        }
      }?>
      </tr>
    </table>
    <br>

    <h2>GE Products Drop Down List</h2>
    <select name="productList">
      <?php foreach($productList as $key => $item){
            if($item['Manufacturer'] === 'GE'){
                echo '<option>'.$item['ProductName'].' '.$item['Manufacturer'].'<option>';
              } }?>
        </option>
    </select>
    <br><br>
    <a href="index.php">Return to main page</a>
  </main>
</body>
</html>
