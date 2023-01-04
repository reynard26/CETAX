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
  <link rel="stylesheet" href="css/contact-us.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,500&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a623eebd84.js" crossorigin="anonymous"></script>

  <title>Contact Us</title>
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
  <div class="container-ctc">
    <div class="head">
      <div class="head-text">
        <h1>Contact Us</h1>
        <p>
          Have some design? What you waiting for? <br>
          Hit the message up!!
        </p>

        <a href="#information" style="padding: 10px 20px;">Hit me!</a>
      </div>

      <img src="images/contact-us.jpg" alt="">
    </div>

    <div id="information" class="information">
      <div class="containerForm" style="flex-basis: 60%; padding: 40px 60px;">
        <h3 id="title-ctc">Sent your message</h3>
        <form>
          <div class="input-row">
            <div class="txt_field">
              <input type="text" name="name" required>
              <span></span>
              <label>Name</label>
            </div>

            <div class="txt_field">
              <input type="text" name="phone" required>
              <span></span>
              <label>Phone</label>
            </div>
          </div>

          <div class="input-row">
            <div class="txt_field">
              <input type="text" name="email" required>
              <span></span>
              <label>Email</label>
            </div>

            <div class="txt_field">
              <input type="text" name="subject" required>
              <span></span>
              <label>Subject</label>
            </div>
          </div>

          <label class="ctc-name">Message</label>
          <textarea rows="10" placeholder="Your Message"></textarea>

          <button type="submit">SEND</button>
        </form>
      </div>

      <div class="info">
        <h3>Reach Us</h3>

        <table>
          <tr>
            <td>Email</td>
            <td>cetax@gmail.com</td>
          </tr>
          <tr>
            <td>Phone</td>
            <td>0812-9898-2929</td>
          </tr>
          <tr class="address-tbl">
            <td id="address">Address</td>
            <td>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0467677334577!2d106.61613675061027!3d-6.257569895448427!2m3!1f0!
                2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb56b25975f9%3A0x50c7d605ba8542f5!2sMultimedia%20Nusantara%20University!5e0!3m2!1sen!2sid!4v1650260810499
                !5m2!1sen!2sid" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </td>
          </tr>
        </table>

      </div>
    </div>
  </div>

  <!-- Footer -->

  <footer>
    <div class="container-footer-contact">
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