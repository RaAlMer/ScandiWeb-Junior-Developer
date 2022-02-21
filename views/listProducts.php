<?php
  require("/xampp/htdocs/models/classProduct.php");
  require_once('/xampp/htdocs/database/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Product List</title>
    <!-- CSS link -->
    <link rel="stylesheet" href="../public/css/styles.css">
    <!-- Bootstrap link -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body>
    <form action="" method="post">
      <div class="container" style="margin-top: 60px">
        <div class="row">
          <div class="col-9">
            <h1>Product List</h1>
          </div>
          <div class="col-1">
            <a href="/views/addProduct.php" class="btn btn-light">ADD</a>
          </div>
          <div class="col-2">
            <button type="submit" id="delete-product-btn" class="btn btn-danger" name="deleteBtn" >MASS DELETE</button>
          </div>	
        </div>
      </div>
      <hr>
      <?php
        $Product = new Product();
        $rows = $Product->getProducts($connection);
        foreach ($rows as $row){
      ?>
      <div class="container-card" style="margin: 0; padding: 0;">
        <div class="card">
          <div class="card-body">
            <input type="checkbox" class="delete-checkbox" name="checkbox[]" value="<?php echo $row['id'] ?>" >
            <ul>
              <?php
                echo "<li>" . $row['sku'] . "</li>";
                echo "<li>" . $row['name'] . "</li>";
                echo "<li>" . $row['price'] . "</li>";
              ?>
              <li>
                <?php
                  switch($row['type']){
                    case 'dvd':
                      echo "Size: " . $row['size'] . " MB";
                      break;
                    case 'furniture':
                      echo "Dimension: " . $row['height'] . "x" . $row['width'] . "x" . $row['length'];
                      break;
                    case 'book':
                      echo "Weight: " . $row['weight'] . "KG";
                      break;
                  }
                ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
    </form>
		<hr>
		<footer>
			Scandiweb Test assigment
      <br>
      <a href="#">Back to top</a>
      <p>Made by Raúl Alonso Merino for ScandiWeb test</p>
		</footer>
	</body>
</html>

<?php
  if (isset($_POST['deleteBtn'])) {
    try {
      $dom = new DOMDocument;
      $checkBoxes = $_POST['checkbox'];
      foreach ($checkBoxes as $checkBox) {
        echo $checkBox;
        $Product->deleteProducts($connection, $checkBox);
      }
      header("refresh:0");

    } catch (PDOException $error) {
      echo $error->getMessage();
    }
  }
?>