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

    //Creates a dvd product in the database
    public function setDVD($connection, $sku, $name, $price, $size, $type){
      try {
        $sql = $connection->query("INSERT INTO `products` (`sku`, `name`, `price`,`size`, `type`)
        VALUES ('$sku', '$name', $price, $size, '$type');
        ");

        return $sql;

      } catch (PDOException $error) {
        echo $error->getMessage();
      }
    }
    
    //Gets all DVD records in the database
    protected function getDVD($connection){
      try {
        $sql = $connection->query("SELECT * FROM `products` WHERE `sku` = $this->sku AND `type` = 'dvd';");

        return $sql;
      } catch (PDOException $error) {
        echo $error->getMessage();
      }
   } 
  }

?>
