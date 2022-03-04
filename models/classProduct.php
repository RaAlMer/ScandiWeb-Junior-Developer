<?php
class Product
{
  /* Attributes */
  protected $sku;
  protected $name;
  protected $price;
  protected $type;

  /* Methods */
  function __construct(){
    //Creates empty product
  }
  
  //Creates a record in the database
    function validate($connection, $sku, $name, $price, $size, $weight, $height, $width, $length, $type) {
      try {
        $sql = $connection->query("INSERT INTO `products` (`sku`, `name`, `price`, `size`, `weight`, `height`, `width`, `length`,`type`)  VALUES ('$sku', '$name', $price, $size, $weigth, $height, $width, $length, '$type');");

        return $sql;

      } catch (PDOException $error) {
        echo $error->getMessage();
      }
    }

  //Deletes selected products by their id from the checkbox
  public function deleteProducts($connection, $id){
    try {
      $sql = $connection->query("DELETE FROM products WHERE id = $id");
      return $sql;

    } catch (PDOException $error) {
      echo $error->getMessage();
    }
  }

  //Gets all the product that exists in the database
  function getProducts($connection){
    try {
      $sql = $connection->query("SELECT * FROM products");

      return $sql;

    } catch (PDOException $error) {
      echo $error->getMessage();
    }
  }
}
?>
