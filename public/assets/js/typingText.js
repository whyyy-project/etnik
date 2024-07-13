
// typing dashboard
const texts = [
    "Elektronik Nomor Induk Kesenian ini merupakan salah satu upaya Pemerintah Kabupaten Bojonegoro melalui Dinas Kebudayaan dan Pariwisata Kabupaten Bojonegoro dalam hal Pelayanan Publik untuk mempermudah masyarakat khususnya pelaku seni/organisasi yang ada di Bojonegoro untuk mengurus Nomor Induk Kesenian (NIK) dengan sistem elektronik/online.",
    " Nomor Induk Kesenian (NIK) merupakan suatu bentuk pengakuan identitas pelaku seni sekaligus untuk mengetahui para pelaku seni, mulai dari Orkes Melayu, Elektone, Reog Jaranan, Pemilik Sanggar Kesenian Tradisional, hingga Pelaku Kesenian Perorangan."
];

let i = 0;
let textIndex = 0;
const typingText = document.getElementById('typing-text');

function typeWriter() {
    const text = texts[textIndex];

    if (i < text.length) {
        typingText.textContent += text.charAt(i);
        i++;
        setTimeout(typeWriter, 40); // Waktu pengetikan per karakter (ms)
    } else {
        // Menghapus teks sebelumnya sebelum melanjutkan ke teks berikutnya
        setTimeout(eraseText, 2000);
    }
}
function eraseText() {
    if (i > 0) {
        typingText.textContent = typingText.textContent.slice(0, -1);
        i--;
        setTimeout(eraseText, 20); // Waktu penghapusan per karakter (ms)
    } else {
        textIndex++;
        if (textIndex === texts.length) {
            textIndex = 0;
        }
        setTimeout(typeWriter, 500);
    }
}

typeWriter();