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
  public function deleteProducts($connect, $id){
    try {
      $statement = $connect->query("DELETE FROM products WHERE id = $id");
      return $statement;

    } catch (PDOException $error) {
      echo $error->getMessage();
    }
  }

  //Gets all the product that exists in the database
  function getProducts($connect){
    try {
      $statement = $connect->query("SELECT * FROM products");

      return $statement;

    } catch (PDOException $error) {
      echo $error->getMessage();
    }
  }
}
?>