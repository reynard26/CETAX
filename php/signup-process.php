<?php
if (isset($_POST['user'])) $user = $_POST['user'];
if (isset($_POST['email'])) $email = $_POST['email'];
if (isset($_POST['pw'])) $pass = password_hash($_POST['pw'], PASSWORD_BCRYPT);
if (isset($_POST['Fname'])) $Fname = $_POST['Fname'];
if (isset($_POST['Lname'])) $Lname = $_POST['Lname'];
if (isset($_POST['phone'])) $phone = $_POST['phone'];
if (isset($_POST['address'])) $address = $_POST['address'];
if (isset($_POST['postal'])) $postal = $_POST['postal'];
$role = "user";

$host = 'localhost';
$dbname = 'cetax';
$username = 'root';
$password = '';
$pdo = new PDO("mysql: host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$query = $pdo->prepare("SELECT * FROM table_customer WHERE username = ?");
$query->execute([$user]);
$result = $query->fetch();

if($result){
    echo "<script>alert('Signup Failed, Username existed');window.location.href='../login.php';</script>";
}
else{
    $query = $pdo->prepare("INSERT INTO `table_customer`( `username`, `email`, `password`, `first_name`, `last_name`, `no_telp`, `address`, `role`, `postalcode`) values ('$user','$email','$pass','$Fname','$Lname','$phone','$address','$role', '$postal')");
    $result = $query->execute();
    echo "<script>alert('Signup Succesfully');window.location.href='../login.php';</script>";
}
