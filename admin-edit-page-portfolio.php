<?php
include_once 'css/all-style.php';
session_start();
if ($_SESSION['role'] == null) {
    header('Location: login.php');
}
$portfolioId = $_GET['portfolio'];
$host = 'localhost';
$dbname = 'cetax';
$username = 'root';
$password = '';
$pdo = new PDO("mysql: host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


$result = $pdo->prepare("SELECT * FROM table_portfolio WHERE id_portfolio = $portfolioId");
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

    <title>Edit Portfolio</title>
</head>

<body>

    <div class="content-edit-page">
        <center>
            <h2>Edit Portfolio</h2>
        </center>
    
        <div class="form-edit">
            <form action="php/admin-edit-portfolio-process.php?product=<?php echo stripslashes($final->id_portfolio) ?>" method="post" enctype='multipart/form-data'>
                <div class="txt_field">
                    <input type="text" name="product_name" value="<?php echo stripslashes($final->portfolio_name) ?>" required>
                    <span></span>
                    <label>Portfolio Name</label>
                </div>

                <div class="select">
                    <select name="category" id="category" style="background: #663399; color: white;">
                        <option selected disabled>Choose Category</option>
                        <option value="1" <?php if($final->id_portfolioCategory=="1") echo 'selected="selected"'; ?>>Magazine</option>
                        <option value="2" <?php if($final->id_portfolioCategory=="2") echo 'selected="selected"'; ?>>Clothing</option>
                        <option value="3" <?php if($final->id_portfolioCategory=="3") echo 'selected="selected"'; ?>>Automobile</option>
                    </select>
                </div>

                <div class="txt_field" id="file">
                    <div class="file-upload">
                        <input type="file" name="image"/><input type="hidden" name="oldfile" value="<?=$final->portfolio_photo ?>"><?php echo $final->portfolio_photo?></input>
                    </div>
                </div>

                <div class="btn-choose">
                    <input type="submit" name="submit" value="Update">
                </div>
            </form>
            <a href="php/admin-delete-portfolio.php?portfolio=<?php echo stripslashes($final->id_portfolio) ?>"><input type="submit" id="remove" value="Delete"></a>
        </div>
    </div>

</body>

</html>