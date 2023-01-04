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
    <link rel="stylesheet" href="css/order-page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a623eebd84.js" crossorigin="anonymous"></script>

    <title>Order</title>
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


    <div class="container-order">
        <!-- Content -->
        <h1 id="order-title"><?php echo stripslashes($final->product_name) ?></h1>

        <div class="content-order" style="height: auto;">
            <!-- Product & Product Description -->
            <div class="left-content">
                    <figure>
                        <img src="<?php echo stripslashes($final->product_photo) ?>" alt="" width="400px" height="350px">
                    </figure>


                <div class="product-desc">
                    <h3>Product Description</h3>
                    <p>
                        <?php echo stripslashes($final->Description) ?>
                    </p>
                </div>

                <div class="product-desc">
                    <h3>Payment Info</h3>
                    <p>
                        Transfer Ke rekening 71233321 atas nama CetaX
                    </p>
                    <br>
                    <p>
                        Trasfer Ke nomor 081231231312 untuk Shopeepay, Gopay, Ovo atas nama CetaX
                    </p>
                </div>

            </div>

            <div class="right-content">
                <!-- Product Detail & Product Options -->
                <div class="product-det-order">
                    <h1>Product Detail</h1>
                    <p>
                        Price <br>
                        <!-- <s>IDR 60.000</s> --> IDR <?= number_format(stripslashes($final->price), 2, ",", ".") ?>
                    </p>

                    <p>
                        Estimated Production Time <br>
                        &plusmn 3 days
                    </p>
                </div>

                <div class="product-op">
                    <div class="form-text">
                        <h1>Product Options</h1>
                        <form action="php/order-process.php?product=<?php echo stripslashes($final->id_product) ?>" method="post" enctype='multipart/form-data'>
                            <div class="select">
                                <select name="size" id="size" style="background: #663399; color: white;">
                                    <option selected disabled>Choose Size</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                            </div>

                            <div class="txt_field" id="qty-order">
                                <input type="text" name="qty" required>
                                <span></span>
                                <label>Quantity</label>
                            </div>

                            <div class="select">
                                <select name="material" id="material" style="background: #663399; color: white;">
                                    <option selected disabled>Choose Material</option>
                                    <option value="Cotton 20s">Cotton 20s</option>
                                    <option value="Cotton 24s">Cotton 24s</option>
                                    <option value="Cotton 30s">Cotton 30s</option>
                                    <option value="Vinyl">Vinyl</option>
                                    <option value="Transparant">Transparant</option>
                                    <option value="Sticker">Sticker</option>
                                </select>
                            </div>

                            <div class="select">
                                <select name="shipping" class="ship" style="background: #663399; color: white;">
                                    <option selected disabled>Choose Shipping Method</option>
                                    <option value="Same Day">Same Day</option>
                                    <option value="Next Day">Next Day</option>
                                </select>
                            </div>

                            <div class="select" id="payment">
                                <select name="payment" id="payment" style="background: #663399; color: white;">
                                    <option selected disabled>Choose Payment Method</option>
                                    <option value="1">Gopay</option>
                                    <option value="2">Ovo</option>
                                    <option value="3">Shopeepay</option>
                                    <option value="4">Debit/Credit Card</option>
                                </select>
                            </div>
                            <p style="margin-top: 25px" >Upload Your Proof of Payment</p>
                            <div class="file-upload">
                                <input type="file" name="image" id="image">
                            </div>

                            <div class="btn">
                                <div class="btn-purchase">
                                    <input type="submit" value="Purchase Now" style="color: white;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




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