<?php
session_start();
$host = 'localhost';
$dbname = 'cetax';
$username = 'root';
$password = '';
$pdo = new PDO("mysql: host=$host;dbname=$dbname",$username,$password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$user_id = $_SESSION['user_id'];
if(isset($_POST['product_name']))$productname = $_POST['product_name'];
if(isset($_POST['price']))$price = $_POST['price'];
if(isset($_POST['stock']))$stock = $_POST['stock'];
if(isset($_POST['category']))$category = $_POST['category'];

$fileName = $_FILES['image']['name'];
$file_temp = $_FILES['image']['tmp_name'];
$allowed_ext = array("jpg", "jpeg", "gif", "png");
$exp = explode(".", $fileName);
$ext = end($exp);
$ext = strtolower($ext);
$targetFilePath = "../uploads/".basename($fileName);
move_uploaded_file($file_temp, $targetFilePath);
$targetFilePath ="uploads/".basename($fileName);

// Insert image file name into database
//$insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
$query = $pdo->prepare("INSERT INTO `table_portfolio`( `id_portfolioCategory`, `portfolio_name`, `portfolio_photo`) VALUES ('$category','$productname','$targetFilePath')");
$result = $query->execute();
if($result){
    echo "<script>alert('Added Succesfully');window.location.href='../admin-page-portfolio.php';</script>";
}else{
    echo "<script>alert('Failed to add');window.location.href='../admin-page-portfolio.php';</script>";
}
