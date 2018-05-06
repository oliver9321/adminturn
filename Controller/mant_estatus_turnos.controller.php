<?php

require_once 'Config/Core.php';
require_once 'Model/estatusTurnosModel.php';


class Mant_estatus_turnosController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Mant_EstatusTurnos();
    }

    public function Index(){
        if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {
        GetRouteView(null, "header");
        require_once 'View/mant_turnos/mant_estatus_turnos/Index.php';
        GetRouteView(null, "footer");
        }else{header('Location:Index.php?c=login&a=Index');}
    }

    public function View(){
            if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {
                  echo json_encode($this->model->View());
            }else{header('Location:Index.php?c=login&a=Index');}
    }

    public function Edit(){

    if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {

        if(isset($_REQUEST['Id'])){
            $this->model = $this->model->Edit($_REQUEST['Id']);
        }

       GetRouteView(null, "header");
       require_once 'View/mant_turnos/mant_estatus_turnos/edit.php';
       GetRouteView(null, "footer");
    }else{header('Location:Index.php?c=login&a=Index');}

    }

    public function Save(){

        $this->model->Id = $_REQUEST['Id'];
        $this->model->Estatus = $_REQUEST['Estatus'];
        $this->model->Descripcion = $_REQUEST['Descripcion'];
        $this->model->Activo = $_REQUEST['Activo'];
        $this->model->FechaModificacion = date('Y-m-d');
        $this->model->FechaCreacion = date('Y-m-d');
        $this->model->ModificadoPorUsuarioID =  $_SESSION['DataUserOnline']['Usuario']->UsuarioID;
        $this->model->CreadoPorUsuarioID =  $_SESSION['DataUserOnline']['Usuario']->UsuarioID;


        $this->model->Id > 0
            ? $this->model->Update($this->model)
            : $this->model->Create($this->model);

        header('Location:?c=mant_estatus_turnos&a=Index');
    }

}