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

// Menambahkan event listener untuk ikon filter
document.querySelector('.filter-button').addEventListener('click', function() {
    // Ambil elemen <i> di dalam filter-button
    var icon = this.querySelector('i');
    
    // Toggle antara bi-funnel dan bi-funnel-fill pada elemen <i>
    icon.classList.toggle('bi-funnel');
    icon.classList.toggle('bi-funnel-fill');

    // Menampilkan atau menyembunyikan dropdown filter
    var dropdownMenu = document.querySelector('.dropdown-menu');
    dropdownMenu.classList.toggle('d-none'); // Menyembunyikan/menampilkan dropdown
});

// Event listener untuk menutup dropdown dan mengembalikan ikon ke semula
document.addEventListener('click', function(event) {
    // Cek apakah klik terjadi di luar filter-button atau dropdown-menu
    var filterButton = document.querySelector('.filter-button');
    var dropdownMenu = document.querySelector('.dropdown-menu');
    
    if (!filterButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
        // Jika klik di luar filter-button dan dropdown, sembunyikan dropdown dan reset ikon
        dropdownMenu.classList.add('d-none');
        var icon = filterButton.querySelector('i');
        icon.classList.remove('bi-funnel-fill');
        icon.classList.add('bi-funnel');
    }
}); 

// Panggil fungsi untuk inisialisasi filter saat halaman dimuat
document.addEventListener('DOMContentLoaded', initializeTabFilter);
