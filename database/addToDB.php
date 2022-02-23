<?php
    require("../models/classProduct.php");
    require("../models/classBook.php");
    require("../models/classDvd.php");
    require("../models/classFurniture.php");
    require_once('../database/connection.php');

    try {
      //Variables with POST[input]
      $sku = $_POST['sku'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $type = $_POST['productType'];

      switch ($type) {
        case 'furniture':
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];
        $furni = new Furniture($sku,$name,$price,$height,$width,$length,$type);
        $furni->setFurniture($connection,$sku,$name,$price,$height,$width,$length,$type);
        break;

        case 'book':
        $weight = $_POST['weight'];
        $book = new Book($sku,$name,$price,$weight,$type);
        $book->setBook($connection,$sku,$name,$price,$weight,$type);
        break;

        case 'dvd':
        $size = $_POST['size'];
        $dvd = new DVD($sku,$name,$price,$size,$type);
        $dvd->setDVD($connection,$sku,$name,$price,$size,$type);
        break;
      }

      header("refresh:0;url=/");

    } catch (PDOException $error) {
      echo $error->getMessage();
    }
?>
