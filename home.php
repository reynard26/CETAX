<?php
include_once 'css/all-style.php';
session_start();
if ($_SESSION['role'] == null) {
  header('Location: login.php');
}
$host = 'localhost';
$dbname = 'cetax';
$username = 'root';
$password = '';
$pdo = new PDO("mysql: host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$result = $pdo->prepare(" SELECT * FROM table_product LIMIT 3");
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
  <link rel="stylesheet" href="css/index.css">
  <script src="js/index.js"></script>
  <script src="https://kit.fontawesome.com/a623eebd84.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,500&display=swap" rel="stylesheet">

  <title>Home</title>
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

  <!-- Content -->

  <div class="content">

    <!-- Content Slide -->

    <div class="content-slide">

      <!-- Image slider start -->

      <div class="slider">
        <div class="slides">

          <!-- Button start -->

          <input type="radio" name="radio-btn" id="radio1">
          <input type="radio" name="radio-btn" id="radio2">
          <input type="radio" name="radio-btn" id="radio3">
          <input type="radio" name="radio-btn" id="radio4">
          <input type="radio" name="radio-btn" id="radio5">

          <!-- Button end -->

          <!-- Slide image start -->

          <div class="slide first">
            <img src="images/slider1.jpg" alt="">
          </div>
          <div class="slide">
            <img src="images/slider2.png" alt="">
          </div>
          <div class="slide">
            <img src="images/slider3.png" alt="">
          </div>
          <div class="slide">
            <img src="images/slider4.png" alt="">
          </div>
          <div class="slide">
            <img src="images/slider5.png" alt="">
          </div>

          <!-- Slide image end -->

          <!-- Auto slide start -->

          <div class="nav-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
            <div class="auto-btn4"></div>
            <div class="auto-btn5"></div>
          </div>

          <!-- Auto slide end -->

        </div>

        <!-- Manual slide start -->

        <div class="nav-manual">
          <label for="radio1" class="manual-btn"></label>
          <label for="radio2" class="manual-btn"></label>
          <label for="radio3" class="manual-btn"></label>
          <label for="radio4" class="manual-btn"></label>
          <label for="radio5" class="manual-btn"></label>
        </div>

        <!-- Manual slide end -->

      </div>
    </div>


    <div class="container-product-home">
      <!-- Top Products -->

      <h1>Top Products</h1>

      <!-- Product -->

      <div class="product">
        <?php foreach ($final as $key => $product) : ?>
          <div class="card">
            <div class="img-box">
              <img src="<?php echo stripslashes($product->product_photo) ?>" width = 280px height = 220px alt="">
            </div>

            <div class="price-box">
              <h3><?php echo stripslashes($product->product_name) ?></h3>
              <h2 class="price">IDR <?= number_format(stripslashes($product->price), 2, ",", ".") ?></h2>
              <a href="order-page.php?product=<?php echo stripslashes($product->id_product) ?>" width = 280px height = 200px class="buy">Buy Now</a>
            </div>
          </div>
        <?php endforeach ?>

        <!-- <div class="card">
          <div class="img-box">
              <img src="images/comp3.png" alt="">
          </div>

          <div class="price-box">
              <h3>Santa Monica</h3>
              <h2 class="price">$299.<small>99</small></h2>
              <a href="" class="buy">Buy Now</a>
          </div>
        </div>

        <div class="card">
          <div class="img-box">
              <img src="images/comp2.png" alt="">
          </div>

          <div class="price-box">
              <h3>Crop Top</h3>
              <h2 class="price">$299.<small>99</small></h2>
              <a href="" class="buy">Buy Now</a>
          </div>
        </div>

        <div class="card">
          <div class="img-box">
              <img src="images/bag.png" alt="">
          </div>

          <div class="price-box">
              <h3>Louis Vuitton</h3>
              <h2 class="price">$299.<small>99</small></h2>
              <a href="" class="buy">Buy Now</a>
          </div>
        </div> -->

      </div>
    </div>


    <!-- Why Us & Portfolio -->
    <div class="box-why">
      <!-- Why Us -->
      <img src="images/Why-us.png" id="why-us" alt="">

      <!-- Portfolio -->
      <a id="portofolio" href="portfolio.php">
        <div class="portfolio">
          <h1>Our Portfolio</h1>
          <a id="click" href="portfolio.php">Click Here →</a>

          <a href="portfolio.php">
            <img src="images/baju2.png" alt="">
          </a>
        </div>
      </a>
    </div>

    <!-- Clients -->
    
    <!-- Clients -->
    <div class="clients">
      <h1 id="client-title">Our Clients</h1>

      <div class="img-clients">
        <img src="images/adidas.png" alt="">
        <img src="images/disney.png" alt="">
        <img src="images/vista.png" alt="">
        <img id="mcd" src="images/mcd.png" alt="">
        <img src="images/starbucks.png" alt="">
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
            &#169 2022 All Right Resource <br>| Kelompok 3
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