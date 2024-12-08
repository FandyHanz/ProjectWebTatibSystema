
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
?>
<?= $text ?>
<div class="scrollable-table">
    <table class="custom-table">
        <thead>
            <tr>
                <th></th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Kelas</th>
                <th>Prodi</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
<?php

for ($i = 0; $i < count($tabelMahasiswa); $i++) {
    ?>
    <tr>
    <td><?php echo $tabelMahasiswa[$i]["No"]; ?>.</td>
    <td><?php echo $tabelMahasiswa[$i]["Nama"]; ?></td>
    <td><?php echo $tabelMahasiswa[$i]["NIM"]; ?></td>
    <td><?php echo $tabelMahasiswa[$i]["Status"]; ?></td>
    <td><?php echo $tabelMahasiswa[$i]["Tanggal_Waktu"]; ?></td>
    <td><?php echo $tabelMahasiswa[$i]["Kategori"]; ?></td>
    <td>
        <button class="btn btn-light">
            Option
            <img src="assets/icon/caret-down-icon.svg" style="width: 13px; height: 13px; margin-left: 5px" alt="">
        </button>
    </td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>