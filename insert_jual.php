<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "toko");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit;
}

// Ambil data dari form
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_POST['gambar'];
$userid = $_POST['userid'];

// Mengambil informasi file gambar
$gambar = $_FILES['gambar'];
$gambar_nama = $gambar['name'];
$gambar_tmp = $gambar['tmp_name'];

// Tentukan lokasi penyimpanan file gambar
$lokasi_gambar = 'uploads/' . $gambar_nama;

// Pindahkan file gambar ke lokasi penyimpanan
if (move_uploaded_file($gambar_tmp, $lokasi_gambar)) {
    // Ubah format lokasi gambar menjadi URL atau link gambar
    $gambar_link = 'http://example.com/' . $lokasi_gambar;

    // Query untuk melakukan insert data barang
    $query = "INSERT INTO barang (nama, harga, deskripsi, gambar) VALUES ('$nama', '$harga', '$deskripsi', '$gambar_link')";

    // Jalankan query
    if (mysqli_query($koneksi, $query)) {
        echo "Data barang berhasil diupload.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "Upload gambar gagal.";
}

// Tutup koneksi
mysqli_close($koneksi);
?>