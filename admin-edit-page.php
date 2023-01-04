<?php
include_once 'css/all-style.php';
session_start();
if ($_SESSION['role'] == null) {
    header('Location: login.php');
}
$productId = $_GET['product'];
$host = 'localhost';
$dbname = 'cetax';
$username = 'root';
$password = '';
$pdo = new PDO("mysql: host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


$result = $pdo->prepare("SELECT * FROM table_product WHERE id_product = $productId");
$result->execute();
$final = $result->fetch();
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

    <title>Edit Product</title>
</head>

<body>

    <div class="content-edit-page">
        <center>
            <h2>Edit Product</h2>
        </center>
    
        <div class="form-edit">
            <form action="php/admin-edit-process.php?product=<?php echo stripslashes($final->id_product) ?>" method="post" enctype='multipart/form-data'>
                <div class="txt_field">
                    <input type="text" name="product_name" value="<?php echo stripslashes($final->product_name) ?>" required>
                    <span></span>
                    <label>Product Name</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="price" value="<?php echo stripslashes($final->price) ?>" required>
                    <span></span>
                    <label>Price</label>
                </div>

                <div class="txt_field">
                    <input type="text" name="stock" value="<?php echo stripslashes($final->stock_qty) ?>" required>
                    <span></span>
                    <label>Stock</label>
                </div>

                <div class="txt_field">
                    <textarea name="description" id="desc" placeholder="Description" cols="30" rows="10" required><?php echo stripslashes($final->Description) ?></textarea>
                </div>

                <div class="select">
                    <select name="category" id="category" style="background: #663399; color: white;">
                        <option selected disabled>Choose Category</option>
                        <option value="1" <?php if($final->id_productCategory=="1") echo 'selected="selected"'; ?>>T-shirt</option>
                        <option value="2" <?php if($final->id_productCategory=="2") echo 'selected="selected"'; ?>>Mug</option>
                        <option value="3" <?php if($final->id_productCategory=="3") echo 'selected="selected"'; ?>>Tote bag</option>
                        <option value="4" <?php if($final->id_productCategory=="4") echo 'selected="selected"'; ?>>Mini Sticker</option>
                    </select>
                </div>

                <div class="txt_field" id="file">
                    <div class="file-upload">
                        <input type="file" name="image"/><input type="hidden" name="oldfile" value="<?=$final->product_photo ?>"><?php echo $final->product_photo?></input>
                    </div>
                </div>

                <div class="btn-choose">
                    <input type="submit" name="submit" value="Update">
                </div>
            </form>
            <a href="php/admin-delete-process.php?product=<?php echo stripslashes($final->id_product) ?>"><input type="submit" id="remove" value="Delete"></a>  
        </div>
    </div>

</body>

</html>