
<?php
// Membuat array yang menyimpan data tabel
$data = [
    ["No" => 1, "Nama" => "Rizky Aditya", "NIM" => "21012345", "Status" => "Hadir", "Tanggal_Waktu" => "2024-12-01 10:00", "Kategori" => "Seminar", "Option" => "Option"],
    ["No" => 2, "Nama" => "Nina Putri", "NIM" => "21067890", "Status" => "Absen", "Tanggal_Waktu" => "2024-12-01 09:45", "Kategori" => "Workshop", "Option" => "OPTION"],
    ["No" => 3, "Nama" => "Doni Pratama", "NIM" => "21054321", "Status" => "Hadir", "Tanggal_Waktu" => "2024-12-01 11:15", "Kategori" => "Kelas", "Option" => "OPTION"],
    ["No" => 4, "Nama" => "Lisa Ramadhani", "NIM" => "21098765", "Status" => "Terlambat", "Tanggal_Waktu" => "2024-12-01 11:30", "Kategori" => "Pelatihan", "Option" => "OPTION"],
    ["No" => 5, "Nama" => "Andi Kurniawan", "NIM" => "21045678", "Status" => "Absen", "Tanggal_Waktu" => "2024-12-01 08:30", "Kategori" => "Seminar", "Option" => "OPTION"],
    ["No" => 6, "Nama" => "Siti Aisyah", "NIM" => "21078901", "Status" => "Hadir", "Tanggal_Waktu" => "2024-12-01 10:45", "Kategori" => "Diskusi", "Option" => "OPTION"]
];

// Menampilkan tabel dengan perulangan for
echo '<div class="scrollable-table">';
echo '<table class="custom-table">';
echo '<thead>';
echo '<tr>';
echo '<th></th>';
echo '<th>Nama</th>';
echo '<th>NIMDD</th>';
echo '<th>Status</th>';
echo '<th>Tanggal/Waktu</th>';
echo '<th>Kategori</th>';
echo '<th></th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

for ($i = 0; $i < count($data); $i++) {
    echo '<tr>';
    echo '<td>' . $data[$i]["No"] . '.</td>';
    echo '<td>' . $data[$i]["Nama"] . '</td>';
    echo '<td>' . $data[$i]["NIM"] . '</td>';
    echo '<td>' . $data[$i]["Status"] . '</td>';
    echo '<td>' . $data[$i]["Tanggal_Waktu"] . '</td>';
    echo '<td>' . $data[$i]["Kategori"] . '</td>';
    echo '<td><button class="btn btn-light">Option<img src="assets/icon/caret-down-icon.svg" style="width: 13px; height: 13px; margin-left: 5px" alt=""></button></td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';
echo '</div>';
