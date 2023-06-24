<?php 
    session_start();
    error_reporting(E_ALL & E_NOTICE & E_DEPRECATED);
    $conn = mysqli_connect('localhost','root','','toko');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $submit = $_POST['submit'];

    if($submit) {
        $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);

        if($row['username']!=""){
            // berhasil login
            
            $_SESSION['username'] = $row['username'];
            $_SESSION['kategori'] = $row['kategori'];
            $_SESSION['id'] = $row['id'];
?>  
            <script language script="Javascript">
                alert('Anda Login Sebagai <?php echo $row['username']; ?>');
                document.location='hasillogin.php';
            </script>
<?php 
        }else{
            // gagal login
?>
        <script language script="Javascript">
            alert('Gagal Login');
            document.location='login.php';
        </script>
<?php
        }
    }
?>
<!-- <form action="login.php" method="post">
    <p align='center'>
        Username : <input type="text" name="username"> <br>
        Password : <input type="password" name="password"> <br>
        <input type="submit" name="submit">
    </p>
</form> -->

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Login</h2>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary"></input>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
