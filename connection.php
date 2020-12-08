<?php
$servername = "ec2-52-207-124-89.compute-1.amazonaws.com";
$username = "ekzqqmgdouinmf";
$password = "dcc149469b88d43e9d87770deb2181fd22bfb7596924eeeeca0f1158b456500f";

try {
  $conn = new PDO("pgsql:host=$servername;dbname=d9niad4d72m1b", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

 