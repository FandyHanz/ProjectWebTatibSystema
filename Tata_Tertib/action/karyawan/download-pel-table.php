<?php
include '../../models/Admin.php';
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="pelanggaran_karyawan.csv"');

$obj = new Admin();
$data = $obj->getHistoryPelKaryawan();

// Membuka output file untuk di-stream
$output = fopen('php://output', 'w');

// Header kolom CSV
fputcsv($output, ['No', 'Nama', 'NIP', 'Status', 'Tanggal/Waktu', 'Pelanggaran', 'deskripsi']);

// Isi data tabel ke file CSV
foreach ($data as $index => $row) {
    fputcsv($output, [
        $index + 1,
        $row['nama'],
        $row['nip'],
        getStatus($row['status']),
        $row['tanggal_lapor'],
        $row['nama_pelanggaran'],
        $row['deskripsi']
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