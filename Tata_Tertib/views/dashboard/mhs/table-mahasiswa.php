<?php
// Membuat array yang menyimpan data tabel
$data = [
    ["No" => 1, "Pelanggaran" => "Terlambat memasuki kelas", "Kategori" => "1", "Status" => "1", "Tanggal_Waktu" => "2024-12-01 10:00", "Lampiran" => "Lampiran"],
    ["No" => 2, "Pelanggaran" => "Merokok tidak apda tempatnya", "Kategori" => "2", "Status" => "2", "Tanggal_Waktu" => "2024-12-01 09:45", "Lampiran" => "Lampiran"]
];

// Menampilkan tabel dengan perulangan for
echo '<div class="scrollable-table">';
echo '<table class="custom-table">';
echo '<thead>';
echo '<tr>';
echo '<th></th>';
echo '<th>Pelanggaran</th>';
echo '<th>Kategori</th>';
echo '<th>Status</th>';
echo '<th>Tanggal/Waktu</th>';
echo '<th>Lampiran</th>';
echo '<th></th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

for ($i = 0; $i < count($data); $i++) {
    echo '<tr>';
    echo '<td>' . $data[$i]["No"] . '.</td>';
    echo '<td>' . $data[$i]["Pelanggaran"] . '</td>';
    echo '<td>' . $data[$i]["Kategori"] . '</td>';
    echo '<td>' . $data[$i]["Status"] . '</td>';
    echo '<td>' . $data[$i]["Tanggal_Waktu"] . '</td>';
    echo '<td>';
    echo '<div class="dropdown">';
    echo '<button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton' . $i . '" data-bs-toggle="dropdown" aria-expanded="false">';
    echo 'Option';
    echo '</button>';
    echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton' . $i . '">';
    echo '<li><a class="dropdown-item" href="lampiran.php">Lampiran</a></li>';
    echo '<li><a class="dropdown-item" href="konfirmasiBukti.php">Konfirmasi Bukti</a></li>';
    echo '</ul>';
    echo '</div>';
    echo '</td>';
    echo '<td></td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';
echo '</div>';