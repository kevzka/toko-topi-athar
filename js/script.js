function sliderBanner(){
    const track = document.getElementById('sliderTrack');
  const slides = document.querySelectorAll('.slide');
  const dotsContainer = document.getElementById('dots');
  let currentIndex = 0;
  let interval;

  // Create dots
  slides.forEach((_, i) => {
    const dot = document.createElement('span');
    dot.classList.add('dot');
    if (i === 0) dot.classList.add('active');
    dotsContainer.appendChild(dot);
  });

  const dots = document.querySelectorAll('.dot');

  function updateSlider() {
    track.style.transform = `translateX(-${currentIndex * 100}%)`;
    dots.forEach(dot => dot.classList.remove('active'));
    dots[currentIndex].classList.add('active');
  }

  function nextSlide() {
    currentIndex = (currentIndex + 1) % slides.length;
    updateSlider();
  }

  // Autoplay
  function startAutoSlide() {
    interval = setInterval(nextSlide, 3000);
  }

  function stopAutoSlide() {
    clearInterval(interval);
  }

  // Geser manual dengan touch
  let startX = 0;
let isDragging = false;

// === TOUCH SUPPORT ===
track.addEventListener('touchstart', e => {
  startX = e.touches[0].clientX;
  isDragging = true;
  stopAutoSlide();
});

track.addEventListener('touchmove', e => {
  if (!isDragging) return;
  const moveX = e.touches[0].clientX;
  handleSlideMove(moveX);
});

track.addEventListener('touchend', () => {
  isDragging = false;
  startAutoSlide();
});

// === MOUSE SUPPORT (klik kiri) ===
track.addEventListener('mousedown', e => {
  if (e.button !== 0) return; // Hanya klik kiri
  startX = e.clientX;
  isDragging = true;
  stopAutoSlide();
  e.preventDefault(); // Hindari drag img atau select text
});

// tangkap di document agar tetap bisa deteksi drag walau keluar track
document.addEventListener('mousemove', e => {
  if (!isDragging) return;
  const moveX = e.clientX;
  handleSlideMove(moveX);
});

document.addEventListener('mouseup', () => {
  if (isDragging) {
    isDragging = false;
    startAutoSlide();
  }
});

// === Fungsi Geser Bersama ===
function handleSlideMove(moveX) {
  if (moveX - startX > 50) {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    updateSlider();
    isDragging = false;
  } else if (startX - moveX > 50) {
    currentIndex = (currentIndex + 1) % slides.length;
    updateSlider();
    isDragging = false;
  }
}


  // Inisialisasi
  updateSlider();
  startAutoSlide();
}

function scrollNavbar(){
  const navbar = document.getElementById('navbar');

  function updateNavbarBackground() {
    if (window.scrollY === 0) {
      navbar.classList.add('transparent');
      navbar.classList.remove('solid');
    } else {
      navbar.classList.add('solid');
      navbar.classList.remove('transparent');
    }
  }

  // Initial check
  updateNavbarBackground();

  // Listen to scroll event
  window.addEventListener('scroll', updateNavbarBackground);

}
