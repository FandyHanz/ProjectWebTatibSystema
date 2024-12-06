// tabs.js

function initializeTabs() {
    // Menangani klik pada setiap tab untuk mengubah tab yang aktif
    document.querySelectorAll('.nav-table-button').forEach(button => {
        button.addEventListener('click', function () {
            // Menghapus class 'active' dari semua tab
            document.querySelectorAll('.nav-table-button').forEach(btn => btn.classList.remove('active'));

            // Menambahkan class 'active' pada tab yang diklik
            this.classList.add('active');

            updateSVGColors();

            // Menentukan file yang akan dimuat berdasarkan tab yang aktif
            const activeTabText = this.textContent.trim();
            let fileToLoad = '';

<<<<<<< HEAD:Tata_Tertib/views/Admin/tabs.js
=======
            // Memperbarui teks judul berdasarkan tab yang aktif
            const titleElement = document.querySelector('h1'); // Memilih elemen judul (h1)
            if (titleElement) {
                titleElement.textContent = `List Pelanggaran ${activeTabText}`;
            }

>>>>>>> 5f7a2ba (add : routes, controller, logging features. update : dashboard design, package structure):Tata_Tertib/views/dashboard/tabs.js
            updateTabNavUnderline(activeTabText);

            if (activeTabText === "Mahasiswa") {
                fileToLoad = 'views/dashboard/admin/table-mahasiswa.php';
            } else if (activeTabText === "Dosen") {
                fileToLoad = 'views/dashboard/admin/table-dosen.php';
            } else if (activeTabText === "Karyawan") {
                fileToLoad = 'views/dashboard/admin/table-karyawan.php';
            }

            // Memuat konten sesuai tab yang dipilih
            loadTableContent(fileToLoad);
        });
    });

    // Fungsi untuk memuat konten dari file PHP
    function loadTableContent(file) {
        const container = document.getElementById('table-content-container'); // Memilih container yang tepat

        // Menggunakan fetch untuk memuat file PHP
        fetch(file)
            .then(response => response.text())
            .then(data => {
                // Memasukkan data yang didapat ke dalam container
                container.innerHTML = data;
            })
            .catch(error => {
                // Menangani error jika fetch gagal
                container.innerHTML = 'Terjadi kesalahan saat memuat konten.';
                console.error('Error loading content:', error);
            });
    }

    // Memuat konten untuk tab aktif pertama kali
    loadTableContent('views/dashboard/admin/table-mahasiswa.php'); // Memuat konten untuk tab "Mahasiswa" pertama kali
}

function updateSVGColors() {
    document.querySelectorAll('.nav-table-button').forEach(button => {
        const svg = button.querySelector('img'); // Mengambil elemen SVG (atau <img> yang mewakili SVG)
        if (button.classList.contains('active')) {
            // Ubah warna SVG untuk tab aktif
            svg.style.filter = 'invert(60%) sepia(77%) saturate(500%) hue-rotate(180deg) brightness(90%) contrast(95%)';
        } else {
            // Kembalikan warna SVG untuk tab tidak aktif
            svg.style.filter = 'none';
        }
    });
}

function updateTabNavUnderline(button) {
    const line = document.getElementById('line-active');

    if (button === "Mahasiswa") {
        line.style.marginLeft = '0px';
        line.style.width = '165.02px';
    } else if (button === "Dosen") {
        line.style.marginLeft = '165.02px';
        line.style.width = '131.23px';
    } else if (button === "Karyawan") {
        line.style.marginLeft = '296.25px';
        line.style.width = '156.13px';
    }
}

// Mengekspor fungsi supaya bisa digunakan di file lain
export { initializeTabs };