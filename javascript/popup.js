const popupOverlay = document.getElementById('popupOverlay');
const addDataButton = document.getElementById('addDataButton');
const closePopup = document.getElementById('closePopup');

// Fungsi untuk menampilkan pop-up
function showPopup() {
  popupOverlay.classList.add('active');
}

// Fungsi untuk menyembunyikan pop-up
function hidePopup() {
  popupOverlay.classList.remove('active');
}

// Event listener untuk membuka pop-up
addDataButton.addEventListener('click', showPopup);

// Event listener untuk menutup pop-up
closePopup.addEventListener('click', hidePopup);

// Menutup pop-up saat mengklik di luar form
popupOverlay.addEventListener('click', function(event) {
  if (event.target === popupOverlay) {
    hidePopup();
  }
});
