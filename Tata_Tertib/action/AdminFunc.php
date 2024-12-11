<?php
include '../../models/Admin.php';
$conn = new Admin();
$ter;

Class AdminFunc extends Admin{

    public function __construct() {
        parent:: __construct();
    }

    public function filter(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $option = $_POST['kelas'];
            switch($option){
                case 'TI-1A':
                    include '../../models/Admin.php';
                    $conn = new Admin();
                    $ter = $conn -> filterClassmhs('TI-1A');
                    return $ter;
                    break;
                case 'TI-1B':
                    include '../../models/Admin.php';
                    $conn = new Admin();
                    $ter = $conn -> filterClassmhs('TI-1B');
                    return $ter;
                    break;
                case 'TI-1C':
                    include '../../models/Admin.php';
                    $conn = new Admin();
                    $ter = $conn -> filterClassmhs('TI-1C');
                    return $ter;
                    break;
                case 'SIB-1A':
                    include '../../models/Admin.php';
                    $conn = new Admin();
                    $ter = $conn -> filterClassmhs('SIB-1A');
                    return $ter;
                    break;
                case 'SIB-1B':
                    include '../../models/Admin.php';
                    $conn = new Admin();
                    $ter = $conn -> filterClassmhs('SIB-1B');
                    return $ter;
                    break;
                case 'SIB-1C':
                    include '../../models/Admin.php';
                    $conn = new Admin();
                    $ter = $conn -> filterClassmhs('SIB-1C');
                    return $ter;
                    break;
            }
        }
    }
}
?>