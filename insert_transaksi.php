<!DOCTYPE html>
<html>
<head>
    <title>berhasil</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
       /* CSS untuk tampilan pesan sukses */
        .message.success {
            background-color: white;
            color: black;
            padding: 10px;
            border-radius: 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }

        /* CSS untuk tampilan pesan error */
        .message.error {
            background-color: white;
            color: black;
            padding: 10px;
            border-radius: 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }

        /* CSS untuk tombol kembali */
        .btn-kembali {
            background-color:#1E90FF;
            color: white;
            padding: 10px 16px;
            border: 2px solid #007bff;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

    </style>
</head>
<body>
</body>
</html>



<?php
session_start();
require_once "koneksi.php"; 

// Ambil data dari form
$id_keranjang = $_POST['id_keranjang'];
$gambar = $_FILES['gambar'];
$id = $_SESSION['id'];
$random_name = rand(1000,100000000)."-bukti";
// Mengambil informasi file gambar
$id_penjual = $_POST['id_penjual'];
$gambar = $_FILES['gambar'];
$gambar_nama = $random_name;
$gambar_tmp = $gambar['tmp_name'];


// Tentukan lokasi penyimpanan file gambar
$lokasi_gambar = 'bukti/' . $random_name;

// Pindahkan file gambar ke lokasi penyimpanan
if (move_uploaded_file($gambar_tmp, $lokasi_gambar)) {
    // Ubah format lokasi gambar menjadi URL atau link gambar
    $gambar_link = '' . $lokasi_gambar;

    // Query untuk melakukan insert data barang
    $query = "INSERT INTO `transaksi` (`id_transaksi`, `id_keranjang`, `id_pembeli`, `bukti_bayar`, `id_penjual`) VALUES (NULL,'$id_keranjang' , '$id', '$gambar_link', '$id_penjual')";
    //echo "id keranjang = ".$id_keranjang. " id pembeli = ".$id." bukti bayar = ".$gambar_link." id penjual = ".$id_penjual."";
    // Jalankan query
    
    if (mysqli_query($koneksi, $query)) {
        //rubah status pembayaran di keranjang
        $query2 = "UPDATE keranjang SET terbayar = '1' WHERE id_keranjang = '$id_keranjang'";
        
        mysqli_query($koneksi, $query2);
        // Tampilkan pesan sukses
        echo '<div class="message success">';
        echo "<h2>Transaksi Anda Berhasil.</h2>";
        echo '<a href="index.php" class="btn-kembali">Kembali ke Halaman Home</a>';
        echo '</div>';
    } else {
        // Tampilkan pesan error
        echo '<div class="message error">';
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        echo '</div>';
    }
    
} else {
    echo "Upload gambar gagal.";
}

// Tutup koneksi
mysqli_close($koneksi);
?>