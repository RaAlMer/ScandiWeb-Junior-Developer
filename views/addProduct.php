<?php
  require("/xampp/htdocs/models/classProduct.php");
  require_once('/xampp/htdocs/database/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Add</title>
    <!-- CSS link -->
    <link rel="stylesheet" href="../public/css/styles.css">
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top: 60px">
        <div class="row">
            <div class="col-9">
                <h1>Product Add</h1>
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-light" form="product_form" value="save">Save</button>
            </div>
            <div class="col-2">
                <a href="./listProducts.php" class="btn btn-danger">Cancel</a>
            </div>	
        </div>
    </div>
    <hr>
    <!-- Change action -->
    <form action="../database/addToDB.php" method="post" id="product_form">
        <label for="sku">SKU</label>
        <input type="text" id="sku" name="sku" required/>
        <br>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required/>
        <br>
        <label for="price">Price ($)</label>
        <input type="number" id="price" name="price" step="any" required/>
        <br>
        <label for="productType">Type Switcher</label>
        <select name="productType" id="productType" onchange="switchSpecificAttribute(this)">
            <option class="dropdown-item text-light" value="0" disabled selected>Choose type</option>
            <option value="dvd">DVD</option>
            <option value="book">Book</option>
            <option value="furniture">Furniture</option>
        </select>
        
        <div class="specificAttribute">
          <!-- Product type-specific attribute -->
          <div id="DVD">
            <div class="mb-3 mt-3">
              <label for="size" >Size (MB)</label>
              <input type="number" id="size" name="size" step="any" >
              <p><b>Please, provide disk space size in MB.</b></p>
            </div>
          </div>
          <div id="Furniture">
            <div class="mb-3 mt-3">
              <label for="height">Height (CM)</label>
              <input type="number" id="height" name="height" step="any" >
            </div>
            <div class="mb-3 mt-3">
              <label for="width">Width (CM)</label>
              <input type="number" id="width" name="width" step="any" >
            </div>
            <div class="mb-3 mt-3">
              <label for="length">Length (CM)</label>
              <input type="number" id="length" name="length" step="any" >
            </div>
            <p><b>Please, provide furniture dimensions in CM.</b></p>
          </div>
          <div id="Book">
            <div class="mb-3 mt-3">
              <label for="weight">Weight (KG)</label>
              <input type="number" id="weight" name="weight" step="any" >
              <p><b>Please, provide book weight in KG.</b></p>
            </div>
          </div>
        </div>
    </form>
    <hr>
    <footer>
			Scandiweb Test assigment
      <p>Made by Raúl Alonso Merino for ScandiWeb test</p>
		</footer>
</body>
<script src="../public/js/index.js" charset="utf-8"></script>
</html>