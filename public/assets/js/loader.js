const loader = document.getElementById("onload");

// Fungsi untuk menampilkan loader
function showLoader() {
    loader.style.display = "block";
}

// Fungsi untuk menyembunyikan loader
function hideLoader() {
    loader.style.display = "none";
}

// Event listener saat halaman selesai dimuat
window.addEventListener("load", function() {
    setInterval(hideLoader, 1000); // Sembunyikan loader setelah 2 detik
});

// Mengambil semua elemen <a> dalam dokumen
const links = document.querySelectorAll("a");

// Menambahkan event listener untuk setiap tautan
links.forEach(function(link) {
    link.addEventListener("click", function(event) {
        showLoader(); // Menampilkan loader sebelum navigasi
        event.preventDefault(); // Mencegah navigasi langsung
        // Lakukan tindakan atau navigasi yang Anda inginkan di sini
        window.location.href = link.href;
    });
});