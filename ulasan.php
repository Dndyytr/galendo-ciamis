<?php
require 'koneksi.php';

$tokoUlasan = "SELECT * FROM toko";
$hasilTokoUlasan = $conn->query($tokoUlasan);

// Cek jumlah ulasan yang sudah ada
$queryCount = "SELECT COUNT(*) as total FROM ulasan";
$resultCount = $conn->query($queryCount);
$rowCount = $resultCount->fetch_assoc();
$totalUlasan = $rowCount['total'];

if ($totalUlasan >= 7) {
    echo "<script>alert('Batas maksimal 7 ulasan sudah tercapai!');</script>";
    exit();
} else {
    // Proses penyimpanan jika jumlah ulasan masih kurang dari 10
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nama-pemberi"], $_POST["toko"], $_POST["rating-pemberi"], $_POST["ulasan-pemberi"])) {

        // Ambil data dari form dan bersihkan input
        $nama_pemberi = trim($_POST["nama-pemberi"]);
        $nama_toko = trim($_POST["toko"]);
        $rating_ulasan = number_format((float) $_POST["rating-pemberi"], 1, '.', '');
        $isi_ulasan = trim($_POST["ulasan-pemberi"]);
        $tanggal_ulasan = date("d F Y"); // Format tanggal otomatis

        // Ambil alamat toko berdasarkan nama toko
        $queryAlamat = "SELECT alamat_toko FROM toko WHERE nama_toko = ?";
        $stmtAlamat = $conn->prepare($queryAlamat);
        $stmtAlamat->bind_param("s", $nama_toko);
        $stmtAlamat->execute();
        $resultAlamat = $stmtAlamat->get_result();

        if ($row = $resultAlamat->fetch_assoc()) {
            $alamat_ulasan = $row["alamat_toko"];
        } else {
            $alamat_ulasan = "Alamat tidak ditemukan";
        }

        $stmtAlamat->close();

        // Query untuk memasukkan data ke dalam tabel ulasan
        $queryInsert = "INSERT INTO ulasan (nama_pemberi, nama_toko, rating_ulasan, tanggal_ulasan, alamat_ulasan, isi_ulasan) 
                        VALUES (?, ?, ?, ?, ?, ?)";

        $stmtInsert = $conn->prepare($queryInsert);
        $stmtInsert->bind_param("ssssss", $nama_pemberi, $nama_toko, $rating_ulasan, $tanggal_ulasan, $alamat_ulasan, $isi_ulasan);

        // Eksekusi query
        if ($stmtInsert->execute()) {
            echo "<script>alert('Ulasan berhasil dikirim!');</script>";

            // Redirect untuk mencegah pengiriman ulang saat refresh
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "<script>alert('Gagal mengirim ulasan, silakan coba lagi!');</script>";
            // exit();
        }

        $stmtInsert->close();
    }
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
    <link rel="stylesheet" href="css/ulasan.css">
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
                <li><a class="active" href="index.php#beranda">Beranda</a></li>
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

        <section id="beri-ulasan">
            <h2>Beri Ulasan</h2>

            <form action="" method="POST" id="form-ulasan">
                <div class="nama-pemberi">
                    <label for="nama-pemberi">Nama :</label>
                    <input type="text" name="nama-pemberi" id="nama-pemberi-ulasan" maxlength="20"
                        placeholder="Isi nama anda" required>
                </div>

                <div class="pilih-toko">
                    <label for="toko">Nama Toko :</label>
                    <select name="toko" id="isi-pilih-toko" required>
                        <option value="" disabled selected hidden>Pilih Toko</option>
                        <?php
                        if ($hasilTokoUlasan->num_rows > 0) {
                            while ($row = $hasilTokoUlasan->fetch_assoc()) {

                                echo '<option value="' . $row['nama_toko'] . '">' . $row['nama_toko'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="rating-ulasan">
                    <label for="rating-pemberi">Rating :</label>
                    <div class="isi-rating-bintang">
                        <i class="fa-regular fa-star" data-value="1"></i>
                        <i class="fa-regular fa-star" data-value="2"></i>
                        <i class="fa-regular fa-star" data-value="3"></i>
                        <i class="fa-regular fa-star" data-value="4"></i>
                        <i class="fa-regular fa-star" data-value="5"></i>
                        <span class="caption-rating">Beri Rating 1 - 5</span>
                        <input type="hidden" id="rating-bintang" name="rating-pemberi">
                    </div>
                </div>

                <div class="isi-ulasan-anda">
                    <label for="ulasan-pemberi">Ulasan :</label>
                    <textarea name="ulasan-pemberi" id="isi-ulasan-pemberi" cols="60" rows="6" maxlength="200"
                        placeholder="Isi ulasan anda" required></textarea>
                </div>

                <div class="sarat">
                    <input type="checkbox" name="sarat" id="sarat-ulasan" required>
                    <label>Saya menyetujui bahwa ulasan ini dapat ditampilkan di halaman
                        website sesuai dengan kebijakan privasi.</label>
                </div>

                <button type="submit" aria-label="Submit" id="submit-ulasan"><i class="fa-solid fa-pen"></i> Buat
                    Ulasan</button>

            </form>
        </section>

    </main>

    <!-- js -->
    <script src="js/ulasan.js"></script>
    <!-- js -->

</body>

</html>