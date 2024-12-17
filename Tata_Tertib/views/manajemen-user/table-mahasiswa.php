<?php
// Membuat array yang menyimpan data tabel

include '../../models/Admin.php';
$obj = new Admin();
$data = $obj->getTabelUserMahasiswa();
?>

<div class="scrollable-table" style="height: 80%; overflow-y: auto">
    <table class="custom-table">
        <thead>
            <tr>
                <th></th>
                <th>Nama</th>
                <th>NIM</th>
                <th>No telp</th>
                <th>Kelas</th>
                <th>email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($data); $i++): ?>
                <tr>
                    <td><?= ($i + 1) ?>.</td>
                    <td><?= $data[$i]["nama"] ?></td>
                    <td><?= $data[$i]["nim"] ?></td>
                    <td><?= $data[$i]["no_telp"] ?></td>
                    <td><?= $data[$i]["nama_kelas"] ?></td> <!-- Diganti Tanggal Waktu -->
                    <td><?= $data[$i]["email"] ?></td>
                    <td>
                        <div class="btn-group dropleft">
                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Option
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#lihatDetailPelanggaranDanKonfirmasi">
                                    Lihat Detail data
                                </button>
                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal">
                                   <a href="edit-mhs.php?nim=<?=$data[$i]['nim']?>"> Edit data</a>
                                </button>
                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#detailDataMahasiswa">
                                <a href="deleteMhs.php?nim=<?=$data[$i]['nim']?>">Hapus data</a>
                                </button>
                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal">
                                    Selesai
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>