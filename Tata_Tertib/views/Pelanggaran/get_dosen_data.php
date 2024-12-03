<?php
// Mengimpor file koneksi database
require_once '../../db_connector.php';

// Mengatur header untuk respon JSON
header('Content-Type: application/json');

// Mengambil data dari tabel mahasiswa
try {
    $stmt = $pdo->query('SELECT * FROM dosen');
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Mengembalikan data dalam format JSON
    echo json_encode($data);
} catch (PDOException $e) {
    // Menangani error jika terjadi kesalahan saat query
    echo json_encode(['error' => 'Terjadi kesalahan saat mengambil data: ' . $e->getMessage()]);
}
?>


