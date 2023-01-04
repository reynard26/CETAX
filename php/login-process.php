<?php
session_start();

$user = $_POST['user'];
$pw = stripslashes($_POST['pw']);

$host = 'localhost';
$dbname = 'cetax';
$username = 'root';
$password = '';
$pdo = new PDO("mysql: host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$sql = "SELECT * FROM table_customer WHERE username = ?";

$result = $pdo->prepare($sql);
$result->execute([$user]);

if ($row = $result->fetch()) {
    if (password_verify($pw, $row->password)) {
        $_SESSION['username'] = $row->username;
        $_SESSION['role'] = $row->role;
        $_SESSION['user_id'] = $row->id;
        $_SESSION['Name'] = $row->first_name;
        // Jangan lupa ganti
        if ($_SESSION['role'] == "user") {
            echo "<script>alert('Login Succesfully');window.location.href='../home.php';</script>";

        } else if ($_SESSION['role'] == "admin") {
            echo "<script>alert('Login Succesfully');window.location.href='../admin-page.php';</script>"; //direct ke halaman admin        
        }
    } else {
        echo "<script type='text/javascript'>alert('Either password or username is incorrect'); window.location.href='../login.php';</script>";
    }
} else {
    echo "<script type='text/javascript'>alert('Either password or username is incorrect'); window.location.href='../login.php';</script>";
}