<?php
Class Koneksi{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "pbl_tatibsi";
    public $db;

    public function __construct(){
        $this -> db = mysqli_connect($this -> host, $this -> username,  $this -> password,  $this -> database);
        if ($this -> db -> connect_error){
            die("connection failed: ". $this -> db -> connect_error);
        }
    }
}