<style>
    .product-container {
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
    }

    .product-image {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .product-details {
        font-size: 16px;
        line-height: 1.5;
        color: #333;
    }

    .product-details p {
        margin-bottom: 5px;
    }

    .buy-button {
        display: inline-block;
        padding: 8px 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        margin-top: 10px;
        transition: background-color 0.3s;
    }

    .buy-button:hover {
        background-color: #0056b3;
    }
</style>

<div class="container text-center">
    <?php
    $idbarang = $_GET['idbarang'];
    require_once "koneksi.php";

    $sql = "SELECT * FROM barang where idbarang = $idbarang";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product-container'>";
            echo "<img src=".$row["foto"]." class='product-image'><br>";
            echo "<div class='product-details'>";
            echo "<p><strong>ID:</strong> " . $row["login_id"]. "</p>";
            echo "<p><strong>Name:</strong> " . $row["nama"]. "</p>";
            echo "<p><strong>Harga:</strong> Rp." . $row["harga"]. "</p>";
            echo "<p><strong>Deskripsi:</strong> " . $row["deskripsi"]. "</p>";
            echo "</div>"; // end of product-details
            echo "</div>"; // end of product-container
        }
    } else {
        echo "0 results";
    }

    mysqli_close($koneksi);
    ?>
</div>
