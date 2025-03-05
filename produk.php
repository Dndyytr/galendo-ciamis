<?php
require 'koneksi.php';

if (isset($_GET['token'])) {
    $decoded = base64_decode($_GET['token']);
    list($id, $key) = explode('SECRET_KEY', $decoded);

    if (is_numeric($id)) {
        $sql = "SELECT * FROM produk WHERE id_produk = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $productId = $row['id_produk'];
        } else {
            echo "<p>Properti tidak ditemukan.</p>";
            exit;
        }
    } else {
        echo "<p>Token tidak valid.</p>";
        exit;
    }
} else {
    echo "<p>Token tidak ditemukan.</p>";
    exit;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- meta tag -->
    <meta name="description"
        content="Galendo merupakan warisan kuliner autentik yang telah menjadi identitas Kabupaten Ciamis selama lebih dari setengah abad. Makanan tradisional ini dibuat dengan penuh ketekunan melalui proses pengolahan kelapa yang unik">
    <meta name="keywords"
        content="Galendo, Ciamis, Warisan Kuliner, Autentik, Tradisional, Kuliner, Kelapa, Pemilihan Kelapa, Teknik Khusus, Rasa, Varian Rasa, Nilai Ekonomi & Sosial">
    <meta name="author" content="Galendo Ciamis">
    <meta name="robots" content="index, follow">
    <title>Galendo Ciamis</title>
    <!-- font lobster -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <!-- font poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- font pacifico -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- fav icons -->
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <!-- css -->
    <link rel="stylesheet" href="css/produk.css">
</head>

<body>

    <!-- navbar -->
    <header>
        <figure>
            <img src="img/logo.png" alt="dtr">
            <figcaption>Galendo <span>Ciamis</span></figcaption>
        </figure>
        <nav>
            <ul>
                <li><a href="index.php#beranda">Beranda</a></li>
                <li><a href="index.php#keistimewaan">Keistimewaan</a></li>
                <li><a href="index.php#pembuatan">Pembuatan</a></li>
                <li><a href="index.php#produk">Produk</a></li>
                <li><a href="index.php#toko">Toko</a></li>
                <li><a href="index.php#ulasan">Ulasan</a></li>
            </ul>
        </nav>

        <div class="tentang">
            <a href="index.php#tentang">Tentang</a>
        </div>

        <button id="hamburger" aria-label="Menu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </button>
    </header>
    <!-- navbar -->

    <main>

        <section id="detail-produk">
            <h2>Detail Produk</h2>
            <div class="isi-detail">


                <div class="isi-katalog">

                    <figure>
                        <img src="img/<?= htmlspecialchars($row['gambar_produk']) ?>" alt="">
                    </figure>
                    <div class="deskripsi-produk">
                        <h4><?= htmlspecialchars($row['judul_produk']) ?></h4>
                        <p><?= htmlspecialchars($row['ket_produk']) ?></p>
                        <p class="berat"><?= htmlspecialchars($row['berat_produk']) ?></p>
                        <a target="_blank" href="https://www.instagram.com/snackhood?igsh=MW1iaHhpaHBnMnpqZg=="
                            class="toko"><i class="fa-solid fa-store"></i>Instagram Snackhood</a>
                        <p class="harga"><i
                                class="fa-solid fa-money-bill-wave"></i>Rp<?= number_format(htmlspecialchars($row['harga_produk']), 0, ',', '.') ?>
                        </p>
                        <div class="kuantitas">
                            <button id="kurang" aria-label="Kurang"><i class="fa-solid fa-minus"></i></button>
                            <span class="jumlah" data-product-id="<?php echo $productId; ?>">1</span>
                            <button id="tambah" aria-label="Tambah"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>

                    <button id="backBtn" onclick="history.back()"><i class="fa-solid fa-angle-left"></i></button>

                </div>

                <form action="" method="GET" id="form-produk">

                    <div class="input-nama-pesanan">
                        <label for="nama">Nama Pemesan :</label>
                        <input type="text" name="nama" id="nama" placeholder="Isi Nama Anda" required>
                    </div>


                    <div class="input-alamat">
                        <label for="alamat">Alamat :</label>
                        <input type="text" name="alamat" id="alamat" placeholder="Isi Alamat Anda" required>
                    </div>


                    <div class="input-email">
                        <label for="email">Email :</label>
                        <input type="email" name="email" id="email" placeholder="Isi Email Anda" required>
                    </div>


                    <div class="input-pesan">
                        <label for="pesan">Pesan :</label>
                        <textarea name="pesan" id="pesan" rows="5" cols="50" placeholder="Isi Pesan Untuk Penjual"
                            required></textarea>
                    </div>


                    <div class="wadah-rincian-pembelian">
                        <label for="rincian-pembelian">Rincian Pembelian :</label>
                        <div class="rincian-pembelian">
                            <p class="nama-pesanan">Nama Pesanan :<span
                                    class="nama-pesan"><?= htmlspecialchars($row['judul_produk']) ?></span></p>
                            <p class="jumlah-pesanan">Jumlah Pesanan :<span class="jumlah-pesan"></span></p>
                            <p class="subtotal-pesanan">Harga Pesanan :<span
                                    class="subtotal-pesan">Rp<?= number_format(htmlspecialchars($row['harga_produk']), 0, ',', '.') ?></span>
                            </p>
                            <p class="total-pesanan" data-harga="<?= $row['harga_produk']; ?>">Total Pesanan :<span
                                    class="total-pesan"></span></p>
                        </div>
                    </div>


                    <button data-nama="<?= htmlspecialchars($row['judul_produk']); ?>" type="submit" id="kirim"><i
                            class="fa-solid fa-cart-shopping"></i> Kirim Pesanan</button>

                </form>


            </div>

        </section>

    </main>

    <!-- js -->
    <script src="js/produk.js"></script>
    <!-- js -->

</body>

</html>