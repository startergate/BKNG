<?php
  require('../config/config_root.php');	//Server Config Data
  require('../lib/db.php');	//DB Library

  $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
  $result = mysqli_query($conn, "SELECT name FROM hash_data WHERE hash LIKE '".$ihash."'");
  $row = mysqli_fetch_assoc($result);
  $data = explode("_", $row['name']);
  $pid = $data[2];

  $result = mysqli_query($conn, "SELECT amount FROM ".$pid."_data WHERE hash LIKE '".$ihash."'");
  $row = mysqli_fetch_assoc($result);
  $amount = $row['amount'];

  $result = mysqli_query($conn, "SELECT value FROM account_data WHERE pid LIKE '".$pid."'");
  $row = mysqli_fetch_assoc($result);
  $value = $row['value'];

  $changedValue = $row;

  $result = mysqli_query($conn, "UPDATE account_data SET value='1000' WHERE pid='".$pid."'");
  $row = mysqli_fetch_assoc($result);

  $ihash = $_GET['ihash']


?>
