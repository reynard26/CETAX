<?php
session_start();
if (isset($_POST['user'])) $user = $_POST['user'];
if (isset($_POST['email'])) $email = $_POST['email'];
if (isset($_POST['pw'])) $pass = password_hash($_POST['pw'], PASSWORD_BCRYPT);
if (isset($_POST['Fname'])) $Fname = $_POST['Fname'];
if (isset($_POST['Lname'])) $Lname = $_POST['Lname'];
if (isset($_POST['phone'])) $phone = $_POST['phone'];
if (isset($_POST['address'])) $address = $_POST['address'];
if (isset($_POST['postal'])) $postal = $_POST['postal'];
$id = $_SESSION['user_id'];

$host = 'localhost';
$dbname = 'cetax';
$username = 'root';
$password = '';
$pdo = new PDO("mysql: host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$query = $pdo->prepare("UPDATE `table_customer` SET `username`='$user',`email`='$email',`password`='$pass',`first_name`='$Fname',`last_name`='$Lname',`no_telp`='$phone',`address`='$address',`postalcode`='$postal' WHERE `id` = $id");
$result = $query->execute();
if ($result) {
    echo "<script>alert('Edit profile Succesfully');window.location.href='../profile-page.php';</script>";
}
