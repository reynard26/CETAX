<?php
include_once 'css/all-style.php';
session_start();
if ($_SESSION['role'] == null) {
  header('Location: login.php');
}
$category  = $_GET['category'];
$host = 'localhost';
$dbname = 'cetax';
$username = 'root';
$password = '';
$pdo = new PDO("mysql: host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$sql = "SELECT tp.*, pc.category_portfolio FROM table_portfolio tp INNER JOIN portfolio_category pc ON tp.id_portfolioCategory = pc.id_portfolioCategory WHERE tp.id_portfolioCategory = $category";
$result = $pdo->prepare($sql);
$result->execute();
$final = $result->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Link -->
  <link rel="stylesheet" href="css/portfolio-category.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,500&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a623eebd84.js" crossorigin="anonymous"></script>

  <title>Category</title>
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

    <?php if ($_SESSION['role'] != null) { ?>
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
  <div class="container-port-cat">
    <h1 id="title"><?php echo stripslashes($final[1]->category_portfolio)?> Category</h1>
    <!-- First Row -->
    <div class="portfolio-card">
      <?php foreach ($final as $key => $product) : ?>
        <div class="portfolio-box">
          <a href="<?php echo stripslashes($product->portfolio_photo) ?>">
            <img src="<?php echo stripslashes($product->portfolio_photo) ?>" alt="" >
          </a>
          <h3><?php echo stripslashes($product->portfolio_name) ?></h3>
        </div>

        <!-- <div class="portfolio-box">
                <a href="images/comp2.png">
                    <img src="images/comp2.png" alt="">
                </a>
                <h3>Converse</h3>
            </div>

            <div class="portfolio-box">
                <a href="images/comp3.png">
                    <img src="images/comp3.png" alt="">
                </a>
                <h3>Pull and Bear</h3> 
            </div> -->
      <?php endforeach ?>
    </div>

    <!-- Second Row
        <div class="portfolio-card">
            <div class="portfolio-box">
                <a href="images/compm1.png">
                    <img src="images/compm1.png" width="300px" height="300px" alt="">
                </a>
                <h3>Audi</h3>
            </div>

            <div class="portfolio-box">
                <a href="images/compm2.png">
                    <img src="images/compm2.png" width="300px" height="300px" alt="">
                </a>
                <h3>Volkswagen</h3>
            </div>

            <div class="portfolio-box">
                <a href="images/compm3.png">
                    <img src="images/compm3.png" width="300px" height="300px" alt="">
                </a>
                <h3>Hyundai</h3>
            </div>
        </div>

        Third Row 
        <div class="portfolio-card">
            <div class="portfolio-box">
                <a href="images/coomp1.jpg">
                    <img src="images/coomp1.jpg" alt="">
                </a>
                <h3>Collage Year Book</h3>
            </div>

            <div class="portfolio-box">
                <a href="images/coomp2.jpg">
                    <img src="images/coomp2.jpg" alt="">
                </a>
                <h3>Book Cover</h3>
            </div>

            <div class="portfolio-box">
                <a href="images/coomp3.jpg">
                    <img src="images/coomp3.jpg" alt="">
                </a>
                <h3>Student Year Book</h3>
            </div>
        </div> -->
  </div>

  <!-- Footer -->

  <footer>
    <div class="container-footer-port-cat">
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