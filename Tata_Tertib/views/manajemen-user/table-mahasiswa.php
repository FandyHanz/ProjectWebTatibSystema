<?php
// Membuat array yang menyimpan data tabel

include '../../models/Admin.php';
$obj = new Admin();
$data = $obj->getTabelUserMahasiswa();
?>

<form action="../../action/AdminFunc.php" class="filter d-flex flex-row justify-content-between align-items-center mx-auto mb-4">
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
            <?php
            ?>>
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
                                    Lihat Detail Pelanggaran dan Konfirmasi
                                </button>
                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal">
                                    Bukti Sanksi
                                </button>
                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#detailDataMahasiswa">
                                    Data Pelanggar
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
<!-- Modal -->
<!-- MODAL DETAIL PELANGGARAN DAN KONFIRMASI -->
<div class="modal fade" id="lihatDetailPelanggaranDanKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="Detail dan Konfirmasi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document"> <!-- Add modal-dialog-centered here -->
        <div class="modal-content">
            <div class="modal-header p-0 m-0 position-absolute col-12 flex-row justify-content-end" style="background-color: transparent; border: none; z-index: 100;">
                <button type="button" class="close" style="border: none; background-color: transparent; cursor: pointer; margin-right: 10px;margin-top: 8px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-row p-0 m-0">
                <div class="lefside col-4 d-flex flex-column align-items-center" style="background-color: #1976D2;border-top-left-radius: 6.5px; border-bottom-left-radius: 6.5px; color: white">
                    <img class="rounded-circle mx-auto mt-5" style="height: 125px; width: 125px;" alt="avatar" src="../../assets/foto-mahasiswa/contoh-profile.png"/>
                    <p class="mt-3">2341720111</p>
                </div>
                <div class="rightside col-8 p-4">
                    <h3 class="mb-0">Soeharto bin Budris</h3>
                    <h9 class="mt-0 pt-0">Mahasiswa Aktif</h9>
                    <br>
                    <br>

                    <h9 class="mt-0 pt-0">Kelas: D4TI-2B</h9><br>
                    <h9 class="mt-0 pt-0">No Telp : 081252288523</h9><br>
                    <h9 class="mt-0 pt-0">Email: D4TI-2B</h9><br>
                    <h9 class="mt-0 pt-0">Domisili:</h9><br>
                    <h9 class="mt-0 pt-0">Jalan mawar badasdaidj ia aisdj aisdjasi dja ijas dijas idja sid jasid jasdi jasd iasjdasid jasid jas idaj diasjd</h9><br>
                    <br>
                    <h5>Data Keluarga</h5>
                    <h9 class="mt-0 pt-0">Nama Ayah: Sutarno</h9><br>
                    <h9 class="mt-0 pt-0">No Telp Ayah: 12391083</h9><br>
                    <h9 class="mt-0 pt-0">Nama Ibu: Sutarnii no jutsu</h9><br>
                    <h9 class="mt-0 pt-0">No Telp Ibu: 12391083</h9><br>
                    <br>
                    <h5>Data DPA</h5>
                    <h9 class="mt-0 pt-0">Nama: Dini Andrita Sari</h9><br>
                    <h9 class="mt-0 pt-0">NIP: 12391083</h9><br>
                    <h9 class="mt-0 pt-0">No Telp: 12391083</h9><br>
                    <h9 class="mt-0 pt-0">Email: 12391083</h9><br>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DATA PELANGGAR -->
<div class="modal fade" id="detailDataMahasiswa" tabindex="-1" role="dialog" aria-labelledby="Data Pelanggar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document"> <!-- Add modal-dialog-centered here -->
        <div class="modal-content">
            <div class="modal-header p-0 m-0 position-absolute col-12 flex-row justify-content-end" style="background-color: transparent; border: none; z-index: 100;">
                <button type="button" class="close" style="border: none; background-color: transparent; cursor: pointer; margin-right: 10px;margin-top: 8px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-row p-0 m-0">
                <div class="lefside col-4 d-flex flex-column align-items-center" style="background-color: #1976D2;border-top-left-radius: 6.5px; border-bottom-left-radius: 6.5px; color: white">
                    <img class="rounded-circle mx-auto mt-5" style="height: 125px; width: 125px;" alt="avatar" src="../../assets/foto-mahasiswa/contoh-profile.png"/>
                    <p class="mt-3">2341720111</p>
                </div>
                <div class="rightside col-8 p-4">
                    <h3 class="mb-0">Soeharto bin Budris</h3>
                    <h9 class="mt-0 pt-0">Mahasiswa Aktif</h9>
                    <br>
                    <br>

                    <h9 class="mt-0 pt-0">Kelas: D4TI-2B</h9><br>
                    <h9 class="mt-0 pt-0">No Telp : 081252288523</h9><br>
                    <h9 class="mt-0 pt-0">Email: D4TI-2B</h9><br>
                    <h9 class="mt-0 pt-0">Domisili:</h9><br>
                    <h9 class="mt-0 pt-0">Jalan mawar badasdaidj ia aisdj aisdjasi dja ijas dijas idja sid jasid jasdi jasd iasjdasid jasid jas idaj diasjd</h9><br>
                    <br>
                    <h5>Data Keluarga</h5>
                    <h9 class="mt-0 pt-0">Nama Ayah: Sutarno</h9><br>
                    <h9 class="mt-0 pt-0">No Telp Ayah: 12391083</h9><br>
                    <h9 class="mt-0 pt-0">Nama Ibu: Sutarnii no jutsu</h9><br>
                    <h9 class="mt-0 pt-0">No Telp Ibu: 12391083</h9><br>
                    <br>
                    <h5>Data DPA</h5>
                    <h9 class="mt-0 pt-0">Nama: Dini Andrita Sari</h9><br>
                    <h9 class="mt-0 pt-0">NIP: 12391083</h9><br>
                    <h9 class="mt-0 pt-0">No Telp: 12391083</h9><br>
                    <h9 class="mt-0 pt-0">Email: 12391083</h9><br>
                </div>
            </div>
        </div>
    </div>
</div>