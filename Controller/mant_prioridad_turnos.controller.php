<?php

require_once 'Config/Core.php';
require_once 'Model/prioridadesTurnosModel.php';


class mant_prioridad_turnosController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Mant_PrioridadesTurnos();
    }

    public function Index(){

        GetRouteView(null, "header");
        require_once 'View/mant_turnos/mant_prioridad_turnos/Index.php';
        GetRouteView(null, "footer");
    }

    public function View(){
         echo json_encode($this->model->View());
    }

    public function Edit(){

        if(isset($_REQUEST['Id'])){
            $this->model = $this->model->Edit($_REQUEST['Id']);
        }

       GetRouteView(null, "header");
       require_once 'View/mant_turnos/mant_prioridad_turnos/edit.php';
       GetRouteView(null, "footer");
    }

    public function Save(){

        $this->model->Id = $_REQUEST['Id'];
        $this->model->Nivel = $_REQUEST['Nivel'];
        $this->model->Prioridad = $_REQUEST['Prioridad'];
        $this->model->Activo = $_REQUEST['Activo'];
        $this->model->FechaModificacion = date('Y-m-d');
        $this->model->FechaCreacion = date('Y-m-d');
        $this->model->ModificadoPorUsuarioID =  $_SESSION['DataUserOnline']['Usuario']->UsuarioID;
        $this->model->CreadoPorUsuarioID =  $_SESSION['DataUserOnline']['Usuario']->UsuarioID;


        $this->model->Id > 0
            ? $this->model->Update($this->model)
            : $this->model->Create($this->model);

        header('Location:?c=mant_prioridad_turnos&a=Index');
    }

}