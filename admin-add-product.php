<?php
include_once 'css/all-style.php';
session_start();
if ($_SESSION['role'] == null) {
    header('Location: login.php');
}
$host = 'localhost';
$dbname = 'cetax';
$username = 'root';
$password = '';
$pdo = new PDO("mysql: host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Links -->
    <link rel="stylesheet" href="css/admin-edit-page.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,500&display=swap" rel="stylesheet">

    <title>Add Product</title>
</head>

<body>

    <div class="content-edit-page">
        <center>
            <h2>Add Product</h2>
        </center>

        <div class="form-edit">
            <form action="php/admin-add-product-process.php"
                method="post" enctype='multipart/form-data'>
                <div class="txt_field">
                    <input type="text" name="product_name" 
                        required>
                    <span></span>
                    <label>Add Product Name</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="price" required>
                    <span></span>
                    <label>Add Price</label>
                </div>

                <div class="txt_field">
                    <input type="text" name="stock" required>
                    <span></span>
                    <label>Add Stock</label>
                </div>

                <div class="txt_field">
                    <textarea name="description" id="desc" placeholder="Description" cols="30" rows="10"></textarea>
                </div>

                <div class="select">
                    <select name="category" id="category" style="background: #663399; color: white;">
                        <option selected disabled>Choose Category</option>
                        <option value="1">T-shirt</option>
                        <option value="2">Mug</option>
                        <option value="3">Tote bag</option>
                        <option value="4">Mini Sticker</option>
                    </select>
                </div>

                <div class="txt_field" id="file">
                    <div class="file-upload">
                        <input type="file" name="image" /><input type="hidden" name="oldfile"></input>
                    </div>
                </div>

                <div class="btn-choose">
                    <input type="submit" name="submit" value="Add">
                </div>
            </form>
        </div>
    </div>

</body>

</html>