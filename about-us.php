<?php
include_once 'css/all-style.php';
session_start();
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
    <link rel="stylesheet" href="css/about-us.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a623eebd84.js" crossorigin="anonymous"></script>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <title>About Us</title>
</head>

<body>
    <!-- Navbar -->
    <nav>
        <div class="logo">
            <img src="images/cetax 1.png" alt="">
            <h1>Ceta</h1>
            <h1 id="color">X</h1>
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

    <!-- Content -->
    <div class="content-about">

        <div class="banner">
            <h1>CetaX <br>"CetaX sana - CetaX sini, dimana-mana CetaX"</h1>
            <img src="images/about-us.png" alt="">
        </div>

        <div class="about-cetax">
            <h1>About Us</h1>
        </div>

        <div class="cetax-is">
            <h2>
                CetaX merupakan suatu bisnis yang menyediakan platform layanan percetakan online atau digital printing
                yang berbasis website. CetaX memfasilitasi layanan percetakan yang menyediakan berbagai informasi terkait
                promosi, produk, portofolio, klien, dan teknologi yang digunakan CetaX, serta pencatatan penjualan dan
                penerimaan pesanan secara otomatis.
            </h2>
        </div>

        <!-- Our Technology -->
        <div class="tech-title">
            <h1>Our Technology</h1>
        </div>

        <!-- Swiper -->
        <div class="swiper mySwiper container-abt">
            <div class="swiper-wrapper contain">

                <div class="swiper-slide card-abt">
                    <div class="card-content">
                        <div class="card-image">
                            <img src="images/tech1.jpg" height="200" width="200" alt="">
                        </div>

                        <div class="card-title">
                            <h1>Clothes Printing Technology</h1>
                            <p>Technology for printing clothes</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide card-abt">
                    <div class="card-content">
                        <div class="card-image">
                            <img src="images/tech2.png" height="200" width="200" alt="">
                        </div>

                        <div class="card-title">
                            <h1>Polaroid Printer Technology</h1>
                            <p>Technology for printing polaroid photos</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide card-abt">
                    <div class="card-content">
                        <div class="card-image">
                            <img src="images/tech3.jpg" height="200" width="200" alt="">
                        </div>

                        <div class="card-title">
                            <h1>Sticker Printing Technology</h1>
                            <p>Technology for printing mini and deco sticker</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide card-abt">
                    <div class="card-content">
                        <div class="card-image">
                            <img src="images/tech4.jpg" height="200" width="200" alt="">
                        </div>

                        <div class="card-title">
                            <h1>Mug Printing Technology</h1>
                            <p>Technology for printing mug</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide card-abt">
                    <div class="card-content">
                        <div class="card-image">
                            <img src="images/tech5n.png" height="200" width="200" alt="">
                        </div>

                        <div class="card-title">
                            <h1>Textile Printing Technology</h1>
                            <p>Technology for printing textile</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide card-abt">
                    <div class="card-content">
                        <div class="card-image">
                            <img src="images/tech6.jpg" height="200" width="200" alt="">
                        </div>

                        <div class="card-title">
                            <h1>LED UV Technology</h1>
                            <p>Technology for printing Newsletters and Magazine</p>
                        </div>
                    </div>
                </div>


            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

        <!-- Client Manual -->
        <div class="container-manual">

            <div class="card-abt">
                <div class="card-content">
                    <div class="card-image">
                        <img src="images/tech1.jpg" alt="">
                    </div>

                    <div class="card-title">
                        <h1>Clothes Printing Technology</h1>
                        <p>Technology for printing clothes</p>
                    </div>
                </div>
            </div>

            <div class="card-abt">
                <div class="card-content">
                    <div class="card-image">
                        <img src="images/tech2.png" alt="">
                    </div>

                    <div class="card-title">
                        <h1>Polaroid Printer Technology</h1>
                        <p>Technology for printing clothes</p>
                    </div>
                </div>
            </div>

            <div class="card-abt">
                <div class="card-content">
                    <div class="card-image">
                        <img src="images/tech3.jpg" alt="">
                    </div>

                    <div class="card-title">
                        <h1>Sticker Printing Technology</h1>
                        <p>Technology for printing clothes</p>
                    </div>
                </div>
            </div>

            <div class="card-abt">
                <div class="card-content">
                    <div class="card-image">
                        <img src="images/tech4.jpg" alt="">
                    </div>

                    <div class="card-title">
                        <h1>Mug Printing Technology</h1>
                        <p>Technology for printing clothes</p>
                    </div>
                </div>
            </div>

            <div class="card-abt">
                <div class="card-content">
                    <div class="card-image">
                        <img src="images/tech5.png" alt="">
                    </div>

                    <div class="card-title">
                        <h1>Textile Printing Technology</h1>
                        <p>Technology for printing clothes</p>
                    </div>
                </div>
            </div>

            <div class="card-abt">
                <div class="card-content">
                    <div class="card-image">
                        <img src="images/tech5.png" alt="">
                    </div>

                    <div class="card-title">
                        <h1>Textile Printing Technology</h1>
                        <p>Technology for printing clothes</p>
                    </div>
                </div>
            </div>

        </div>



    </div>

    <!-- Footer -->

    <footer>
        <div class="container-footer-about">
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

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <script src="js/dropdown.js"></script>
</body>

</html>