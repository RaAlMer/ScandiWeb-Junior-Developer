<?php
  class DVD extends Product
  {
    /** Attributes **/
    protected $size;

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
