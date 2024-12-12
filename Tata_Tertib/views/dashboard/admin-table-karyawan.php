<?php
// Membuat array yang menyimpan data tabel
$data = [
    ["No" => 1, "Nama" => "Ekya ", "NIM" => "21012345", "Status" => "1", "Tanggal_Waktu" => "2024-12-01 10:00", "Kategori" => "Seminar", "Option" => "Option"],
    ["No" => 2, "Nama" => "Nina Putri", "NIM" => "21067890", "Status" => "3", "Tanggal_Waktu" => "2024-12-01 09:45", "Kategori" => "Workshop", "Option" => "OPTION"],
    ["No" => 3, "Nama" => "Doni Pratama", "NIM" => "21054321", "Status" => "2", "Tanggal_Waktu" => "2024-12-01 11:15", "Kategori" => "Kelas", "Option" => "OPTION"],
    ["No" => 4, "Nama" => "Lisa Ramadhani", "NIM" => "21098765", "Status" => "1", "Tanggal_Waktu" => "2024-12-01 11:30", "Kategori" => "Pelatihan", "Option" => "OPTION"],
    ["No" => 5, "Nama" => "Andi Kurniawan", "NIM" => "21045678", "Status" => "4", "Tanggal_Waktu" => "2024-12-01 08:30", "Kategori" => "Seminar", "Option" => "OPTION"],
    ["No" => 6, "Nama" => "Siti Aisyah", "NIM" => "21078901", "Status" => "4", "Tanggal_Waktu" => "2024-12-01 10:45", "Kategori" => "Diskusi", "Option" => "OPTION"]
];

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
                    <td><?= $data[$i]["Nama"] ?></td>
                    <td><?= $data[$i]["NIM"] ?></td>
                    <td><?= getStatusUi($data[$i]['Status']) ?></td>
                    <td><?= $data[$i]["Tanggal_Waktu"] ?></td>
                    <td><?= $data[$i]["Kategori"] ?></td>
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