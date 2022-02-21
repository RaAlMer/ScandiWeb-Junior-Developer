<?php
    require('config.php');
	//Connect to the database in MySQL
	$connection = mysqli_connect($config['server'], $config['user'], $config['password']);
	//Select the database
    mysqli_select_db($connection, $config['database']);

?>
