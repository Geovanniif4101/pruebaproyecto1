<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GuariaController
 *
 * @author geova
 */
class FloraFaunaController {

    public function __construct() {
        $this->view = new View();
    }

    public function mostrar() {
        $this->view->show("guariaView.php", "Mostrando");
    }

    public function mostrarceiba() {
        $this->view->show("ceibaView.php", "Mostrando");
    }

    public function mostrarlaurel() {
        $this->view->show("laurelView.php", "Mostrando");
    }

    public function mostrarpecari() {
        $this->view->show("pecariView.php", "Mostrando");
    }

    public function mostrarabaniquillo() {
        $this->view->show("abaniquilloView.php", "Mostrando");
    }

    public function mostraratucan() {
        $this->view->show("tucanView.php", "Mostrando");
    }

    public function mostrarana() {
        $this->view->show("ranaView.php", "Mostrando");
    }

}
