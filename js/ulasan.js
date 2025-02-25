const navbarSayang = document.querySelectorAll("nav ul li a");
navbarSayang.forEach((item) => {
  item.addEventListener("click", () => {
    navbarSayang.forEach((navItem) => navItem.classList.remove("active"));
    item.classList.add("active");
  });
});

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

// klik bintang
const stars = document.querySelectorAll(".isi-rating-bintang i");
let selectedRating = 0;
const ratingInput = document.querySelector("#rating-bintang");

stars.forEach((star) => {
  star.addEventListener("click", function () {
    selectedRating = this.getAttribute("data-value");
    ratingInput.value = selectedRating;
    setRating(selectedRating);
  });
});

function highlightStars(count) {
  for (let i = 0; i < count; i++) {
    stars[i].classList.add("active");
    stars[i].classList.replace("fa-regular", "fa-solid");
  }
}

function resetStars() {
  stars.forEach((star) => {
    star.classList.remove("active");
    star.classList.replace("fa-solid", "fa-regular");
  });
}

function setRating(rating) {
  resetStars();
  highlightStars(rating);
}
// klik bintang end

// Ambil elemen-elemen yang dibutuhkan
const form = document.getElementById("form-ulasan");
const checkbox = document.getElementById("sarat-ulasan");
const bintangRating = document.getElementById("rating-bintang");
const selectToko = document.getElementById("isi-pilih-toko");

form.addEventListener("submit", function (event) {
  let errorMessages = [];

  // Cek apakah checkbox dicentang
  if (!checkbox.checked) {
    errorMessages.push(
      "Anda harus menyetujui syarat dan ketentuan sebelum mengirim ulasan!"
    );
  }

  // Cek apakah rating telah diisi
  if (!bintangRating.value) {
    errorMessages.push("Anda harus memberikan rating sebelum mengirim ulasan!");
  }

  // Cek apakah nama toko telah dipilih
  if (!selectToko.value) {
    errorMessages.push("Anda harus memilih nama toko sebelum mengirim ulasan!");
  }

  // Jika ada error, tampilkan alert dan batalkan submit
  if (errorMessages.length > 0) {
    event.preventDefault();
    alert(errorMessages.join("\n"));
  }
});

const inputs = [
  {
    id: "nama-pemberi-ulasan",
    message: "Username harus diisi",
  },
  {
    id: "isi-ulasan-pemberi",
    message: "Ulasan harus diisi",
  },
  {
    id: "isi-pilih-toko",
    message: "Toko harus diisi",
  },
  {
    id: "sarat-ulasan",
    message: "Syarat harus diisi",
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
