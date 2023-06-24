<?php 
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Registrasi Berhasil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            text-align: center;
        }

        .container {
            margin-top: 100px;
        }

        h1 {
            color: #333;
            font-size: 28px;
        }

        .link {
            margin-top: 20px;
        }

        .link a {
            background-color:#1E90FF;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .link a:hover {
            background-color: #483D8B;
        }
    </style>
</head>
<body>
<script src="js/bootstrap.min.js"></script>
    <header >
        <nav class="container-fluid">
          <div class="logo">
            <img src="logo.png" alt="Tokopedia Logo">
          </div>
        </nav>
      </header>
    <div class="container">
        <h1>Anda Berhasil Registrasi!</h1>
        <p>Silahkan klik link dibawah ini untuk kembali ke halaman home.</p>
        <div class="link">
            <a href="index.php">Kembali ke halaman home</a>
        </div>
    </div>
</body>
<footer class="footer fixed-bottom">
    <div class="footer-content">
      <p>Hak Cipta &copy; 2023 Namfra</p>
      <ul class="footer-links">
        <li><a href="#">Tentang Kami</a></li>
        <li><a href="#">Syarat dan Ketentuan</a></li>
        <li><a href="#">Kebijakan Privasi</a></li>
      </ul>
    </div>
  </footer>
</html>
