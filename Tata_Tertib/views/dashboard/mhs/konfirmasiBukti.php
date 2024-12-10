<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Bukti</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Pelanggaran: Melakukan Kegiatan Asusila</h1>
        <p><strong>Tingkat:</strong> 1</p>
        <p><strong>Deskripsi:</strong></p>
        <p>Melakukan kegiatan asusila di tangga darurat saat jam kosong.</p>
        <p><strong>Lampiran:</strong></p>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">Lihat Bukti</button>
        <p><strong>Sanksi:</strong></p>
        <ol>
            <li>Teguran Lisan</li>
            <li>Teguran Tertulis</li>
            <li>Membuat Surat Pernyataan Dengan Materai</li>
        </ol>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Input Data Bukti</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="buktiForm">
                        <div class="mb-3">
                            <label for="namaPelanggar" class="form-label">Nama Pelanggar</label>
                            <input type="text" class="form-control" id="namaPelanggar" placeholder="Masukkan nama pelanggar">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsiBukti" class="form-label">Deskripsi Bukti</label>
                            <textarea class="form-control" id="deskripsiBukti" rows="3" placeholder="Masukkan deskripsi bukti"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="lampiranBukti" class="form-label">Lampiran Bukti</label>
                            <input type="file" class="form-control" id="lampiranBukti">
                        </div>
                        <div class="mb-3">
                            <label for="jenisSanksi" class="form-label">Jenis Sanksi</label>
                            <select class="form-select" id="jenisSanksi">
                                <option value="Teguran Lisan">Teguran Lisan</option>
                                <option value="Teguran Tertulis">Teguran Tertulis</option>
                                <option value="Surat Pernyataan">Membuat Surat Pernyataan Dengan Materai</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="submitBukti">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script -->
    <script>
        document.getElementById('submitBukti').addEventListener('click', function() {
            const nama = document.getElementById('namaPelanggar').value;
            const deskripsi = document.getElementById('deskripsiBukti').value;
            const sanksi = document.getElementById('jenisSanksi').value;

            if (nama && deskripsi) {
                alert(`Bukti berhasil dikirim!\nNama: ${nama}\nDeskripsi: ${deskripsi}\nSanksi: ${sanksi}`);
                const modal = bootstrap.Modal.getInstance(document.getElementById('formModal'));
                modal.hide();
            } else {
                alert('Harap lengkapi semua data.');
            }
        });
    </script>
</body>
</html>