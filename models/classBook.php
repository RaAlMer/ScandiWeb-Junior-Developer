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

    //Creates a book record in the table
    public function setBook($connection, $sku, $name, $price, $weight, $type){
      try {
        $statement = $connection->query("INSERT INTO `products` (`sku`, `name`, `price`, `weight`,`type`)
        VALUES ('$sku', '$name', $price, $weight, '$type');
        ");

        return $statement;

      } catch (PDOException $error) {
        echo "Insert failled: ".$error->getMessage();
      }
    }
  }


?>