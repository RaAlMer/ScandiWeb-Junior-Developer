<?php

  class Furniture extends Product
  {
    /** Attributes **/
    protected $height;
    protected $width;
    protected $length;

    /** Methods **/
    function __construct($sku,$name,$price,$height,$width,$length)
    {
      $this->sku = $sku;
      $this->name = $name;
      $this->price = $price;
      $this->height = $height;
      $this->width = $width;
      $this->length = $length;
    }

    //Creates a record in table with given values
    function setFurniture($connection, $sku, $name, $price, $height, $width, $length, $type){
      try {
        $statement = $connection->query("INSERT INTO `products` (`sku`, `name`, `price`, `height`, `width`, `length`,`type`)  VALUES ('$sku', '$name', $price, $height, $width, $length, '$type');");

        return $statement;

      } catch (PDOException $error) {
        echo "Insert failled: ".$error->getMessage();
      }
    }
  }

?>