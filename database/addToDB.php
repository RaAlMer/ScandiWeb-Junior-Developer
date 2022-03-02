<?php
    require('../models/classProduct.php');
    require("../models/classBook.php");
    require("../models/classDvd.php");
    require("../models/classFurniture.php");
    require_once('../database/connection.php');

    try {
      //assign input value's to variables
      $sku = $_POST['sku'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $type = $_POST['productType'];
      //Book variable
      $weight = $_POST['weight'];
      //DVD variable
      $size = $_POST['size'];
      //Furniture variables
      $height = $_POST['height'];
      $width = $_POST['width'];
      $length = $_POST['length'];
      
      $validators = [
        'dvd' => 'DVD',
        'book' => 'Book',
        'furniture' => 'Furniture',
      ];

      $validatorClass = $validators[$type];
      $validator = new $validatorClass($sku, $name, $price, $size, $weight, $height, $width, $length);
      $validator->validate($connection, $sku, $name, $price, $size, $weight, $height, $width, $length, $type);


      header("refresh:0;url=/");

    } catch (PDOException $error) {
      echo $error->getMessage();
    }
?>
