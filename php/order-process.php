<?php
session_start();
$host = 'localhost';
$dbname = 'cetax';
$username = 'root';
$password = '';
$pdo = new PDO("mysql: host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$id = $_GET['product'];
$result = $pdo->prepare("SELECT * FROM table_product WHERE id_product = $id");
$result->execute();
$final = $result->fetch();
$user_id = $_SESSION['user_id'];
if (isset($_POST['size'])) $size = $_POST['size'];
if (isset($_POST['qty'])) $qty = $_POST['qty'];
if (isset($_POST['material'])) $material = $_POST['material'];
if (isset($_POST['shipping'])) $shipment = $_POST['shipping'];
if (isset($_POST['payment'])) $payment = $_POST['payment'];
$date = date("Y/m/d");
$total_price = $final->price * $qty;
$fileName = $_FILES['image']['name'];
$file_temp = $_FILES['image']['tmp_name'];
$targetFilePath ="../uploads/".basename($fileName);
move_uploaded_file($file_temp, $targetFilePath);   
$targetFilePath ="uploads/".basename($fileName);

if ($qty > $final->stock_qty) {
    echo "<script>alert('Order Failed, demand is greater than stock');window.location.href='../order-page.php';</script>";
}
else{
    $total_qty = $final->stock_qty - $qty;
    $query = $pdo->prepare("INSERT INTO `table_order`( `id_product`, `id_customer`, `size`, `quantity`, `material`, `shipping`, `total_price`, `id_paymentMethod`, `Date`, `order_photo`) VALUES ('$id','$user_id','$size','$qty','$material','$shipment','$total_price','$payment','$date','$targetFilePath')");
    $result = $query->execute();
    $query = $pdo->prepare("UPDATE `table_product` SET `stock_qty`='$total_qty'WHERE id_product = $id");
    $result = $query->execute();

    echo "<script>alert('Order Success');window.location.href='../detail-order.php';</script>";
}
