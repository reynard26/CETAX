<?php
include_once 'css/all-style.php';
session_start();
$host = 'localhost';
$dbname = 'cetax';
$username = 'root';
$password = '';
$pdo = new PDO("mysql: host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


$result = $pdo->prepare(" SELECT tableo.*,tp.*,tc.*,pm.*  FROM table_order tableo INNER JOIN table_product tp ON tableo.id_product = tp.id_product INNER JOIN table_customer tc ON tableo.id_customer = tc.id INNER JOIN payment_method pm ON tableo.id_paymentMethod = pm.id_paymentMethod");
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
    <link rel="stylesheet" href="css/admin-edit-order.css">
    <script src="https://kit.fontawesome.com/a623eebd84.js" crossorigin="anonymous"></script>

    <title>Edit Order</title>
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

            <!-- Dashboard Title -->
            <h3 class="i-name">
                Order
            </h3>

            <!-- Items -->
            <div class="board">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>Product Name</td>
                            <td>Description</td>
                            <td>Proof of Payment</td>
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
                                    <h5>Email : <?php echo stripslashes($product->email) ?></h5>
                                    <p>Date : <?php echo stripslashes($product->Date) ?></p>
                                    <p>Address : <?php echo stripslashes($product->address) ?></p>
                                    <p>Size  : <?php echo stripslashes($product->size) ?></p>
                                    <p>Quantity : <?php echo stripslashes($product->quantity) ?></p>
                                    <p>Material : <?php echo stripslashes($product->material) ?></p>
                                    <p>Shipping : <?php echo stripslashes($product->shipping) ?></p>
                                    <p>Total Price : <?php echo stripslashes($product->total_price) ?></p>
                                    <p>Payment : <?php echo stripslashes($product->payment_name) ?></p>
                                </td>

                                <td>
                                    <img src="<?php echo stripslashes ($product->order_photo) ?>" width="400" height="200"/>
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