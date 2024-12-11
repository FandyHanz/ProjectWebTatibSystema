<?php
// Membuat array yang menyimpan data tabel

include '../../models/Admin.php';
$obj = new Admin();
$data = $obj->getTabelPelMhs();
?>

<form action="" class="filter d-flex flex-row justify-content-between align-items-center mx-auto mb-4">
    <div class="filter-button" id="filter-button">
        <a href="#" class="btn btn-light d-inline-flex" style="gap:10px;">
            <img src="../../assets/icon/book-open-icon.svg" alt=""> Program Studi
            <img src="../../assets/icon/caret-down-icon-filter.svg" alt="">
        </a>
    </div>
    <div class="search">
        <div class="form-group">
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Search">
        </div>
    </div>
</form>

<div class="scrollable-table" style="height: 80%; overflow-y: auto">
    <table class="custom-table">
        <thead>
            <tr>
                <th></th>
                <th>Nama</th>
                <th>NIMKK</th>
                <th>Status</th>
                <th>Tanggal/Waktu</th>
                <th>Kategori</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($data); $i++): ?>
                <tr>
                    <td><?= ($i + 1) ?>.</td>
                    <td><?= $data[$i]["nama_mahasiswa"] ?></td>
                    <td><?= $data[$i]["nim"] ?></td>
                    <td><?= $data[$i]["status_pelanggaran"] ?></td>
                    <td><?= $data[$i]["nama_pelanggaran"] ?></td> <!-- Diganti Tanggal Waktu -->
                    <td><?= $data[$i]["kategori"] ?></td>
                    <td>
                        <button class="btn btn-light">
                            Option
                            <img src="../../assets/icon/caret-down-icon.svg" style="width: 13px; height: 13px; margin-left: 5px" alt="">
                        </button>
                    </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>