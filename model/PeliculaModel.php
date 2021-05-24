<?php

class PeliculaModel {

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function eliminar($nombre) {
        $consulta = $this->db->prepare("call sp_eliminarPelicula('" . $nombre . "')");
        $consulta->execute();
    }

    public function mostarpelicula($nombre) {
        $consulta = $this->db->prepare("call sp_selectBuscarN('" . $nombre . "')");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function mostarpeliculaTodo() {
        $consulta = $this->db->prepare("call sp_selectPelicula()");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function mostarpeliculaGenero($nombre) {
        $consulta2 = $this->db->prepare("call sp_selectPeliculaG('" . $nombre . "')");
        $consulta2->execute();
        $resultado2 = $consulta2->fetchAll();
        $consulta2->closeCursor();

        return $resultado2;
    }

    public function registrarGeneroPelicula($nombreGenero, $idPelicula) {

        $consulta = $this->db->prepare("call sp_insertarGeneroPelicula('" . $idPelicula . "','" . $nombreGenero . "')");
        $consulta->execute();
        $consulta->closeCursor();
    }

    public function registrarActorPelicula($nombreActor, $nombre) {
        $consulta = $this->db->prepare("call sp_insertarActorPelicula('" . $nombre . "','" . $nombreActor . "')");
        $consulta->execute();
        $consulta->closeCursor();
    }

    public function registrar($nombre, $duracion, $sinopsis, $idioma) {
        $consulta = $this->db->prepare("call sp_insertarPelicula('" . $nombre . "','" . $duracion . "','" . $sinopsis . "','" . $idioma . "')");
        $consulta->execute();
        $consulta->closeCursor();
    }

    public function actualizarpelicula($codigo,$nombre, $duracion, $sinopsis, $idioma) {
        $consulta = $this->db->prepare("call sp_actualizarPeliculas('" . $codigo . "','" . $nombre . "','" . $duracion . "','" . $sinopsis . "','" . $idioma . "')");
        $consulta->execute();
        $consulta->closeCursor();
    }

    public function ajax() {

        if (isset($_POST['genero_id'])) {
            $nombre = $_POST['genero_id'];
            $consulta = $this->db->prepare("call sp_filtrarGenero('" . $nombre . "')");
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            $consulta->closeCursor();
            echo '<option value="">Seleccione Actor</option>';
            foreach ($resultado as $opciones):
                echo '<option value=' . $opciones['nombre'] . '>' . $opciones['nombre'] . '</option>';
            endforeach;
        } elseif (isset($_POST['actor_id'])) {
            $nombre2 = $_POST['actor_id'];
            $consulta = $this->db->prepare("call sp_filtrarActor('" . $nombre2 . "')");
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            $consulta->closeCursor();
            echo '<option value="">Seleccione Pelicula</option>';
            foreach ($resultado as $opciones):
                echo '<option value=' . $opciones['nombre'] . '>' . $opciones['nombre'] . '</option>';
            endforeach;
        } else if (isset($_POST['pelicula_id'])) {
            $nombre3 = $_POST['pelicula_id'];
            $consulta = $this->db->prepare("call sp_selectBuscarN('" . $nombre3 . "')");
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            $consulta->closeCursor();
            echo '<tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Duracion</th>
                <th>Sinopsis</th>
                <th>Idioma</th>
                <th>Actor</th>
                <th>Genero</th>
             </tr>';
            foreach ($resultado as $opciones):
                echo '<tr>
                        <td>' . $opciones['codigo'] . '</td>
                        <td>' . $opciones['nombre'] . '</td>
                        <td>' . $opciones['duracion'] . '</td>
                        <td>' . $opciones['sinopsis'] . '</td>
                        <td>' . $opciones['idioma'] . '</td>
                        <td>' . $opciones['Actores'] . '</td>
                        <td>' . $opciones['Generos'] . '</td>
                    </tr>';
            endforeach;
        }else if (isset($_POST['busqueda_id'])) {
            $nombre3 = $_POST['busqueda_id'];
            $consulta = $this->db->prepare("call sp_selectBuscarN('" . $nombre3 . "')");
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            $consulta->closeCursor();
            echo '<tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Duracion</th>
                <th>Sinopsis</th>
                <th>Idioma</th>
                <th>Actor</th>
                <th>Genero</th>
             </tr>';
            foreach ($resultado as $opciones):
                echo '<tr>
                        <td>' . $opciones['codigo'] . '</td>
                        <td>' . $opciones['nombre'] . '</td>
                        <td>' . $opciones['duracion'] . '</td>
                        <td>' . $opciones['sinopsis'] . '</td>
                        <td>' . $opciones['idioma'] . '</td>
                        <td>' . $opciones['Actores'] . '</td>
                        <td>' . $opciones['Generos'] . '</td>
                    </tr>';
            endforeach;
        }
    }

}
