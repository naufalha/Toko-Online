<!DOCTYPE html>
<html>
<head>
<title>Toko-Online</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
    .footer-logo {
    width: 100px; /* Adjust the width as needed */
    height: 50px; /* Adjust the height as needed */
    margin-left: auto; /* Move the logo to the right */
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
  
<div class="slideshow-container">
  <h1>Selamat datang di Namfra</h1>
  <p>Tempat belanja online terpercaya</p>
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="img1.jpg" style="width:100%">
    <div class="text">Caption Text</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="img2.jpg" style="width:100%">
    <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="img3.jpg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>

<div class="container">
  <div class="row">
    <?php
    require_once "koneksi.php";

    // Periksa koneksi
    if (mysqli_connect_errno()) {
      echo "Koneksi database gagal: " . mysqli_connect_error();
      exit;
    }

    $sql = "SELECT * FROM barang";
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
      // Output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-lg-3 col-md-4 col-sm-6">';
        echo '<div class="card mb-4" style="width: 18rem;">';
        echo '<img width="200" height="150" src="' . $row["foto"] . '" class="card-img-top" alt="...">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row["nama"] . '</h5>';
        echo '<p class="card-text">Harga: ' . $row["harga"] . '</p>';
        echo '<a href="barang.php?idbarang=' . $row['idbarang'] . '" class="btn btn-primary">Beli</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
    } else {
      echo "0 results";
    }
    mysqli_close($koneksi);
    ?>
  </div>
</div>

<footer class="footer bg-primary text-white">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <p>&copy; 2023 Toko-Online. Hak Cipta Dilindungi</p>
        <img src="logo.png" alt="Toko-Online Logo" class="footer-logo">
      </div>
    </div>
  </div>
</footer>



</body>
</html>
