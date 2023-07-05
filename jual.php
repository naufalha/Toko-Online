<!DOCTYPE html>
<html>
<head>
    <title>Form Upload Barang</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 20px;
        }
        
        h2 {
            color: #333333;
            text-align: center;
            margin-bottom: 20px;
        }
        
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: wheat;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }
        
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        textarea {
            resize: vertical;
            height: 100px;
        }
        
        input[type="file"] {
            display: block;
            margin-top: 5px;
        }
        
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        
        .button-container input[type="submit"] {
            background-color: #1E90FF;
            color: #ffffff;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        .button-container input[type="submit"]:hover {
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
        <a class="lomgin2" href="hasillogin.php">Home</a> 
        <a class="lomgin2" href="jual.php">jual barang</a>
        <a class="lomgin2" href="user_barang.php">barang saya</a>
        <a class="lomgin2" href="penjualan.php">Barang Terjual</a> 
        <a class="lomgin2" href="logout.php">Logout</a> <a class="lomgin2" href="register.php">Register</a>
        <a class="lomgin2" href="keranjang.php">keranjang</a>
      </header>

    <form action="insert_jual.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            <h2>Form Upload Barang</h2>
            <div class="row">
                <div class="col">
                    <label for="nama">Nama Barang:</label>
                    <input type="text" name="nama" id="nama" required>
                </div>
                <div class="col">
                    <label for="harga">Harga Barang:</label>
                    <input type="text" name="harga" id="harga" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="deskripsi">Deskripsi Barang:</label><br>
                    <textarea name="deskripsi" id="deskripsi" rows="5" cols="30" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="gambar">Gambar Barang:</label>
                    <input type="file" name="gambar" id="gambar" required>
                </div>
            </div>
            <div class="button-container">
                
                <input type="submit" value="Upload">
            </div>
            <a href="hasillogin.php">Kembali</a>
        </div>
    </form>
</body>
</html>