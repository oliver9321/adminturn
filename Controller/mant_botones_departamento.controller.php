<?php

require_once 'Config/Core.php';
require_once 'Model/botonesDepartamentoModel.php';
require_once 'Model/botonesTurnosModel.php';
require_once 'Model/departamentosModel.php';

class Mant_botones_departamentoController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Mant_BotonesDepartamento();
    }

    public function Index(){

        if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {

        GetRouteView(null, "header");
        require_once 'View/mant_turnos/mant_botones_departamento/Index.php';
        GetRouteView(null, "footer");

    }else{
        header('Location:Index.php?c=login&a=Index');
        }
    }

    public function View(){

         if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {

             echo json_encode($this->model->View());

        }else{
            header('Location:Index.php?c=login&a=Index');
        }
    }

    public function Edit(){

    if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {
        $DepartamentosByBoton = "";
        $BotonDept = new Mant_BotonesDepartamento();
        $Botones = new Mant_BotonesTurnos();
        $BotonesArray = $Botones->GetListBotones();

        $Departamentos = new Mant_Departamentos();
        $DepartamentosArray = $Departamentos->GetListDepartamentos();

        if(isset($_REQUEST['BotonTurnoID'])){
            $BotonDept = $this->model->Edit($_REQUEST['BotonTurnoID']);
            $DepartamentosByBoton =  $Departamentos->GetListDepartamentoByBoton($_REQUEST['BotonTurnoID']);
        }

       GetRouteView(null, "header");
       require_once 'View/mant_turnos/mant_botones_departamento/edit.php';
       GetRouteView(null, "footer");

        }else{
            header('Location:Index.php?c=login&a=Index');
        }
    }

    public function Save(){

        $this->model->Id                     = $_REQUEST['Id'];
        $this->model->BotonTurnoID           = $_REQUEST['BotonTurnoID'];
        $this->model->DepartamentoID         = $_REQUEST['DepartamentoID'];
        $this->model->Activo                 = $_REQUEST['Activo'];
        $this->model->FechaModificacion      = date('Y-m-d');
        $this->model->FechaCreacion          = date('Y-m-d');
        $this->model->ModificadoPorUsuarioID =  $_SESSION['DataUserOnline']['Usuario']->UsuarioID;
        $this->model->CreadoPorUsuarioID     =  $_SESSION['DataUserOnline']['Usuario']->UsuarioID;

        $this->model->Id > 0
            ? $this->model->Update($this->model)
            : $this->model->Create($this->model);

        header('Location:Index.php?c=mant_botones_departamento&a=Index');
    }

}