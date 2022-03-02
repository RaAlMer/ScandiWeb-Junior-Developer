<?php
    require('../models/classProduct.php');
    require("../models/classBook.php");
    require("../models/classDvd.php");
    require("../models/classFurniture.php");
    require_once('../database/connection.php');
    
    class AddToDB {
        /** Attributes **/
        protected $sku;
        protected $name;
        protected $price;
        protected $type;
        protected $weight;
        protected $size;
        protected $height;
        protected $width;
        protected $length;
        
        function __construct($sku, $name, $price, $size, $weight, $height, $width, $length, $type)
        {
          $this->sku = $sku;
          $this->name = $name;
          $this->price = $price;
          $this->size = $size;
          $this->weight = $weight;
          $this->height = $height;
          $this->width = $width;
          $this->length = $length;
          $this->type = $type;
        }
        //Add to DB
        function addDB($connection, $sku, $name, $price, $size, $weight, $height, $width, $length, $type) {
          try {
              $validators = [
                'dvd' => 'DVD',
                'book' => 'Book',
                'furniture' => 'Furniture',
              ];
        
              $validatorClass = $validators[$type];
              $validator = new $validatorClass($sku, $name, $price, $size, $weight, $height, $width, $length);
              return $validator->validate($connection, $sku, $name, $price, $size, $weight, $height, $width, $length, $type);
    
          } catch (PDOException $error) {
            echo $error->getMessage();
          }
        }
        
    }
    $adding = new AddToDB($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['size'], $_POST['weight'], $_POST['height'], $_POST['width'], $_POST['length'], $_POST['productType']);
    $adding->addDB($connection, $_POST['sku'], $_POST['name'], $_POST['price'], $_POST['size'], $_POST['weight'], $_POST['height'], $_POST['width'], $_POST['length'], $_POST['productType']);
    
    header("refresh:0;url=/");

?>
