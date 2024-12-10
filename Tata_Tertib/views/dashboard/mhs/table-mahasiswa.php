<?php
// Membuat array yang menyimpan data tabel


include('../../../models/Mahasiswa.php');
$model = new Mahasiswa();
$data = $model -> getTablePelanggaranMahasiswa();

// Menampilkan tabel dengan perulangan for
echo '<div class="scrollable-table">';
echo '<table class="custom-table">';
echo '<thead>';
echo '<tr>';
echo '<th>No.</th>';
echo '<th>Pelanggaran</th>';
echo '<th>Deskripsi</th>';
echo '<th>Status</th>';
echo '<th>Lampiran</th>';
echo '<th></th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
$i=0;
foreach($data as $row) {
    $i++;
    echo '<tr>';
    echo '<td>' . $i. '.</td>';
    echo '<td>' . $row['id_pelanggaran']. '</td>';
    echo '<td>' . $row['deskripsi'] . '</td>';
    echo '<td>' . $row['status_pelanggaran'] . '</td>';
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