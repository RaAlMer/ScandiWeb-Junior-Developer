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
