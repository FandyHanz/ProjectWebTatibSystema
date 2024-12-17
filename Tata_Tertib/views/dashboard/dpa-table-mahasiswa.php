<?php
// Membuat array yang menyimpan data tabel

include '../../models/Dpa.php';
include '../../core/Session.php';
$session = new Session();
$obj = new Dpa();
$nip = $session->get('username');
$data = $obj->getTabelPelMhs($nip);

function getTombolBuktiTebus($data, $i)
{
    $id = $data[$i]["id_pelanggaran_mhs"];
    if ($data[$i]["status_pelanggaran"] <= 2) {
        echo '<a href="bukti-selesai-mhs.php?id=' . $id . '" class="dropdown-item">
                Bukti Tebus Sanksi
            </a>';
    } else {
        echo '<a class="dropdown-item disabled-link disabled">
                Bukti Tebus Sanksi
            </a>';
    }
}

function getTombolSelesai($data, $i)
{
    if ($data[$i]["status_pelanggaran"] == 2) {
        echo '<a href="../../action/mhs/selesai-action.php?id=' . $data[$i]['id_pelanggaran_mhs'] . '" class="dropdown-item">
                Selesai
            </a>';
    } else {
        echo '<a class="dropdown-item disabled-link disabled">
                Selesai
            </a>';
    }
}

?>

<div class="scrollable-table" style="height: 80%; overflow-y: auto">
    <table class="custom-table">
        <thead>
            <tr>
                <th></th>
                <th>Nama</th>
                <th>NIM</th>
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
                    <td><?= getStatusUi($data[$i]["status_pelanggaran"]) ?></td>
                    <td><?= $data[$i]["tanggal_lapor"] ?></td> <!-- Diganti Tanggal Waktu -->
                    <td><?= $data[$i]["kategori"] ?></td>
                    <td>
                        <div class="btn-group dropleft">
                            <button type="button" class="btn btn-light rounded dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Option</span>
                            </button>
                            <div class="dropdown-menu">
                                <a href="dpa-detpel-mhs.php?nim=<?= $data[$i]["nim"] ?>&id_pelanggaran=<?= $data[$i]["id_pelanggaran_mhs"] ?>" class="dropdown-item">
                                    Lihat Detail Pelanggaran dan Konfirmasi
                                </a>
                                <?php
                                getTombolBuktiTebus($data, $i);
                                ?>
                                <a href="admin-detail-data-mhs.php?nim=<?= $data[$i]["nim"] ?>" class="dropdown-item">
                                    Data Pelanggar
                                </a>
                                <?php
                                getTombolSelesai($data, $i);
                                ?>
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