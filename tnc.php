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
  <link rel="stylesheet" href="css/tnc.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,500&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a623eebd84.js" crossorigin="anonymous"></script>

  <title>Terms & Conditions</title>
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

  <!-- Content -->
  <div class="container-tnc">

    <div class="tnc-title">
      <h1>Terms & Conditions</h1>
      <h3>The Terms & Conditions applies if you use our services</h4>
    </div>

    <div class="tnc-section">
      <h2>Our Policy</h2>

      <div class="box-tnc-section">
        <p class="heading-tnc-box">Terms & Conditions</p>
        <div class="tnc">
          <details>
            <summary>General Policy</summary>
            <p class="answer" style="text-align: justify;">Kami berhak menolak layanan kepada siapa pun dengan alasan apa pun kapan saja.
Anda memahami bahwa konten Anda (tidak termasuk informasi kartu kredit), dapat ditransfer tanpa enkripsi dan melibatkan: </br>
(a) transmisi melalui berbagai jaringan; dan </br>
(b) perubahan untuk menyesuaikan dengan persyaratan teknis jaringan atau perangkat penghubung. Informasi kartu kredit selalu dienkripsi selama transfer melalui jaringan. </br> </br>
Anda setuju untuk tidak mereproduksi, menggandakan, menyalin, menjual, menjual kembali, atau mengeksploitasi bagian mana pun dari Layanan, penggunaan Layanan, atau akses ke Layanan atau kontak apa pun di situs web tempat layanan disediakan, tanpa izin tertulis dari kami.</p>
          </details>

          <details>
            <summary>Online Store Policy</summary>
            <p class="answer" style="text-align: justify;">Dengan menyetujui Persyaratan Layanan ini, Anda menyatakan bahwa Anda setidaknya berusia dewasa di negara bagian atau provinsi tempat tinggal Anda, atau bahwa Anda adalah usia mayoritas di negara bagian atau provinsi tempat tinggal Anda dan Anda telah memberi kami persetujuan Anda untuk mengizinkan salah satu tanggungan kecil Anda untuk menggunakan situs ini. </br></br>
Anda tidak boleh menggunakan produk kami untuk tujuan ilegal atau tidak sah, Anda juga tidak boleh, dalam penggunaan Layanan, melanggar hukum apa pun di yurisdiksi Anda (termasuk tetapi tidak terbatas pada undang-undang hak cipta).</br></br>
Anda tidak boleh mengirimkan worm atau virus atau kode apa pun yang bersifat merusak.
Pelanggaran atau pelanggaran terhadap Ketentuan mana pun akan mengakibatkan penghentian Layanan Anda dengan segera.</p>
          </details>

          <details>
            <summary>Return & Refund Policy</summary>
            <p class="answer" style="text-align: justify;">1. Pembeli harus mengajukan pengembalian barang terlebih dahulu melalui chat yang tersedia pada website, dengan alasan dan bukti yang jelas</br>
2. Jika admin telah menyetujui pengajuan pengembalian barang, pembeli dapat mengirim kembali barang ke alamat yang tertera dibawah. (Ongkos kirim ditanggung oleh pembeli)</br>
3. Pengembalian barang hanya dapat dilakukan dalam jangka waktu 2 hari setelah barang diterima</br>
4. Barang yang diretur harus dalam keadaan yang sama seperti saat diterima (Pembeli dianjurkan untuk membuat video unboxing barang secara lengkap dan tidak boleh diedit)</br>
5. Kami tidak menerima permohonan retur ataupun refund atas design yang diupload untuk di print di website kami.</p>
          </details>

          <details>
            <summary>Delivery Policy</summary>
            <p class="answer" style="text-align: justify;">Metode Pengiriman</br>
CetaX saat ini menyediakan layanan pengiriman barang ke seluruh Indonesia melalui 2 jenis metode pengiriman berikut :</br>
  - Pengiriman barang melalui jasa logistik partner seperti JNE</br>
  - Pengambilan langsung ke gerai CetaX</br></br>

Biaya Pengiriman</br>
Biaya pengiriman ditentukan berdasarkan berat produk dan lokasi pengiriman. Secara otomatis, sistem kami akan menghitung biaya pengiriman.
Khusus untuk pengambilan langsung ke gerai CetaX (pick up), biaya pengirimannya gratis atau tidak dikenakan biaya pengiriman.</p>
          </details>

          <details>
            <summary>Privacy Policy</summary>
            <p class="answer" style="text-align: justify;">1. CetaX tidak menjual atau memberikan informasi pribadi pelanggan yang dikumpulkan secara online melalui ataupun kepada pihak ketiga.</br>
2. Informasi pribadi yang dikumpulkan secara online hanya digunakan untuk kepentingan internal, informasi pribadi yang kami kumpulkan termasuk:</br>
- Nama</br>
- Email</br>
- Telepon </br>
- Alamat Pengiriman</br>
3. Informasi pribadi yang akan dikumpulkan akan digunakan untuk hal-hal seperti:</br>
- Mengirimkan produk yang telah Anda beli di web kami</br>
- Menginformasikan kepada Anda tentang pengiriman barang dan bantuan oleh cutomer service kami</br>
- Memberikan informasi produk yang relevan kepada Anda.</p>
          </details>
        </div>
      </div>
    </div>

  </div>

  <!-- Footer -->

  <footer>
    <div class="container-footer-tnc">
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

</body>

</html>