<?php
require 'koneksi.php';

// produk galendo
$produk = "SELECT * FROM produk";
$hasilProduk = $conn->query($produk);

// toko galendo
$toko = "SELECT * FROM toko";
$hasilToko = $conn->query($toko);

// ulasan
$ulasan = "SELECT * FROM ulasan LIMIT 7";
$hasilUlasan = $conn->query($ulasan);

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
    <link rel="stylesheet" href="css/style.css">
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
                <li><a class="active" href="#beranda">Beranda</a></li>
                <li><a href="#keistimewaan">Keistimewaan</a></li>
                <li><a href="#pembuatan">Pembuatan</a></li>
                <li><a href="#produk">Produk</a></li>
                <li><a href="#toko">Toko</a></li>
                <li><a href="#ulasan">Ulasan</a></li>
            </ul>
        </nav>

        <div class="tentang">
            <a href="#tentang">Tentang</a>
        </div>

        <button id="hamburger" aria-label="Menu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </button>
    </header>
    <!-- navbar -->

    <main>
        <!-- beranda -->
        <section id="beranda">
            <article class="artikel-beranda">
                <h2>Galendo Warisan Ciamis</h2>
                <p>Galendo merupakan warisan kuliner autentik yang telah menjadi
                    identitas Kabupaten Ciamis selama lebih dari setengah abad.
                    Makanan tradisional ini dibuat dengan penuh ketekunan melalui
                    proses pengolahan kelapa yang unik, menghasilkan camilan manis
                    dengan tekstur yang khas - renyah di luar namun lembut di dalam.</p>
                <div class="sertifikasi">
                    <div class="isi-sertifikasi">
                        <figure>
                            <img src="svg/homepage1.svg" alt="halal">
                        </figure>
                        <p>SHM <br>(Sertifikat Halal MUI)</p>
                    </div>
                    <div class="isi-sertifikasi">
                        <figure>
                            <img src="svg/homepage2.svg" alt="halal">
                        </figure>
                        <p>PIRT <br>(Pangan Industri Rumah Tangga)</p>
                    </div>
                    <div class="isi-sertifikasi">
                        <figure>
                            <img src="svg/homepage3.svg" alt="halal">
                        </figure>
                        <p>GMP <br>(Good Manufacturing Practice)</p>
                    </div>
                </div>
                <a class="selengkapnya" href="#keistimewaan">Selengkapnya</a>
            </article>

            <div class="galendo-slider">
                <div class="arrow">
                    <button id="prev" aria-label="Previous"><i class="fa-solid fa-angle-left"></i></button>
                    <button id="next" aria-label="Next"> <i class="fa-solid fa-angle-right"></i></button>
                </div>

                <div class="wadah-gambar">
                    <div class="gambar-galendo">
                        <img src="img/homepage1.png" alt="galendo1">
                        <img class="kecil" src="img/homepage2.png" alt="galendo2">
                        <img src="img/homepage3.png" alt="galendo3">
                    </div>
                </div>
                <div class="kualitas">
                    <h3>Sertifikat & Jaminan Kualitas</h3>
                    <div class="kualitas-flex">
                        <div class="isi-kualitas">
                            <figure>
                                <i class="fa-solid fa-leaf"></i>
                            </figure>
                            <h4>100% Bahan Alami</h4>
                            <p>Terbuat dari santan kelapa pilihan tanpa bahan pengawet</p>
                        </div>
                        <div class="isi-kualitas">
                            <figure>
                                <i class="fa-solid fa-clock"></i>
                            </figure>
                            <h4>Proses Tradisional</h4>
                            <p>Diolah dengan metode tradisional selama 6-8 jam</p>
                        </div>
                        <div class="isi-kualitas">
                            <figure>
                                <i class="fa-solid fa-medal"></i>
                            </figure>
                            <h4>Kualitas Terjamin</h4>
                            <p>Sehat dan aman dikonsumsi</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- beranda -->

        <!-- mouse scroll -->
        <div class="mouse-scroll">
            <div class="mouse">
                <div class="mouse-wheel">
                    <div class="scroll"></div>
                </div>
            </div>
            <p>Scroll</p>
        </div>
        <!-- mouse scroll -->

        <!-- keistimewaan -->
        <section id="keistimewaan">
            <h2>Keistimewaan Galendo Ciamis</h2>
            <h3>Warisan Kuliner Penuh Makna</h3>
            <div class="wadah-keistimewaan">

                <div class="wadah-figure-keistimewaan">
                    <figure class="figure-keistimewaan">
                        <img src="img/keistimewaan.jpg" alt="keistimewaan">
                    </figure>
                </div>

                <div class="wadah-flex-keistimewaan">
                    <div class="wadah-artikel">
                        <img src="svg/keistimewaan1.svg" alt="kelapa">
                        <article>
                            <h4>Pemilihan Kelapa</h4>
                            <p>Menggunakan kelapa tua pilihan dari perkebunan lokal Ciamis, Kelapa dipilih yang berumur
                                11-12 bulan untuk mendapatkan santan terbaik, Setiap kelapa diperiksa secara manual
                                untuk
                                memastikan kualitas, Dalam sehari, rata-rata menggunakan 50-100 butir kelapa untuk
                                produksi
                            </p>
                        </article>
                    </div>

                    <div class="wadah-artikel">
                        <img src="svg/keistimewaan2.svg" alt="masak">
                        <article>
                            <h4>Teknik Khusus</h4>
                            <p>Pengadukan menggunakan alat kayu tradisional, Waktu pengadukan yang tepat untuk tekstur
                                sempurna, Pengaturan api yang presisi, Teknik menuangkan yang mempengaruhi tekstur akhir
                            </p>
                        </article>
                    </div>
                    <div class="wadah-artikel">
                        <i class="fa-solid fa-bowl-food"></i>
                        <article>
                            <h4>Rasa</h4>
                            <p>Manis alami dari santan, Tidak menggunakan pemanis buatan, Aroma khas kelapa yang kuat,
                                After taste yang tidak meninggalkan rasa pahit
                            </p>
                        </article>
                    </div>
                    <div class="wadah-artikel">
                        <i class="fa-solid fa-utensils"></i>
                        <article>
                            <h4>Varian Rasa</h4>
                            <p>Rasa authentic, Tekstur tradisional, Resep warisan, Dengan taburan kacang mede, Tekstur
                                lebih
                                mewah, Packaging khusus, Varian cokelat, Varian keju, Varian green tea, Varian premium
                                lainnya
                            </p>
                        </article>
                    </div>
                    <div class="wadah-artikel">
                        <i class="fa-solid fa-money-bill-trend-up"></i>
                        <article>
                            <h4>Nilai Ekonomi & Sosial</h4>
                            <p>Melibatkan petani kelapa lokal, Membuka lapangan kerja, Mendukung ekonomi kreatif,
                                Pelestarian warisan kuliner, Pendapatan daerah, Pengembangan UMKM, Potensi ekspor,
                                Daya tarik wisata kuliner
                            </p>
                        </article>
                    </div>
                </div>


            </div>
        </section>
        <!-- keistimewaan -->

        <!-- cara pembuatan -->
        <section id="pembuatan">
            <h2>Proses Pembuatan Galendo</h2>
            <div class="wadah-pembuatan">

                <article class="artikel-pembuatan">

                    <div class="isi-artikel-pembuatan">
                        <img src="svg/pembuatan1.svg" alt="bahan baku">
                        <div class="isi-proses active">
                            <h3>Pemilihan Bahan Baku</h3>
                            <p>Menggunakan kelapa tua berumur 11-12 bulan, Ciri kelapa yang baik:, Berat minimal 3 kg
                                per
                                butir, Tempurung berwarna
                                cokelat tua, Daging kelapa keras dan tebal, Air kelapa berkurang (berbunyi ketika
                                diguncang), Dalam satu
                                produksi membutuhkan 50-100 butir kelapa</p>
                        </div>
                    </div>

                    <div class="isi-artikel-pembuatan">
                        <img src="svg/pembuatan2.svg" alt="tahapan proses">
                        <div class="isi-proses">
                            <h3>Tahapan Proses Pembuatan</h3>
                            <p>Pemeriksaan kualitas setiap kelapa, Pembersihan tempurung dari sabut, Pembelahan kelapa
                                secara tradisional,
                                Pemeriksaan kualitas daging kelapa, Pemarutan manual menggunakan parut tradisional,
                                Pemarutan harus konsisten
                                untuk hasil optimal, Pemeriksaan hasil parutan, Pengumpulan dalam wadah khusus,
                                Pencampuran parutan dengan air
                                bersih, Pemerasan pertama untuk santan kental, Pemerasan kedua untuk santan encer,
                                Penyaringan bertahap
                                menggunakan kain khusus, Pemanasan wajan di atas tungku, Penuangan santan kental,
                                Pengaturan api sedang,
                            </p>
                        </div>
                    </div>

                    <div class="isi-artikel-pembuatan">
                        <img src="svg/pembuatan3.svg" alt="tahapan Penyelesaian">
                        <div class="isi-proses">
                            <h3>Tahapan Proses Penyelesaian</h3>
                            <p>Pengadukan perlahan dan konstan, Pengadukan terus menerus, Pengaturan api yang stabil,
                                Pemantauan perubahan
                                tekstur, Penambahan santan encer secara bertahap, Pengadukan lebih intensif, Pengaturan
                                api kecil, Pemantauan
                                warna dan aroma, Pengujian tekstur berkala, Tes warna (cokelat keemasan), Tes tekstur
                                (tidak lengket), Tes aroma
                                (harum khas), Tes rasa, Persiapan cetakan, Penuangan dengan teknik khusus, Pendinginan
                                alami, Pemotongan sesuai
                                ukuran</p>
                        </div>
                    </div>

                    <div class="isi-artikel-pembuatan">
                        <i class="fa-solid fa-lightbulb"></i>
                        <div class="isi-proses">
                            <h3>Tips Penting dalam Pembuatan</h3>
                            <p>Api harus stabil dan merata, Penggunaan kayu bakar pilihan, Jarak api dengan wajan yang
                                tepat, Pantau intensitas api
                                secara berkala, Pengadukan searah, Kecepatan konsisten, Tidak boleh berhenti terlalu
                                lama, Perhatikan bagian pinggir
                                wajan. Pembungkus Primer: Plastik food grade, Kertas minyak khusus, Daun pisang
                                (tradisional),Kemasan Sekunder:
                                Kotak karton premium, Box kayu tradisional, Kemasan souvenir</p>
                        </div>
                    </div>

                </article>

                <div class="gambar-pembuatan">

                    <div class="panah-pembuatan">
                        <button id="atas" aria-label="Atas"><i class="fa-solid fa-angle-up"></i></button>
                        <button id="bawah" aria-label="bawah"><i class="fa-solid fa-angle-down"></i></button>
                    </div>

                    <div class="isi-gambar-pembuatan">


                        <figure>
                            <img src="img/pembuatan1.jpg" alt="pembuatan 1">
                        </figure>
                        <figure>
                            <img src="img/pembuatan2.jpg" alt="pembuatan 3">
                        </figure>
                        <figure>
                            <img src="img/pembuatan3.jpg" alt="pembuatan 4">
                        </figure>
                        <figure>
                            <img src="img/pembuatan4.jpg" alt="pembuatan 2">
                        </figure>
                    </div>

                </div>

            </div>

        </section>
        <!-- cara pembuatan -->

        <!-- produk galendo -->
        <section id="produk">
            <h2>Produk Galendo</h2>
            <h3>Instagram Snackhood</h3>

            <div class="wadah-produk">

                <?php
                if ($hasilProduk->num_rows > 0) {
                    while ($baris = $hasilProduk->fetch_assoc()) {

                        $token = base64_encode($baris['id_produk'] . 'SECRET_KEY');

                        echo '<div class="isi-produk">

                    <figure>
                        <img src="img/' . htmlspecialchars($baris['gambar_produk']) . '" alt="' . htmlspecialchars($baris['judul_produk']) . '">
                    </figure>

                    <div class="katalog-produk">
                        <h4>' . htmlspecialchars($baris['judul_produk']) . '</h4>
                        <p>' . htmlspecialchars($baris['ket_produk']) . '</p>

                        <a target="_blank" href="https://www.instagram.com/snackhood?igsh=MW1iaHhpaHBnMnpqZg==" class="toko"><i class="fa-solid fa-store"></i>Instagram Snackhood</a>

                        <p class="harga"><i class="fa-solid fa-money-bill-wave"></i>Rp' . number_format(htmlspecialchars($baris['harga_produk']), 0, ',', '.') . '</p>

                        <a class="beli" href="produk.php?token=' . htmlspecialchars($token) . '"><i class="fa-solid fa-cart-shopping"></i>Beli Produk</a>
                    </div>

                </div>';

                    }

                } else {
                    echo "<p>Tidak ada produk yang tersedia.</p>";
                }

                ?>

            </div>
        </section>
        <!-- produk galendo -->

        <!-- toko galendo -->
        <section id="toko">
            <h2>Toko Galendo</h2>

            <div class="wadah-toko">

                <?php
                if ($hasilToko->num_rows > 0) {
                    while ($row = $hasilToko->fetch_assoc()) {

                        echo '<div class="isi-toko">
                    <figure class="map">
                        <iframe title="lokasi toko"
                            src="' . $row['map_toko'] . '"></iframe>
                    </figure>

                    <div class="ket-toko">
                        <h4>' . htmlspecialchars($row['nama_toko']) . '</h4>

                        <div class="isi-ket-toko">
                            <div class="wadah-ket-toko">
                            <i class="fa-solid fa-location-dot"></i> 
                                <address class="alamat-toko">' . htmlspecialchars($row['alamat_toko']) . ' </address>
                            </div>

                            <p class="rating">' . htmlspecialchars($row['rating_toko']) . ' <span class="bintang">★★★★☆</span> </p>
                            
                            <p class="buka"><i class="fa-regular fa-clock"></i><span class="buka-jam">Buka</span>' . htmlspecialchars($row['buka_toko']) . '</p>
                            <p class="telepon"><i class="fa-solid fa-phone"></i>' . htmlspecialchars($row['telepon_toko']) . '</p>
                            <a href="' . htmlspecialchars($row['link_toko']) . '" class="lihat-detail">Lihat Detail</a>
                        </div>

                    </div>

                </div>';
                    }
                } else {
                    echo "<p>Tidak ada toko yang tersedia.</p>";
                }

                ?>
            </div>
        </section>


        <!-- ulasan -->
        <section id="ulasan">
            <h2>Ulasan & Rating</h2>
            <a class="berikan-ulasan" href="ulasan.php"><i class="fa-regular fa-message"></i> Berikan Ulasan Anda...</a>
            <div class="wadah-ulasan">

                <div class="wadah-card">
                    <?php
                    if ($hasilUlasan->num_rows > 0) {
                        while ($barisUlasan = $hasilUlasan->fetch_assoc()) {
                            echo '<div class="card-ulasan">
                        <div class="flex1-ulasan">
                            <p class="toko-ulasan"><i class="fa-solid fa-store"></i> ' . htmlspecialchars($barisUlasan['nama_toko']) . '</p>
                            <p class="rating-ulasan"> ' . htmlspecialchars($barisUlasan['rating_ulasan']) . ' <span class="bintang-ulasan">';
                            for ($i = 0; $i < $barisUlasan['rating_ulasan']; $i++) {
                                echo '★';
                            }
                            for ($i = $barisUlasan['rating_ulasan']; $i < 5; $i++) {
                                echo '☆';
                            }
                            echo '</span> </p>
                            <p class="tanggal-ulasan"><i class="fa-regular fa-calendar"></i> ' . htmlspecialchars($barisUlasan['tanggal_ulasan']) . '</p>
                            <div class="alamat-ulasan">
                                <i class="fa-solid fa-location-dot"></i>
                                <address class="isi-alamat-ulasan">' . htmlspecialchars($barisUlasan['alamat_ulasan']) . '</address>
                            </div>
                            <p class="isi-ulasan">' . htmlspecialchars($barisUlasan['isi_ulasan']) . '</p>
                        </div>
                        <div class="flex2-ulasan">
                            <p class="username-ulasan">@' . htmlspecialchars($barisUlasan['nama_pemberi']) . '</p>
                        </div>
                    </div>';
                        }
                    } else {
                        echo "<p>Tidak ada ulasan yang tersedia.</p>";
                    }
                    ?>
                </div>

                <div class="panah-ulasan">
                    <button id="kiri-ulasan" aria-label="Kiri ulasan"><i class="fa-solid fa-angle-left"></i></button>
                    <button id="kanan-ulasan" aria-label="Kanan ulasan"><i class="fa-solid fa-angle-right"></i></button>
                </div>

            </div>

        </section>
        <!-- ulasan -->

        <!-- footer -->
        <footer id="tentang">

            <div class="isi-footer">
                <figure class="figure-footer">
                    <img src="img/logo.png" alt="galeci">
                    <figcaption class="caption-footer">
                        <h5 class="judul-footer">Galendo <span>Ciamis</span></h5>
                        <p>Website ini adalah platform yang memperkenalkan
                            makanan khas Ciamis, yaitu galendo, dengan informasi
                            lengkap dari seluruh toko galendo yang ada di Ciamis.
                            Kami berkomitmen untuk melestarikan dan mempromosikan
                            warisan kuliner lokal agar lebih dikenal oleh masyarakat luas.</p>
                    </figcaption>
                </figure>
                <div class="navigation">
                    <h5>NAVIGATION</h5>
                    <a href="#beranda">Beranda</a>
                    <a href="#keistimewaan">Keistimewaan</a>
                    <a href="#pembuatan">Pembuatan</a>
                    <a href="#produk">Produk</a>
                    <a href="#toko">Toko</a>
                    <a href="#ulasan">Ulasan</a>
                    <a href="#tentang">Tentang</a>
                </div>

                <div class="follow-us">
                    <h5>FOLLOW US</h5>

                    <div class="sosmed-footer">
                        <a href="https://www.tiktok.com/@dndy_tr?_t=8pGlBIxd2VF&_r=1" target="_blank"><i
                                class="fa-brands fa-tiktok"></i></a>
                        <a href="https://www.instagram.com/dndy_tr?igsh=MXZqYmRoNnRoNHRubg==" target="_blank"><i
                                class="fa-brands fa-square-instagram"></i></a>
                        <a href="https://id.linkedin.com/in/dandy-taufiqurrochman-8b5106293" target="_blank"><i
                                class="fa-brands fa-linkedin" target="_blank"></i></a>
                        <a href="https://www.threads.net/@dndy_tr" target="_blank"><i
                                class="fa-brands fa-square-threads"></i></a>
                    </div>


                </div>
                <div class="emailphone-footer">
                    <h5>EMAIL AND PHONE</h5>
                    <p><i class="fa-solid fa-envelope"></i>dandy.taufiqurrochman@gmail.com</p>
                    <p><i class="fa-solid fa-phone"></i>+62 858-6022-3835</p>
                </div>

            </div>


            <div class="garis"></div>
            <p id="copyright-footer">COPYRIGHT &copy; 2025 | CREATED BY DANDY TR</p>



        </footer>
        <!-- footer -->

    </main>

    <!-- js -->
    <script src="js/script.js"></script>
    <!-- js -->
</body>

</html>