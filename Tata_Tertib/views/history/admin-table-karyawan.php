<?php
// Membuat array yang menyimpan data tabel

include '../../models/Admin.php';
$obj = new Admin();
$data = $obj->getHistoryPelKaryawan();
?>

<div class="scrollable-table" style="height: 100%; overflow-y: auto">
    <table class="custom-table">
        <thead>
            <tr>
                <th></th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Status</th>
                <th>Tanggal/Waktu</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($data); $i++): ?>
                <tr>
                    <td><?= ($i + 1) ?>.</td>
                    <td><?= $data[$i]["nama"] ?></td>
                    <td><?= $data[$i]["nip"] ?></td>
                    <td><?= getStatusUi($data[$i]["status"]) ?></td>
                    <td><?= $data[$i]["tanggal_lapor"] ?></td>
                    <td>
                        <div class="btn-group dropleft">
                            <button type="button" class="btn btn-light rounded dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Option</span>
                            </button>
                            <div class="dropdown-menu">
                                <a href="admin-detpel-karyawan.php?id_pelanggaran=<?= $data[$i]["id_pelanggaran_tendik"] ?>" class="dropdown-item">
                                    Lihat Detail Pelanggaran dan Konfirmasi
                                </a>
                                <a href="bukti-selesai-karyawan.php?id_pelanggaran=<?= $data[$i]["id_pelanggaran_tendik"] ?>" class="dropdown-item <?= ($data[$i]["status"] == 1) || ($data[$i]["status"] == 2) ? "" : "disabled" ?>">
                                    Bukti Tebus Sanksi
                                </a>
                                <a href="admin-detail-data-karyawan.php?nip=<?= $data[$i]["nip"] ?>" class="dropdown-item">
                                    Data Pelanggar
                                </a>
                                <a class="dropdown-item <?= $data[$i]['status'] == 2 ? "" : "disabled" ?>" href="../../action/karyawan/selesai-action.php?id=<?= $data[$i]['id_pelanggaran_tendik'] ?>">
                                    Selesai
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>

<?php
function getStatusUi($id_status)
{
    switch ($id_status) {
        case '1':
            # code...
            echo '
            <div class="btn d-flex flex-row align-items-center" style="font-size: 12px;margin-right:5px; width:fit-content; gap: 14px; border-radius:30px; background-color:#EDEDED; color:#B4B4B4;">
                <div class="circle rounded-circle" style="width:10px; height:10px; background-color:#B4B4B4;"></div>
                Selesai
            </div>
            ';
            break;
        case '2':
            # code...
            echo '
                <div class="btn d-flex flex-row align-items-center" style="font-size: 12px;margin-right:5px; width:fit-content; gap: 14px; border-radius:30px; background-color:#D5F2FF; color:#00B6FF;">
                    <div class="circle rounded-circle" style="width:10px; height:10px; background-color:#00B6FF;"></div>
                    Sanksi Telah Dipenuhi
                    </div>
                    ';
            break;
        case '3':
            # code...
            echo '
            <div class="btn d-flex flex-row align-items-center" style="font-size: 12px;margin-right:5px; width:fit-content; gap: 14px; border-radius:30px; background-color:#FFF1D6; color:#FFA500;">
            <div class="circle rounded-circle" style="width:10px; height:10px; background-color:#FFA500;"></div>
            Menunggu Sanksi
            </div> ';
            break;
        case '4':
            # code...
            echo '
                    <div class="btn d-flex flex-row align-items-center" style="font-size: 12px;margin-right:5px; width:fit-content; gap: 14px; border-radius:30px; background-color:#FFD6D6; color:#FF4F4F;">
                    <div class="circle rounded-circle" style="width:10px; height:10px; background-color:#FF4F4F;"></div>
                    Menunggu Konfirmasi
                    </div>';
            break;
        default:
            echo $id_status;
            break;
    }
}
?>