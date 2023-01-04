<?php
session_start();
$host = 'localhost';
$dbname = 'cetax';
$username = 'root';
$password = '';
$pdo = new PDO("mysql: host=$host;dbname=$dbname",$username,$password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$id = $_GET['portfolio'];
$query = $pdo->prepare("DELETE FROM `table_portfolio` WHERE id_portfolio = $id");
$result = $query->execute();
if($result){
    echo "<script>alert('Delete Succesfully');window.location.href='../admin-page-portfolio.php';</script>";
}else{
    echo "<script>alert('Delete Failed');window.location.href='../admin-page-portfolio.php';</script>";
}