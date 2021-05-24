<?php

class GeneroModel {

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }// constructor


    public function registrar($nombre) {
        $consulta = $this->db->prepare("call sp_insertarGenero('" . $nombre . "')");
        $consulta->execute();
    }// registrar
}
