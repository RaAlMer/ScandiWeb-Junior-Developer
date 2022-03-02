<?php

  class Book extends Product
  {
    /** Attributes **/
    protected $weight;

    /** Methods **/
    function __construct($sku, $name, $price, $size, $weight, $height, $width, $length)
    {
      $this->sku = $sku;
      $this->name = $name;
      $this->price = $price;
      $this->size = $size;
      $this->weight = $weight;
      $this->height = $height;
      $this->width = $width;
      $this->length = $length;
    }

    //Creates a book record in the database
    function validate($connection, $sku, $name, $price, $size, $weight, $height, $width, $length, $type) {
      try {
        $sql = $connection->query("INSERT INTO `products` (`sku`, `name`, `price`, `weight`,`type`)
        VALUES ('$sku', '$name', $price, $weight, '$type');
        ");

        return $sql;

      } catch (PDOException $error) {
        echo $error->getMessage();
      }
    }
    
    //Gets the books records in the database
    protected function getBook($connection){
    try {
      $sql = $connection->query("SELECT * FROM `products` WHERE `sku` = $this->sku AND `type` = 'book'");

      return $sql;

    } catch (PDOException $error) {
      echo $error->getMessage();
    }
  }
    
  }
?>
