<?php 
$servername = "localhost";
$username = "positivequadrant";
$password = "positivequadrant";

try {
  $conn = new PDO("mysql:host=$servername;dbname=positivequadrant", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage(); die;
}
?>