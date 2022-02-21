<?php

  class DVD extends Product
  {
    /** Attributes **/
    protected $size;

    /** Methods **/
    function __construct($sku, $name, $price, $size)
    {
      $this->sku = $sku;
      $this->name = $name;
      $this->price = $price;
      $this->size = $size;
    }

    //Creates a dvd product in the table
    public function setDVD($connection, $sku, $name, $price, $size, $type){
      try {
        $statement = $connection->query("INSERT INTO `products` (`sku`, `name`, `price`,`size`, `type`)
        VALUES ('$sku', '$name', $price, $size, '$type');
        ");

        return $statement;

      } catch (PDOException $error) {
        echo "Insert failled: ".$error->getMessage();
      }
    }
  }

?>