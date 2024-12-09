<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Lampiran dengan Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Pelanggaran: Melakukan Kegiatan Asusila</h1>
        <p><strong>Tingkat:</strong> 1</p>
        <p><strong>Deskripsi:</strong></p>
        <p>Melakukan kegiatan asusila di tangga darurat saat jam kosong.</p>
        <p><strong>Lampiran:</strong></p>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lampiranModal">Lampiran</button>
        <p><strong>Sanksi:</strong></p>
        <ol>
            <li>Teguran Lisan</li>
            <li>Teguran Tertulis</li>
            <li>Membuat Surat Pernyataan Dengan Materai</li>
        </ol>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="lampiranModal" tabindex="-1" aria-labelledby="lampiranModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lampiranModalLabel">Lampiran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>File bukti lampiran:</p>
                    <a href="Bukti.pdf" class="btn btn-link" target="_blank">Download Bukti</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>