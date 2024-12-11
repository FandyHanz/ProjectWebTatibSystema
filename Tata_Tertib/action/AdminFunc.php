<?php
Class AdminFunc extends Admin{

    public function __construct() {
        parent:: __construct();
    }

    public function filter(){
        if($_SERVER['REQUEST_METHODD'] == 'POST'){
            $option = $_POST['kelas'];
            include '../../models/Admin.php';
            $mhs = new Admin();
            $func = $mhs -> filterClassmhs($option);
        }
    }
}
?>