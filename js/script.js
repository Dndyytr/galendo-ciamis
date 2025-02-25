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
  if (!tickingHeader || !ticking) {
    requestAnimationFrame(handleScrollHeader);
    requestAnimationFrame(handleScroll);
    ticking = true;
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

// mouse hide
const mouse = document.querySelector(".mouse-scroll");
window.addEventListener("scroll", () => {
  window.scrollY > 35
    ? mouse.classList.add("mouse-hide")
    : mouse.classList.remove("mouse-hide");
});
// mouse hide end

// slider image
const prev = document.querySelector("#prev");
const next = document.querySelector("#next");
const slider = document.querySelector(".gambar-galendo");
const gambar = document.querySelectorAll(".gambar-galendo img");
let clickCount = 0;

// Get image width for translation calculations
const imageWidth = gambar.length > 0 ? gambar[0].clientWidth - 100 : 0;

// Function to get multiplier based on screen width
const getMultiplier = () => {
  const width = window.innerWidth;
  console.log("Current window width:", width); // Debug log

  let multiplier;
  if (width <= 320) {
    multiplier = 2;
  } else if (width <= 400) {
    multiplier = 1.9;
  } else if (width <= 575) {
    multiplier = 1.8;
  } else {
    multiplier = 1.8;
  }

  console.log("Selected multiplier:", multiplier); // Debug log
  return multiplier;
};

prev.addEventListener("click", () => {
  if (clickCount >= 2) return;

  const multiplier = getMultiplier();
  const translateValue =
    clickCount === 0 ? `-${imageWidth}px` : `-${imageWidth * multiplier}px`;

  slider.style.transform = `translateX(${translateValue})`;

  gambar.forEach((item) => {
    if (item.classList.contains("kecil")) {
      item.classList.remove("kecil");
    } else {
      item.classList.add("kecil");
    }
  });

  clickCount++;
});

next.addEventListener("click", () => {
  if (clickCount === 0) return;

  const translateValue = clickCount === 1 ? "0px" : `-${imageWidth}px`;

  slider.style.transform = `translateX(${translateValue})`;

  gambar.forEach((item) => {
    if (item.classList.contains("kecil")) {
      item.classList.remove("kecil");
    } else {
      item.classList.add("kecil");
    }
  });

  clickCount--;
});
// slider image end

// parallax home
const artikelBeranda = document.querySelector(".artikel-beranda");
const artikelH2 = document.querySelector(".artikel-beranda h2");
const sertifikasi = document.querySelector(".sertifikasi");
const kualitas = document.querySelector(".kualitas");
const kualitasFlex = document.querySelector(".kualitas-flex");

let ticking = false;

function handleScroll() {
  let scroll = window.scrollY / 300;

  if (scroll <= 0.55) {
    let artikelScale = `scale(${1 + scroll * 1.2})`;
    let artikelTranslateX = `translateX(${-(scroll * 140)}px)`;

    let blurEffect = `blur(${scroll * 7.3}px)`;

    let kualitasScale = `scale(${1 + scroll})`;
    let kualitasTranslateX = `translateX(${scroll * 200}px)`;

    artikelBeranda.style.transform = artikelScale;
    artikelH2.style.transform = artikelTranslateX;
    sertifikasi.style.transform = artikelTranslateX;
    artikelBeranda.style.filter = blurEffect;

    kualitas.style.transform = kualitasScale;
    kualitasFlex.style.transform = kualitasTranslateX;
    kualitas.style.filter = blurEffect;

    ticking = false;
  }
}

// parallax keistimewaan
const elements = document.querySelectorAll(".figure-keistimewaan img");
const endRotation = 0; // End rotation angle
const speedFactor = 1.87; // Adjust speed of rotation

const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const updateRotation = () => {
          const rect = entry.target.getBoundingClientRect();
          const viewportHeight = window.innerHeight;

          // Calculate progress (0 to 1)
          const progress =
            1 - (rect.top + rect.height / 2) / (viewportHeight + rect.height);

          // Calculate rotation angle from CSS initial value (-180) to 0
          const rotation = -130 + progress * 130 * speedFactor;

          // Apply rotation transform with clamped values
          const clampedRotation = Math.min(
            endRotation,
            Math.max(-130, rotation)
          );
          entry.target.style.transform = `rotate(${clampedRotation}deg)`;
        };

        // Remove previous event listener if exists
        window.removeEventListener("scroll", updateRotation);
        // Add new event listener
        window.addEventListener("scroll", updateRotation);
        // Initial call
        updateRotation();
      }
    });
  },
  {
    threshold: [0, 0.1, 0.5, 0.75, 0.8, 0.85, 0.9, 0.95, 1], // More precise observation points
    rootMargin: "-25% 0px -25% 0px",
  }
);

elements.forEach((element) => {
  element.style.transition = "transform 0.1s ease";
  observer.observe(element);
});

// pembuatan
const atas = document.querySelector("#atas");
const bawah = document.querySelector("#bawah");
const isiGambarPembuatan = document.querySelector(".isi-gambar-pembuatan");
const isiProsesPembuatan = document.querySelectorAll(
  ".isi-artikel-pembuatan .isi-proses"
);
const imgPembuatan = document.querySelectorAll(
  ".isi-gambar-pembuatan figure img"
);

