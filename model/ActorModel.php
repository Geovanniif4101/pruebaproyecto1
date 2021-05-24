<?php

class ActorModel {

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function registrar($nombre, $apellido) {
        $consulta = $this->db->prepare("call sp_insertarActor('" . $nombre . "','" . $apellido . "')");
        $consulta->execute();
    }

}
