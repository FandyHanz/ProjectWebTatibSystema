document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const menuToggle = document.getElementById('menu-toggle');
    const mainContent = document.querySelector('.main-content');

    menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('expanded');
        mainContent.classList.toggle('expanded');
    });
});

const navButtons = document.querySelectorAll('.nav-table-button');

// Menambahkan event listener untuk setiap tombol
navButtons.forEach(button => {
    button.addEventListener('click', function () {
        // Menghapus class 'active' dari semua tombol
        navButtons.forEach(button => button.classList.remove('active'));

        // Menambahkan class 'active' pada tombol yang diklik
        this.classList.add('active');
    });
});

// Fungsi untuk menginisialisasi filter pada tab aktif
function initializeTabFilter() {
    // Pilih tab yang memiliki class 'active'
    const activeTab = document.querySelector('.nav-table-button.active');

    // Pilih elemen img (atau SVG) di dalam tab aktif
    const svg = activeTab.querySelector('img');

    // Terapkan filter pada SVG di dalam tab aktif
    if (svg) {
        svg.style.filter = 'invert(60%) sepia(77%) saturate(500%) hue-rotate(180deg) brightness(90%) contrast(95%)';
    }
}

// Panggil fungsi untuk inisialisasi filter saat halaman dimuat
document.addEventListener('DOMContentLoaded', initializeTabFilter);
