<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Pengguna</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            text-align: center;
        }
        form {
            width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #1E90FF;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
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
        <a class="lomgin" href="login.php">Login</a> <a class="lomgin2" href="register.php">Register</a>
      </header>
    <h2>Registrasi Pengguna</h2>
    <form method="POST" action="register.php">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="pass">Password:</label>
        <input type="pass" id="pass" name="pass" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="hp">No telepon:</label>
        <input type="number" id="hp" name="hp" required>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required></textarea>

        <label for="bank">Bank</label>
        <textarea id="bank" name="bank" required></textarea>

        <label for="rekening">Rekening</label>
        <textarea id="rekening" name="rekening" required></textarea>

        <input type="submit" name="register" value="Register">
    </form>
    
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
</body>
</html>
<?php
if(isset($_POST['register'])){
    // Ambil nilai dari input field
    $nama = $_POST['nama'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];
    $alamat = $_POST['alamat'];
    $bank = $_POST['bank'];
    $rekening = $_POST['rekening'];
    // Lakukan validasi data yang diterima
    if(empty($nama) || empty($pass) || empty($email)){
        echo "Harap isi semua field.";
    } else {
        // Lakukan penyimpanan data ke dalam database
        // Lakukan koneksi ke database

        require_once "koneksi.php";

        // Query untuk memasukkan data pengguna ke dalam tabel
        $query = "INSERT INTO login ( `username`, `email`, `password`, `alamat`, `rekening`, `bank`, `hp`) VALUES ('$nama', '$email', '$pass', '$alamat', '$rekening', '$bank', '$hp');";
        echo $query;
        // Jalankan query
        mysqli_query($koneksi, $query);
        header("Location: hasilregister.php");

        // Tampilkan pesan sukses atau arahkan ke halaman login

    
        exit;
    }
}
?>