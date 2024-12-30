<?php
// Membuat array yang menyimpan data tabel
include '../../models/Report.php';
$obj = new Report();
$input = $_GET['nama'];
$data = $obj->searchKaryawanByName($input);
?>
<form action="../../action/report/report-karyawan-redirect.php?cari-berdasarkan=nama" method="get" class="filter d-flex flex-row justify-content-end align-items-center mx-auto mb-4" style="gap: 10px;">
    <div class="search">
        <div class="form-group">
            <input type="text" name="input" class="form-control" id="formGroupExampleInput" placeholder="Input Name">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
</form>
<div class="scrollable-table" style="height: 100%; overflow-y: auto">
    <table class="custom-table">
        <thead>
            <tr>
                <th></th>
                <th>Nama</th>
                <th>NIP</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($data); $i++): ?>
                <tr>
                    <td><?= ($i + 1) ?>.</td>
                    <td><?= $data[$i]["nama"] ?></td>
                    <td><?= $data[$i]["nip"] ?></td>
                    <td>
                    <a href="form-karyawan.php?nip=<?= $data[$i]["nip"] ?>" class="btn btn-danger">Laporkan</a>
                    </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>

<?php
?>