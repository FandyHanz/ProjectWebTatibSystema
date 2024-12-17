<?php

// Membuat array yang menyimpan data tabel
include '../../models/Admin.php';
$obj = new Admin();
$data = $obj->getTabelUserKaryawan();

// Menampilkan tabel dengan perulangan for
?>

<div class="scrollable-table" style="height: 100%; overflow-y: auto">
    <table class="custom-table">
        <thead>
            <tr>
                <th></th>
                <th>Nama</th>
                <th>nip</th>
                <th>email</th>
                <th>no telp</th>
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
                    <td><?= $data[$i]["no_telp"] ?></td>
                    <td><?= $data[$i]["status"] ?></td>
                    <td>
                        <div class="btn-group dropleft">
                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Option
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="admin-detail-data-karyawan.php?nip=<?= $data[$i]['nip'] ?>" class="dropdown-item">
                                    Lihat Detail data
                                </a>
                                <a href="edit-karyawan.php?nip=<?= $data[$i]['nip'] ?>" class="dropdown-item">
                                    Edit data
                                </a>
                                <a href="deleteKaryawan.php?nip=<?= $data[$i]['nip'] ?>" class="dropdown-item">
                                    Hapus data
                                </a>
                            </div>
                    </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>