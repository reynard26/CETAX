<?php
include_once 'css/all-style.php';
session_start();
$host = 'localhost';
$dbname = 'cetax';
$username = 'root';
$password = '';
$pdo = new PDO("mysql: host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


$result = $pdo->prepare(" SELECT tp.*,pc.category_product  FROM table_product tp INNER JOIN product_category pc ON tp.id_productCategory = pc.id_productCategory");
$result->execute();
$final = $result->fetchAll();
if ($_SESSION['role'] == null) {
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Links -->
    <link rel="stylesheet" href="css/admin-page.css">
    <script src="https://kit.fontawesome.com/a623eebd84.js" crossorigin="anonymous"></script>

    <title>Admin Dashboard</title>
</head>

<body>
    <div class="container-admin">
        <!-- Navigation Menu -->
        <section id="menu">
            <div class="logo">
                <img src="images/cetax 1.png" alt="">
                <h2>CetaX</h2>
            </div>

            <div class="items">
                <li><i class="fa-solid fa-chart-pie"></i><a href="admin-page.php">Product</a></li>
                <li><i class="fa-solid fa-shirt"></i><a href="admin-page-portfolio.php">Portofolio</a></li>
                <li><i class="fa-solid fa-file-lines"></i><a href="admin-page-order.php">Order</a></li>
                <li><i class="fa-solid fa-right-from-bracket"></i><a href="php/logout.php">Log out</a></li>
            </div>
        </section>

        <!-- Navigation -->
        <section id="interface">
            <div class="navigation-admin">Admin</div>

            <div class="container-dashboard">
                <!-- Dashboard Title -->
                <h3 class="i-name">
                    Product
                </h3>

                <!-- Button  -->
                <a href="admin-add-product.php">+  Add New</a>
            </div>

            <!-- Items -->
            <div class="board">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>Product Name</td>
                            <td>Category</td>
                            <td>Status</td>
                            <td>Function</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($final as $key => $product) : ?>
                            <tr>
                                <td class="people">
                                    <div class="people-de">
                                        <h5><?php echo stripslashes($product->product_name) ?></h5>
                                    </div>
                                </td>

                                <td class="people-des">
                                    <h5><?php echo stripslashes($product->category_product) ?></h5>
                                    <p><?php echo stripslashes($product->stock_qty) ?></p>
                                </td>

                                <td class="active">
                                    <p>Active</p>
                                </td>

                                <td class="edit">
                                    <a href="admin-edit-page.php?product=<?php echo stripslashes($product->id_product) ?>">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </section>
    </div>

    <script>
        const open = document.getElementById('open');
        const edit_container = document.getElementById('open-edit');
        const close = document.getElementById('close');

        open.addEventListener('click', () => {
            edit_container.classList.add('show');
        });

        close.addEventListener('click', () => {
            edit_container.classList.remove('show');
        });

        $('.icon').on('click', function() {
            navbar.slideToggle();
        });
    </script>

</body>

</html>