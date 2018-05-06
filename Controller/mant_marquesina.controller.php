<?php

require_once 'Config/Core.php';
require_once 'Model/marquesinaModel.php';
require_once 'Model/departamentosModel.php';


class Mant_marquesinaController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Mant_Marquesina();
    }

    public function Index(){

        GetRouteView(null, "header");
        GetRouteView("mant_marquesina", "Index");
        GetRouteView(null, "footer");
    }

    public function View(){
         echo json_encode($this->model->View());
    }

    public function Edit(){

        $Marquesina = new Mant_Marquesina();
        $Departamento = new Mant_Departamentos();
        $Departamentos = $Departamento->GetListDepartamentos();

        if(isset($_REQUEST['Id'])){
            $Marquesina = $this->model->Edit($_REQUEST['Id']);
        }

       GetRouteView(null, "header");
       require_once 'View/mant_marquesina/edit.php';
       GetRouteView(null, "footer");
    }

    public function Save(){

        $Marquesina = new Mant_Marquesina();

        $Marquesina->Id                       = $_REQUEST['Id'];
        $Marquesina->DepartamentoID           = $_REQUEST['DepartamentoID'];
        $Marquesina->TextoMostrar             = $_REQUEST['TextoMostrar'];
        $Marquesina->HoraInicial              = $_REQUEST['HoraInicial'];
        $Marquesina->FechaInicial             = $_REQUEST['FechaInicial'];
        $Marquesina->HoraFinal                = $_REQUEST['HoraFinal'];
        $Marquesina->FechaFinal               = $_REQUEST['FechaFinal'];
        $Marquesina->FechaModificacion        = date('Y-m-d');
        $Marquesina->FechaCreacion            = date('Y-m-d');
        $Marquesina->ModificadoPorUsuarioID   =  $_SESSION['DataUserOnline']['Usuario']->UsuarioID;
        $Marquesina->CreadoPorUsuarioID       =  $_SESSION['DataUserOnline']['Usuario']->UsuarioID;
        $Marquesina->Activo                   = $_REQUEST['Activo'];


        $Marquesina->Id > 0
            ? $this->model->Update($Marquesina)
            : $this->model->Create($Marquesina);

        header('Location:Index.php?c=mant_marquesina&a=Index');
    }

    public function  GetListMarquesina(){

        if(isset($_POST['Hora']) && $_POST['Action'] == "GetListMarquesina") {
            $Hora = $_POST['Hora'];
            echo json_encode($this->model->GetListMarquesina($Hora));
        }
    }

}