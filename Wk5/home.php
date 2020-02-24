<!DOCTYPE html>
<html>
<head>
  <title>Dave's Record Store Inventory Management System</title>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
  <main>
    <h1>Dave's Record Store</h1>
    <h2>Inventory Management System</h2>
    <div class="topnav">
      <a class="active" href="home.php">Home</a>
      <a href="displayProducts.php">Products</a>
      <a href="updateProducts.php">Update Products</a>
    </div>
    <br><br>
    <h3>About Dave's Record Store</h3>
    <p>Dave has been collecting records for over 15 years.  Now some of his
        collection is for sale.  This inventory management system tracks the
        current product list.<p>
    <br><br>

    <!-- Image Columns -->
    <div class="row">
      <div class="column">
        <img src="img/abbey_road.jpg" alt="Abbey Road" style="width:100%" onclick="myFunction(this);">
      </div>
      <div class="column">
        <img src="img/rsd_18.jpg" alt="Record Store Day 2018" style="width:100%" onclick="myFunction(this);">
      </div>
      <div class="column">
        <img src="img/qotsa.jpg" alt="QOTSA and Brisket" style="width:100%" onclick="myFunction(this);">
      </div>
    </div>

    <div class="container">
      <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
      <img id="expandedImg" style="width:50%">
      <div id="imgtext"></div>
    </div>

    <!-- Img JS -->
    <script>
    function myFunction(imgs) {
      var expandImg = document.getElementById("expandedImg");
      var imgText = document.getElementById("imgtext");
      expandImg.src = imgs.src;
      imgText.innerHTML = imgs.alt;
      expandImg.parentElement.style.display = "block";
    }
    </script>

  </main>
  <br><br>
  <footer>Copyright Dave's Record Store: Dave Snyder sny3714@calu.edu</footer>
</body>
</html>
