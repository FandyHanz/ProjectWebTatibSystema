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
                    <td><?= (empty($data[$i]["nama_kelas"]) ? 'Tidak Ada Kelas' : $data[$i]["nama_kelas"]) ?></td>
                    <td><?= $data[$i]["no_telp"] ?></td>
                    <td><?= $data[$i]["status"] ?></td>
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
                                   <a href="edit-dosen.php?nip=<?=$data[$i]['nip']?>"> Edit data</a>
                                </button>
                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#detailDataMahasiswa">
                                <a href="deleteDosen.php?nip=<?=$data[$i]['nip']?>">Hapus data</a>
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