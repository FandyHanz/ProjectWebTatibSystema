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
document.addEventListener('click', function(event) {
    // Seleksi elemen
    var filterButton = document.querySelector('.filter-button');
    var dropdownMenu = document.querySelector('.dropdown-menu');
    var icon = filterButton.querySelector('i');

    // Periksa apakah klik terjadi di dalam filter-button (termasuk anak elemen)
    if (filterButton.contains(event.target)) {
        // Toggle menu dropdown
        if (dropdownMenu.classList.contains('d-none')) {
            dropdownMenu.classList.remove('d-none'); // Tampilkan dropdown
            icon.classList.remove('bi-funnel'); 
            icon.classList.add('bi-funnel-fill');
        } else {
            dropdownMenu.classList.add('d-none'); // Sembunyikan dropdown
            icon.classList.remove('bi-funnel-fill');
            icon.classList.add('bi-funnel');
        }
        return; // Hentikan eksekusi lebih lanjut
    }

    // Periksa apakah klik terjadi di dalam dropdown-menu
    if (dropdownMenu.contains(event.target)) {
        // Elemen interaktif tidak menutup dropdown
        var clickableElements = ['BUTTON', 'A', 'INPUT', 'SELECT'];
        if (clickableElements.includes(event.target.tagName)) {
            return; // Jangan tutup dropdown
        }
        
        // Klik area kosong di dalam dropdown, sembunyikan dropdown
        dropdownMenu.classList.add('d-none');
        icon.classList.remove('bi-funnel-fill');
        icon.classList.add('bi-funnel');
        return;
    }

    // Klik di luar filter-button dan dropdown-menu
    dropdownMenu.classList.add('d-none');
    icon.classList.remove('bi-funnel-fill');
    icon.classList.add('bi-funnel');
});

//fungsi ketika radio button nim dipilih, akan menyembunyikan dropdown
    const radioNama = document.getElementById('radio-nama');
    const radioNim = document.getElementById('radio-nim');
    const filterButton = document.querySelector('.filter-button');

    radioNama.addEventListener('change', () => {
        if (radioNama.checked) {
            filterButton.style.display = 'inline-block';
        }
    });

    radioNim.addEventListener('change', () => {
        if (radioNim.checked) {
            filterButton.style.display = 'none';
        }
    });





// Panggil fungsi untuk inisialisasi filter saat halaman dimuat
document.addEventListener('DOMContentLoaded', initializeTabFilter);
