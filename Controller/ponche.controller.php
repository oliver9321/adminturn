<?php

require_once 'Config/Core.php';
require_once 'Model/poncheModel.php';

class poncheController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Ponche();
    }

    public function Index(){
        GetRouteView("ponche", "index");
    }

    public function ListadoBotones(){
       echo json_encode($this->model->ListarBotones(), true);
    }

    public function GenerarTurno(){

        $Request = file_get_contents('php://input');
        $data = json_decode($Request);

        if($Request){

            if($data->Action == "GenerarTurno"){
                echo json_encode($this->model->GetNexTurn($data->BotonID, $data->SucursalID), true);
            }else{

            }

        }
    }
}