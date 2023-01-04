<?php
include_once 'css/all-style.php';
session_start();
$host = 'localhost';
$dbname = 'cetax';
$username = 'root';
$password = '';
$pdo = new PDO("mysql: host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


$result = $pdo->prepare(" SELECT tableo.*,tp.*,tc.*,pm.*  FROM table_order tableo INNER JOIN table_product tp ON tableo.id_product = tp.id_product INNER JOIN table_customer tc ON tableo.id_customer = tc.id INNER JOIN payment_method pm ON tableo.id_paymentMethod = pm.id_paymentMethod WHERE tc.id = tableo.id_customer ORDER BY tableo.id_order DESC LIMIT 1");
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
    <link rel="stylesheet" href="css/detail-order.css">
    <link rel="stylesheet" href="css/order-page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a623eebd84.js" crossorigin="anonymous"></script>

    <title>Order Detail</title>
</head>

<body>
    <!-- Navbar -->
    <nav>
        <div class="logo">
            <img src="images/cetax 1.png" alt="">
            <h1 class="brand">Ceta</h1>
            <h1 class="brand" id="color">X</h1>
        </div>

        <a id="menu-btn">
            <img src="images/menu-icon.png" alt="" />
        </a>

        <div class="kanan">
            <ul class="navbar">
                <li><a href="home.php">Home</a></li>
                <li><a href="product.php">Product</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
                <li><a href="about-us.php">About Us</a></li>
                <li><a href="contact-us.php">Contact Us</a></li>
            </ul>
        </div>

        <?php
        if ($_SESSION['role'] != null) { ?>
            <div class="logout">
                <a id="profile" href="profile-page.php"><i class="fa-solid fa-user"></i></a>

                <p>Hello, <?= $_SESSION['Name'] ?></p>

                <a id="log" href="php/logout.php">Log Out</a>
            </div>
        <?php
        } else {
        ?>
            <div class="login">
                <a id="login-btn" href="login.php">Log In</a>
                <a id="sign-btn" href="signup.php">Sign Up</a>
            </div>
        <?php
        }
        ?>
    </nav>

 <!-- Items -->
 <div class="card-order" style="margin-top: 50px ; margin-bottom: 80px">
        <?php foreach ($final as $key => $product) : ?>
            <div class="title-details"><p>Hello <?php echo stripslashes($product->first_name) ?>, this is your order:</p></div>
            <div class="title-detail">Purchase Receipt</div>
            <div class="infos">
                <div class="row">
                    <div class="col-5 pull-right">
                        <span class="left-detail">Order No.</span> <span id="heading-detail" class="right-detail"> <p><?php echo stripslashes($product->Date) ?></p></span><br>
                        <span class="left-detail"><p><?php echo stripslashes($product->id_order) ?></p></span>
                    </div>
                </div>      
            </div>      
            <div class="pricing">
                <div class="row">
                    <p class="left-detail">Product Name</p> <span class="right-detail"><p><?php echo stripslashes($product->product_name) ?></p></span><br>
                </div>

                <div class="row">
                    <p class="left-detail">Price</p> <span class="right-detail"><p>IDR <?= number_format(stripslashes($product->price), 2, ",", ".") ?></p></span><br>
                </div>
    

                <div class="row">
                    <p class="left-detail">Size</p> <span class="right-detail"><p><?php echo stripslashes($product->size) ?></p></span><br>
                </div>
                
                <div class="row">
                    <p class="left-detail">Quantity</p> <span class="right-detail"><p><?php echo stripslashes($product->quantity) ?></p></span><br>
                </div>

                <div class="row">
                    <p class="left-detail">Material</p> <span class="right-detail"><p><?php echo stripslashes($product->material) ?></p></span><br>
                </div>
                <div class="row">
                    <p class="left-detail">Shipping</p> <span class="right-detail"><p><?php echo stripslashes($product->shipping) ?></p></span><br>
                </div>
                <div class="row">
                    <p class="left-detail">Address</p> <span class="right-detail"><p><?php echo stripslashes($product->address) ?></p></span><br>
                </div>
            </div>
            <div class="total">
                <div class="row">
                    <p class="left-detail">Total Price</p> <span class="right-detail"><big><p> IDR <?= number_format(stripslashes($product->total_price), 2, ",", ".") ?> </p></big></span><br><br>
                </div>
                <div class="row">
                    <p class="left-detail">Payment Method</p> <span class="right-detail"><big><p><?php echo stripslashes($product->payment_name) ?></p></big></span>
                </div>
            </div>
        <?php endforeach ?>    
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



 <!-- Footer -->

 <footer>
        <div class="container-footer-order">
            <div class="cetax">
                <h3>CetaX</h3>

                <div class="footer-img">
                    <a href="https://www.facebook.com/login/">
                        <img src="images/fb.png" alt="">
                    </a>

                    <a href="https://www.instagram.com/accounts/login/?hl=en">
                        <img src="images/ig.png" alt="">
                    </a>

                    <a href="https://www.youtube.com/">
                        <img src="images/yt.png" alt="">
                    </a>
                </div>

                <div class="copyright">
                    <p>
                        &#169 2022 All Right Resource | Kelompok 3
                    </p>
                </div>
            </div>

            <div class="location">
                <h3>Location info</h3>
                <p>
                    Jl. Scientia Boulevard, Curug Sangereng,
                    Kec. Klp. Dua, Kabupaten Tangerang, Banten
                    15810
                </p>
            </div>

            <div class="contact-us">
                <h3>Contact Us</h3>
                <p>
                    Phone 0812-9898-2929 <br>
                    Customer Service 021-55231
                </p>
            </div>

            <div class="useful-link">
                <h3>Useful Link</h3>
                <a href="product.php">
                    Product
                </a>
                <a href="portfolio.php">
                    Portfolio
                </a>
                <a href="about-us.php">
                    About Us
                </a>
                <a href="faq.php">
                    FAQs
                </a>
                <a href="tnc.php">
                    Terms & Condition
                </a>
            </div>
        </div>

    </footer>

    <script src="js/dropdown.js"></script>

</body>

</html>   