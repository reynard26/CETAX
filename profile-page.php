<?php
include_once 'css/all-style.php';
session_start();
$id = $_SESSION['user_id'];
if ($_SESSION['role'] == null) {
    header('Location: login.php');
}
$host = 'localhost';
$dbname = 'cetax';
$username = 'root';
$password = '';
$pdo = new PDO("mysql: host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$sql = "SELECT * FROM table_customer WHERE id= $id";
$result = $pdo->prepare($sql);
$result->execute();
$final = $result->fetch()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Links -->
    <link rel="stylesheet" href="css/edit-profile.css">
    <script src="https://kit.fontawesome.com/a623eebd84.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,500&display=swap" rel="stylesheet">

    <title>Profile</title>
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
                <a id="profile" href="#"><i class="fa-solid fa-user"></i></a>

                <p>Hello,
                    <?= $_SESSION['Name'] ?>
                </p>

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

    <!-- Containers -->
    <div class="container-profile-first">

        <!-- Content -->
        <div class="container-profile-box">
            <div class="profileImage">
                <img src="images/profile-picture.png" alt="Profile Picture" />
            </div>

            <div class="profileBox">
                <div class="welcomeProfile">
                    <h1>Hello, <?= $_SESSION['Name'] ?></h1>
                </div>

                <div class="profileForm">
                    <h1>Profile</h1>

                    <!-- Profile Information -->
                    <div class="profile-info">
                        <p>Full Name <br> <?= stripslashes($final->first_name . ' ' . $final->last_name) ?></p>

                        <p>Email <br> <?= stripslashes($final->email) ?></p>

                        <p>Phone <br> <?= stripslashes($final->no_telp) ?></p>

                        <p>Address <br> <?= stripslashes($final->address) ?></p>

                        <p>Postal code <br> <?= stripslashes($final->postalcode) ?></p>
                    </div>

                    <a href="edit-profile.php">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <footer>
        <div class="container-footer">
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
                        &#169 2022 All Right Resource <br>| Kelompok 2
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

    <!-- Inner JS -->
    <script>
        function Validate() {
            var password = document.getElementById("pw").value;
            var confirmPassword = document.getElementById("confirmPw").value;
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
    </script>

    <script src="js/dropdown.js"></script>
</body>

</html>