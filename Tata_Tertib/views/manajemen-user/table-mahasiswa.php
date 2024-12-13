<?php
// Membuat array yang menyimpan data tabel

include '../../models/Admin.php';
$obj = new Admin();
$data = $obj->getTabelUserMahasiswa();
?>

<form action="" class="filter d-flex flex-row justify-content-between align-items-center mx-auto mb-4">
    <div class="filter-button" id="filter-button">
        <select class="form-select" id="kelas" name="kelas" aria-label="Default select example">
            <option value="" disabled selected>Kelas</option>
            <option value="TI-1A">TI - 1A</option>
            <option value="TI-1B">TI - 1B</option>
            <option value="TI-1C">TI - 1C</option>
            <option value="SIB-1A">SIB - 1A</option>
            <option value="SIB-1B">SIB - 1B</option>
            <option value="SIB-1C">SIB - 1C</option>
        </select>
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