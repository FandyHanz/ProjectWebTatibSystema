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

            // Menentukan data yang akan dimuat berdasarkan tab yang aktif
            const activeTabText = this.textContent.trim();

            // Memperbarui teks judul berdasarkan tab yang aktif
            const titleElement = document.querySelector('h1'); // Memilih elemen judul (h1)
            if (titleElement) {
                titleElement.textContent = `Formulir Laporan Pelanggaran ${activeTabText}`;
            }

             // Mengubah teks pada "Masukkan Nama Mahasiswa"
             const headerElement = document.getElementById('masukkan-nama-header');
             if (headerElement) {
                 headerElement.textContent = `Masukkan Nama ${activeTabText}`;
             }
            
            updateTabNavUnderline(activeTabText);

             // Mengubah radio button sesuai tab yang dipilih
             const radioNim = document.getElementById('radio-nim');
             const label = radioNim.nextElementSibling; // Mengambil label yang berada setelah input radio

             console.log('Radio NIM:', radioNim);
console.log('Label:', label);

             if (activeTabText === "Mahasiswa") {
                radioNim.setAttribute('value', 'nim');
                label.textContent = 'NIM'; // Mengubah teks label
            } else {
                radioNim.setAttribute('value', 'nip');
                label.textContent = 'NIP'; // Mengubah teks label
            }

            // Mengambil data berdasarkan tab yang aktif
            let tableToFetch = '';
            if (activeTabText === "Mahasiswa") {
                tableToFetch = 'mahasiswa';
            } else if (activeTabText === "Dosen") {
                tableToFetch = 'dosen';
            } else if (activeTabText === "Karyawan") {
                tableToFetch = 'karyawan';
            }

            // Mengambil data dari server untuk tab yang dipilih (tanpa menampilkannya)
            fetchTableData(tableToFetch);
        });
    });

     // Fungsi untuk menyesuaikan radio button berdasarkan tab yang aktif
     
   
    


    // Fungsi untuk mengambil data dari server (menggunakan AJAX)
    function fetchTableData(table) {
        // Menggunakan fetch untuk mendapatkan data dari server
        fetch(`get_${table}_data.php`)
            .then(response => response.json())  // Mengasumsikan server mengirim data dalam format JSON
            .then(data => {
                // Data sudah diambil, Anda bisa memprosesnya sesuai kebutuhan di sini
                console.log(data); // Misalnya, log data untuk pemeriksaan

                // Jika Anda ingin mengirim data ke tempat lain, lakukan itu di sini
                // Misalnya, mengirim data ke server lain atau menyimpan ke dalam variabel global
            })
            .catch(error => {
                // Menangani error jika fetch gagal
                console.error('Error loading data:', error);
            });
    }

    // Memuat data untuk tab "Mahasiswa" pertama kali
    fetchTableData('mahasiswa'); // Memuat data untuk tab "Mahasiswa" pertama kali
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
        line.style.width = '152.03px';
    } else if (button === "Dosen") {
        line.style.marginLeft = '152.03px';
        line.style.width = '118.25px';
    } else if (button === "Karyawan") {
        line.style.marginLeft = '270.28px';
        line.style.width = '143.16px';
    }
}

// Mengekspor fungsi supaya bisa digunakan di file lain
export { initializeTabs };