let hitung = 0;
let rotatePembuatan = 0;

function resetRotation() {
  hitung = 0;
  rotatePembuatan = 0;
  isiGambarPembuatan.style.transform = `rotate(0deg)`;
  imgPembuatan.forEach((img) => (img.style.transform = `rotate(0deg)`));

  isiProsesPembuatan.forEach((item) => item.classList.remove("active"));
  isiProsesPembuatan[0].classList.add("active");
}

function goToLast() {
  hitung = isiProsesPembuatan.length - 1;
  rotatePembuatan = 270; // 90 * 3 for last position
  isiGambarPembuatan.style.transform = `rotate(${rotatePembuatan}deg)`;
  imgPembuatan.forEach((img) => {
    img.style.transform = `rotate(${-rotatePembuatan}deg)`;
  });

  isiProsesPembuatan.forEach((item, index) => {
    item.classList.toggle("active", index === hitung);
  });
}

function updateRotation(direction) {
  hitung += direction;
  rotatePembuatan += 90 * direction;

  if (hitung >= isiProsesPembuatan.length || hitung < 0) {
    resetRotation();
    return;
  }

  isiGambarPembuatan.style.transform = `rotate(${rotatePembuatan}deg)`;
  imgPembuatan.forEach((img) => {
    img.style.transform = `rotate(${-rotatePembuatan}deg)`;
  });

  isiProsesPembuatan.forEach((item, index) => {
    item.classList.toggle("active", index === hitung);
  });
}

// Simplified up button - just rotates forward
atas.addEventListener("click", () => updateRotation(1));

// Down button - goes to last on first click, then rotates backward
bawah.addEventListener("click", () => {
  if (hitung === 0) {
    goToLast();
  } else {
    updateRotation(-1);
  }
});

// Initialize first item as active
resetRotation();

// ulasan slider
const wadahCard = document.querySelector(".wadah-card");
let cardUlasan = document.querySelectorAll(".card-ulasan");
const cardWidth = cardUlasan[0].offsetWidth - 2 * 48; // Sesuaikan dengan gap dan overlap (1rem = 16px)
let currentPosition = 0;

function updateScale() {
  const carouselLeft = wadahCard.getBoundingClientRect().left;
  const containerWidth = wadahCard.offsetWidth; // Lebar total wadah-card
  const containerCenter = containerWidth / 2 + carouselLeft; // Pusat visual wadah-card

  cardUlasan.forEach((card) => {
    const cardLeft = card.getBoundingClientRect().left;
    const cardCenter = cardLeft + card.offsetWidth / 2;
    const distanceFromCenter = Math.abs(containerCenter - cardCenter);

    if (distanceFromCenter < cardWidth / 2) {
      card.style.transform = "scale(1)";
      card.style.zIndex = "3";
    } else if (distanceFromCenter < cardWidth * 1.5) {
      card.style.transform = "scale(0.9)";
      card.style.zIndex = "2";
    } else {
      card.style.transform = "scale(0.8)";
      card.style.zIndex = "1";
    }
  });
}

function slideRight() {
  const firstCard = wadahCard.firstElementChild;
  currentPosition -= cardWidth;
  wadahCard.style.transform = `translateX(${currentPosition}px)`;

  setTimeout(() => {
    wadahCard.appendChild(firstCard);
    currentPosition += cardWidth;
    wadahCard.style.transition = "none";
    wadahCard.style.transform = `translateX(${currentPosition}px)`;
    wadahCard.offsetWidth; // Paksa reflow
    wadahCard.style.transition = "all 0.5s ease-out";
    cardUlasan = document.querySelectorAll(".card-ulasan");
    updateScale();
  }, 500);
}

function slideLeft() {
  const lastCard = wadahCard.lastElementChild;
  wadahCard.style.transition = "none";
  currentPosition -= cardWidth;
  wadahCard.insertBefore(lastCard, wadahCard.firstChild);
  wadahCard.style.transform = `translateX(${currentPosition}px)`;

  wadahCard.offsetWidth; // Paksa reflow
  wadahCard.style.transition = "all 0.5s ease-out";
  currentPosition += cardWidth;
  wadahCard.style.transform = `translateX(${currentPosition}px)`;

  setTimeout(() => {
    cardUlasan = document.querySelectorAll(".card-ulasan");
    updateScale();
  }, 0);
}

// Event listeners
document.querySelector("#kiri-ulasan").addEventListener("click", slideRight);
document.querySelector("#kanan-ulasan").addEventListener("click", slideLeft);

// Initial setup
updateScale();

// Animasi geser scroll untuk .wadah-artikel
const wadahArtikel = document.querySelectorAll(".wadah-artikel");
const isiArtikelPembuatan = document.querySelectorAll(".isi-artikel-pembuatan");

// Variabel untuk melacak posisi scroll sebelumnya dengan nama baru
let previousScrollPos = 0;

// Membuat observer untuk mendeteksi saat elemen masuk/keluar viewport
const observer2 = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("active");
      }
    });
  },
  {
    threshold: 0.1, // Tetap gunakan threshold yang sama untuk sensitivitas
  }
);

// Terapkan observer ke semua elemen .wadah-artikel
wadahArtikel.forEach((element) => {
  observer2.observe(element);
});

isiArtikelPembuatan.forEach((element) => {
  observer2.observe(element);
});
