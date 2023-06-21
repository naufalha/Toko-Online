<!DOCTYPE html>
<html>
<head>
    <title>Form Upload Barang</title>
</head>
<body>
    <h2>Form Upload Barang</h2>
    <form action="insert_jual.php" method="POST" enctype="multipart/form-data">
        <label for="nama">Nama Barang:</label>
        <input type="text" name="nama" id="nama" required><br><br>

        <label for="harga">Harga Barang:</label>
        <input type="text" name="harga" id="harga" required><br><br>

        <label for="deskripsi">Deskripsi Barang:</label><br>
        <textarea name="deskripsi" id="deskripsi" rows="5" cols="30" required></textarea><br><br>

        <label for="gambar">Gambar Barang:</label>
        <input type="file" name="gambar" id="gambar" required><br><br>
        

        <input type="submit" value="Upload">
    </form>
</body>
</html>
