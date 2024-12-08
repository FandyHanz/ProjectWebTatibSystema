<?php
include_once 'core/koneksi.php';

Class Report extends Koneksi{
    public function __construct()
    {
        parent :: __construct();
    }

    public function searchingName($nama, $kelas, $prodi, $option){
        if ($option == 'Mahasiswa'){
            $sql = "SELECT * FROM Mahasiswa WHERE nama = $nama, kelas = $kelas, prodi = $prodi";
            $result = $this -> db -> query($sql);
            return $result;
        } else if ($nama == 'nim'){
            $sql = "SELECT * FROM Mahasiswa WHERE nim = $nama, kelas = $kelas, prodi = $prodi";
            $result = $this -> db -> query($sql);
            return $result;
        }if($option == 'Dosen'){
            $sql = "SELECT * FROM Dosen WHERE nama = $nama";
            $result = $this -> db -> query($sql);
            return $result;
        }else if ($nama == 'nip'){
            $sql = "SELECT * FROM Dosen WHERE nip = $nama";
            $result = $this -> db -> query($sql);
            return $result;
        } if ($option == 'karyawan'){
            $sql = "SELECT * FROM Karaywan WHERE nama = $nama";
            $result = $this -> db -> query($sql);
            return $result;
        } else if ($nama == 'nip'){
            $sql = "SELECT * FROM Karyawan WHERE nip = $nama";
            $result = $this -> db -> query($sql);
            return  $result;
        }
    }
}

?>