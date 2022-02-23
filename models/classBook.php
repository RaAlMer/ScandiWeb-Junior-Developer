<?php

  class Book extends Product
  {
    /** Attributes **/
    protected $weight;

    /** Methods **/
    function __construct($sku, $name, $price, $weight)
    {
      $this->sku = $sku;
      $this->name = $name;
      $this->price = $price;
      $this->weight = $weight;
    }

    //Creates a book record in the database
    public function setBook($connection, $sku, $name, $price, $weight, $type){
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
