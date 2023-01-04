<?php
session_start();
$host = 'localhost';
$dbname = 'cetax';
$username = 'root';
$password = '';
$pdo = new PDO("mysql: host=$host;dbname=$dbname",$username,$password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$id = $_GET['product'];
$user_id = $_SESSION['user_id'];
if(isset($_POST['product_name']))$productname = $_POST['product_name'];
if(isset($_POST['price']))$price = $_POST['price'];
if(isset($_POST['stock']))$stock = $_POST['stock'];
if(isset($_POST['category']))$category = $_POST['category'];
if(isset($_POST['oldfile']))$oldfile = $_POST['oldfile'];

$fileName = $_FILES['image']['name'];
$file_temp = $_FILES['image']['tmp_name'];
$allowed_ext = array("jpg", "jpeg", "gif", "png");
$exp = explode(".", $fileName);
$ext = end($exp);
if($fileName!="") {
    $targetFilePath = "../uploads/".basename($fileName);
    move_uploaded_file($file_temp, $targetFilePath);
    $targetFilePath ="uploads/".basename($fileName);
}
else if($fileName=="") {
    $targetFilePath = $oldfile;
}
// Insert image file name into database
//$insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
$query = $pdo->prepare("UPDATE `table_portfolio` SET `id_portfolioCategory`='$category',`portfolio_name`='$productname',`portfolio_photo`='$targetFilePath' WHERE id_portfolio = $id");
$result = $query->execute();
if($result){
    echo "<script>alert('Edit Succesfully');window.location.href='../admin-page-portfolio.php';</script>";
}else{
    echo "<script>alert('Edit Failed');window.location.href='../admin-page-portfolio.php';</script>";
}
