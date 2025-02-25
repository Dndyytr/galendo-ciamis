// navbar klik
const navbarIsi = document.querySelectorAll("nav ul li a");
navbarIsi.forEach((item) => {
  item.addEventListener("click", () => {
    navbarIsi.forEach((navItem) => navItem.classList.remove("active"));
    item.classList.add("active");
  });
});
// nabar klik end

// navbar transparet
const header = document.querySelector("header");
let lastScrollY = 0;
let tickingHeader = false;

function handleScrollHeader() {
  const shouldApplyStyle = window.scrollY > 5;

  if (shouldApplyStyle !== lastScrollY) {
    if (shouldApplyStyle) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }
    lastScrollY = shouldApplyStyle;
  }

  tickingHeader = false;
}

window.addEventListener("scroll", () => {
  if (!tickingHeader) {
    requestAnimationFrame(handleScrollHeader);
    tickingHeader = true;
  }
});
// navbar transparet end

// hamburger menu
const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("header nav ul");
hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
});

// klik diluar navmenu
document.addEventListener("click", (e) => {
  if (
    !hamburger.contains(e.target) &&
    !navMenu.contains(e.target) &&
    navMenu.classList.contains("active")
  ) {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
  }
});
// hamburger menu end

// klik kuantitas
// Ambil elemen dari DOM
const kurangBtn = document.getElementById("kurang");
const tambahBtn = document.getElementById("tambah");
const jumlahSpan = document.querySelector(".jumlah");
const backBtn = document.getElementById("backBtn");

// Ambil productId dari data attribute
const productId = jumlahSpan.dataset.productId || "default";
const storageKey = `counter_${productId}`;
const lastNavigationKey = `last_nav_${productId}`;

// Fungsi untuk inisialisasi atau reset nilai
function initializeCounter() {
  // Cek apakah ini refresh atau navigasi
  const isRefresh =
    window.performance.getEntriesByType("navigation")[0]?.type === "reload";
  const lastNavigation = parseInt(localStorage.getItem(lastNavigationKey));
  const currentTime = Date.now();
  let nilai;

  // Jika ini bukan refresh dan ada timestamp navigasi sebelumnya
  if (!isRefresh && lastNavigation && currentTime - lastNavigation > 1000) {
    nilai = 1; // Reset ke 1
    localStorage.setItem(storageKey, nilai);
    console.log("Reset to 1 due to navigation back");
  } else {
    // Gunakan nilai tersimpan atau default ke 1
    nilai = parseInt(localStorage.getItem(storageKey)) || 1;
  }

  jumlahSpan.textContent = nilai;
  return nilai;
}

// Fungsi untuk update nilai dan simpan ke localStorage
function updateCounter(newValue) {
  nilai = newValue;
  jumlahSpan.textContent = nilai;
  localStorage.setItem(storageKey, nilai);

  isiRincianPesanan();
}

// Inisialisasi nilai awal
let nilai = initializeCounter();

// Event listener untuk tombol kurang
kurangBtn.addEventListener("click", () => {
  if (nilai > 1) {
    updateCounter(nilai - 1);
  }
});

// Event listener untuk tombol tambah
tambahBtn.addEventListener("click", () => {
  if (nilai < 100) {
    updateCounter(nilai + 1);
  }
});

// Tandai waktu navigasi saat tombol kembali diklik
backBtn.addEventListener("click", () => {
  localStorage.clear();

  localStorage.removeItem(storageKey);
  localStorage.removeItem(lastNavigationKey);
});

// Tandai waktu saat meninggalkan halaman (untuk tombol back browser)
window.addEventListener("beforeunload", () => {
  // Simpan timestamp hanya jika benar-benar navigasi, bukan refresh
  const isRefresh =
    window.performance.getEntriesByType("navigation")[0]?.type === "reload";
  if (!isRefresh) {
    localStorage.setItem(lastNavigationKey, Date.now());
    console.log("Leaving page (not refresh)");
  } else {
    console.log("Page refreshed, no navigation timestamp set");
  }
});

// rincian pembelian
const jumlahPesan = document.querySelector(".jumlah-pesan");
const hargaPesanan = document.querySelector(".total-pesanan");
const isiHargaPesanan = hargaPesanan.getAttribute("data-harga");
const totalPesan = document.querySelector(".total-pesan");

function isiRincianPesanan() {
  const isiJumlahPesanan = jumlahSpan.textContent;
  const hasilHarga = (isiHargaPesanan * isiJumlahPesanan).toLocaleString(
    "id-ID"
  );

  jumlahPesan.textContent = isiJumlahPesanan;
  totalPesan.textContent = `Rp${hasilHarga}`;
}

isiRincianPesanan();

// kirim wa form
// form validation
const inputs = [
  {
    id: "nama",
    message: "Nama lengkap harus diisi",
  },
  {
    id: "alamat",
    message: "Alamat harus diisi",
  },
  {
    id: "email",
    message: "Masukkan alamat email yang valid",
  },
  {
    id: "pesan",
    message: "Pesan tidak boleh kosong",
  },
];

inputs.forEach((input) => {
  const element = document.getElementById(input.id);
  if (element) {
    element.oninvalid = function () {
      this.setCustomValidity(input.message);
    };
    element.oninput = function () {
      this.setCustomValidity("");
    };
  }
});
// form validation end

// form submit
const tombolWA = document.getElementById("kirim");
document
  .getElementById("form-produk")
  .addEventListener("submit", function (event) {
    event.preventDefault(); // Mencegah pengiriman form secara default

    // Ambil data properti dari tombol
    const namaProduk = tombolWA.getAttribute("data-nama")
      ? tombolWA.getAttribute("data-nama")
      : "Produk";

    // Ambil nilai dari input
    const nama = document.getElementById("nama").value;
    const alamat = document.getElementById("alamat").value;
    const email = document.getElementById("email").value;
    const pesan = document.getElementById("pesan").value;

    // Nomor WhatsApp tujuan (ganti dengan nomor admin yang dituju)
    const nomorAdmin = "6282216182525"; // Format: 62 untuk kode Indonesia

    // Format pesan yang akan dikirim ke WhatsApp
    const message =
      `Halo, saya ingin memesan ${namaProduk}, dengan jumlah ${jumlahSpan.textContent}, Total harga ${totalPesan.textContent}.%0A%0A` +
      `*Nama:* ${nama}%0A` +
      `*Alamat:* ${alamat}%0A` +
      `*Email:* ${email}%0A` +
      `*Pesan:* ${pesan}`;

    // Cek apakah pengguna menggunakan perangkat mobile atau desktop menggunakan ternary
    const isMobile = /Android|iPhone|iPad|iPod/i.test(navigator.userAgent);
    const whatsappURL = isMobile
      ? `whatsapp://send?phone=${nomorAdmin}&text=${message}`
      : `https://wa.me/${nomorAdmin}?text=${message}`;

    // Redirect ke WhatsApp
    isMobile
      ? (window.location.href = whatsappURL)
      : window.open(whatsappURL, "_blank");
  });
// form submit end
