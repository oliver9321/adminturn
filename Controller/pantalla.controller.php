<?php

require_once 'Config/Core.php';
require_once 'Model/pantallaModel.php';

class PantallaController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Pantalla();
    }

    public function Index(){
        GetRouteView("pantalla", "Index");
    }

    public function MostrarTurno($variable){

        echo '<script>showname("'.$variable.'")</script>';
    }
}