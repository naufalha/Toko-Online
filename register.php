<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Pengguna</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 400px;
            margin: 50px auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrasi Pengguna</h2>
        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>


<?php
if(isset($_POST['register'])){
    // Ambil nilai dari input field
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Lakukan validasi data yang diterima
    if(empty($username) || empty($password) || empty($email)){
        echo "Harap isi semua field.";
    } else {
        // Lakukan penyimpanan data ke dalam database
        // Lakukan koneksi ke database

        $koneksi = mysqli_connect("localhost", "root", "", "toko");

        // Query untuk memasukkan data pengguna ke dalam tabel
        $query = "INSERT INTO login (username, password, email) VALUES ('$username', '$password', '$email')";

        // Jalankan query
        mysqli_query($koneksi, $query);
        header("Location: hasilregister.php");

        // Tampilkan pesan sukses atau arahkan ke halaman login

        exit;
    }
}
?>
