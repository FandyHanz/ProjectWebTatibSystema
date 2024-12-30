<?php
include '../../models/Admin.php';
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="pelanggaran_mahasiswa.csv"');

$obj = new Admin();
$data = $obj->getHistoryPelMhs();

// Membuka output file untuk di-stream
$output = fopen('php://output', 'w');

// Header kolom CSV
fputcsv($output, ['No', 'Nama', 'NIM', 'Kelas', 'Status', 'Tanggal/Waktu', 'Pelanggaran', 'Kategori', 'deskripsi']);

// Isi data tabel ke file CSV
foreach ($data as $index => $row) {
    fputcsv($output, [
        $index + 1,
        $row['nama_mahasiswa'],
        $row['nim'],
        $row['nama_kelas'],
        getStatus($row['status_pelanggaran']),
        $row['tanggal_lapor'],
        $row['nama_pelanggaran'],
        $row['kategori'],
        $row['deskripsi_pelanggaran']
    ]);
}

fclose($output);

function getStatus($id_status)
{
    switch ($id_status) {
        case '1': return 'Selesai';
        case '2': return 'Sanksi Telah Dipenuhi';
        case '3': return 'Menunggu Sanksi';
        case '4': return 'Menunggu Konfirmasi';
        default: return 'Tidak Diketahui';
    }
}
?>