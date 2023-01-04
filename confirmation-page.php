<?php
include_once 'css/all-style.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Links -->
    <link rel="stylesheet" href="css/confirmation-page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a623eebd84.js" crossorigin="anonymous"></script>

    <title>Confirmation Page</title>
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

    <!-- Container Confirmation -->

    <div class="container-confirmation">
        <!-- Content -->
        <h1 id="confirmation-title">Confirmation Page</h1>

        <div class="content-confirmation" style="height: auto;">
            <!-- Product & Product Description -->
            <div class="left-content">

                <!-- FOTONYA GANTI SAMA FOTO YANG DI UPLOAD -->
                <img src="images/baju3.png" alt="">

                <div class="product-desc">
                    <h3>Product Description</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure
                        repudiandae natus enim? Explicabo quae eum dignissimos possimus consectetur
                        nam optio cumque temporibus perspiciatis commodi, fugit, animi unde voluptatibus perferendis atque?
                    </p>
                </div>
            </div>

            <div class="right-content">
                <!-- Product Detail & Product Options -->
                <div class="product-det">
                    <h1>Product Detail</h1>
                    <p>
                        Price <br>
                        <s>IDR 60.000</s> $<?php echo stripslashes($final->price) ?>
                    </p>

                    <p>
                        Estimated Production Time <br>
                        &plusmn 3 days
                    </p>

                    <p>
                        Quantity <br>
                        2
                    </p>

                    <p>
                        Size <br>
                        L
                    </p>

                    <p>
                        Material <br>
                        Cotton 24s
                    </p>
                </div>

                <div class="product-op">
                    <div class="form-text">
                        <h1 class="title-options">Shipping Options</h1>
                        <form action="php/order-process.php?product=<?php echo stripslashes($final->id_product) ?>" method="post">
                            <div class="address-inform">
                                <p>
                                    Address <br>
                                    Jalan Mawar
                                </p>
                            </div>

                            <div class="select">
                                <select name="shipping" class="ship" style="background: #663399; color: white;">
                                    <option selected disabled>Choose Shipping Method</option>
                                    <option value="Same Day">Same Day</option>
                                    <option value="Next Day">Next Day</option>
                                </select>
                            </div>

                            <h1 class="title-options">Payment Options</h1>
                            <div class="select" id="payment">
                                <select name="payment" id="payment" style="background: #663399; color: white;">
                                    <option selected disabled>Choose Payment Method</option>
                                    <option value="1">Gopay</option>
                                    <option value="2">Ovo</option>
                                    <option value="3">Shopeepay</option>
                                    <option value="4">Debit/Credit Card</option>
                                </select>
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