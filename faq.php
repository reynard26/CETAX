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
    <link rel="stylesheet" href="css/faq.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a623eebd84.js" crossorigin="anonymous"></script>

    <title>FAQs</title>
</head>

<body>

    <!-- Navbar -->
    <nav>
        <div class="logo">
            <img src="images/cetax 1.png" alt="">
            <h1 class="brand">Ceta</h1>
            <h1 class="brand" id="color">X</h1>
        </div>

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

    <div class="container-faq">

        <div class="faq-title">
            <h1>Frequently Asked Question</h1>
            <h3>Get your question answered here</h4>
        </div>

        <div class="faq-category">
            <div class="box-faq">
                <img src="images/order.png" alt="">
                <h3>Order</h3>
            </div>

            <div class="box-faq">
                <img src="images/payment.png" alt="">
                <h3>Payment</h3>
            </div>

            <div class="box-faq">
                <img src="images/delivery.png" alt="">
                <h3>Delivery</h3>
            </div>

            <div class="box-faq">
                <img src="images/damaged.png" alt="">
                <h3>Damage</h3>
            </div>

            <div class="box-faq">
                <img src="images/material.png" alt="">
                <h3>Material</h3>
            </div>

            <div class="box-faq" id="box-long">
                <img src="images/wa.png" alt="">
                <h3>Further Question? <br> Contact Us</h3>
                <p style="color: white"> WA 0812-9898-2929</p>
            </div>

        </div>

        <div class="faq-section">
            <h2>The Questions and Answers</h2>

            <div class="box-faq-section">
                <p class="heading-faq-box">FAQs</p>
                <div class="faqs">
                    <details>
                        <summary>Order</summary>
                        <p class="answer" style="text-align: justify;">Cara pemesanan</br></br>

Bagaimana cara order di CetaX ?</br>
Anda dapat memesan secara online dengan fitur website kami disini.</br></br>

Bagaimana kalau saya ingin lihat-lihat contoh atau hasil cetakan dari CetaX?</br>
Anda bisa datang langsung ke outlet kami, keterangan ada di kolom alamat (halaman bawah).</br></br>

Apakah saya bisa order sesuai dengan yang saya mau jika produknya tidak ada di website?</br>
Anda bisa chat atau email kami di cetax@gmail.com dengan bertanya kepada Customer Service kami.</br></br>

Apakah saya dapat membatalkan atau mengubah pesanan yang sudah terproses?</br>
Setelah pembayaran kami terima, order sudah diproses. Tetapi sebelum proses final, anda masih dapat merubah atau kembali ke awal. Jadi, pastikan untuk mengecek ulang semua detail pesanan anda sebelum melakukan pembayaran.</p>
                    </details>

                    <details>
                        <summary>Payment</summary>
                        <p class="answer" style="text-align: justify;">Bagaimana cara bayar produk yang saya sudah pesan?</br>
Anda bisa membayarnya lewat virtual account kami yang diinformasikan via website atau email, atau transfer ke rekening bank kami seperti yang tertera.</p>
                    </details>

                    <details>
                        <summary>Delivery</summary>
                        <p class="answer" style="text-align: justify;">Apakah pengiriman instaprint bisa sampai luar Jakarta dan Tangerang?</br>
Bisa, karena pengiriman di luar Jakarta dan Tangerang kami menggunakan JNE/Courier Service</br></br>

Dimanakah tempat pengambilan barang apabila ingin pick up/ambil langsung?</br>
Pengambilan barang bisa di offline store kami dengan memberikan nota pengambilan di CetaX Gading Serpong</br></br>

Apakah bisa pick up menggunakan Gojek, Grab, Etc?</br>
Bisa, dengan tempat pick up offline store kami dan silahkan hubungi store kami terlebih dahulu untuk konfirmasi</p>
                    </details>

                    <details>
                        <summary>Damage</summary>
                        <p class="answer" style="text-align: justify;">Bagaimana cara mengembalikan jika barang diterima dalam keadaan rusak?</br>
Apabila produk yang diterima dalam kondisi rusak, anda dapat mengajukan komplain dalam waktu maksimal 3 hari setelah barang diterima. Anda bisa email ke cetax@gmail.com, kirim foto kerusakan barang seperti apa dan kirim kembali kepada kami, maka kami akan mencetak ulang tanpa biaya tambahan.</p>
                    </details>

                    <details>
                        <summary>Material</summary>
                        <p class="answer" style="text-align: justify;">Apakah saya bisa mendapatkan cetakan di bahan kertas selain yang ada di website?</br>
Mungkin anda bisa datang ke outlet store offline kami untuk kemungkinan ada bahan yang anda inginkan atau hubungi offline store kami.</br></br>

Anda memiliki pertanyaan lain?</br>
Silahkan hubungi kami dan kami akan membalas / merespon anda dalam waktu 24 jam.</p>
                    </details>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->

    <footer>
        <div class="container-footer-faq">
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
                        &#169 2022 All Right Resource | Kelompok 2
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

</body>

</html>