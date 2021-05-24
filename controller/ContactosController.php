<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactosController
 *
 * @author geova
 */
class ContactosController {
    public function __construct() {
        $this->view = new View();
    }

    public function mostrar() {
        $this->view->show("contactosView.php", "Mostrando");
    }

}
