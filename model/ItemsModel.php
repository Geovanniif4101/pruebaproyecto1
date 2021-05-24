<?php

class ItemsModel {
    
    protected $db;
    
    public function __construct() {
        require 'libs/SPDO.php';
        $this->db= SPDO::singleton();
    } // constructor
    
    public function listar(){
        $consulta=$this->db->prepare('call sp_listar_productos()');
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
        
//        $data = array(
//            array(1000, "arroz"),
//            array(1005, "frijoles"),
//            array(1003, "leche"),
//            array(1004, "azucar"),
//            array(1004, "azucar1"),
//            array(1004, "azucar2"),
//            array(1004, "azucar3"),
//            array(1004, "azucar4")
//            
//        );
        
        //return $data;
    } // listar
    
} // fin clase

?>

