<?php
// Membuat array yang menyimpan data tabel
include '../../models/Admin.php';
$obj = new Admin();
$data = $obj->getTabelUserDosen();
?>
<div class="filter d-flex flex-row justify-content-end mx-auto mb-4">
    <div class="search">
        <form action="">
            <div class="form-group">
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Search">
            </div>
        </form>
    </div>
</div>

<div class="scrollable-table" style="height: 80%; overflow-y: auto">
    <table class="custom-table">
        <thead>
            <tr>
                <th></th>
                <th>Nama</th>
                <th>nip</th>
                <th>email</th>
                <th>kelas</th>
                <th>no_telp</th>
                <th>status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($data); $i++): ?>
                <tr>
                    <td><?= ($i + 1) ?>.</td>
                    <td><?= $data[$i]["nama"] ?></td>
                    <td><?= $data[$i]["nip"] ?></td>
                    <td><?= $data[$i]["email"] ?></td>
                    <td><?= $data[$i]["nama_kelas"] ?></td>
                    <td><?= $data[$i]["no_telp"] ?></td>
                    <td><?= $data[$i]["status"] ?></td>
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