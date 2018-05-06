<?php

require_once 'Config/Core.php';
require_once 'Model/puestosModel.php';
require_once 'Model/departamentosModel.php';


class Mant_puestosController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Mant_Puestos();
    }

    public function Index(){

        GetRouteView(null, "header");
        GetRouteView("mant_puestos", "Index");
        GetRouteView(null, "footer");
    }

    public function View(){
         echo json_encode($this->model->View());
    }

    public function Edit(){

        $Puesto = new Mant_Puestos();
        $Departamento = new Mant_Departamentos();
        $Departamento = $Departamento->GetListDepartamentos();

        if(isset($_REQUEST['Id'])){
            $Puesto = $this->model->Edit($_REQUEST['Id']);
        }

       GetRouteView(null, "header");
       require_once 'View/mant_puestos/edit.php';
       GetRouteView(null, "footer");
    }

    public function Save(){

        $Puesto = new Mant_Puestos();

        $Puesto->Id = $_REQUEST['Id'];
        $Puesto->Codigo = $_REQUEST['Codigo'];
        $Puesto->Nombre = $_REQUEST['Nombre'];
        $Puesto->Descripcion = $_REQUEST['Descripcion'];
        $Puesto->Activo = $_REQUEST['Activo'];
        $Puesto->DepartamentoID = $_REQUEST['DepartamentoID'];
        $Puesto->FechaModificacion = date('Y-m-d');
        $Puesto->FechaCreacion = date('Y-m-d');
        $Puesto->ModificadoPorUsuarioID =  $_SESSION['DataUserOnline']['Usuario']->UsuarioID;
        $Puesto->CreadoPorUsuarioID =  $_SESSION['DataUserOnline']['Usuario']->UsuarioID;


        $Puesto->Id > 0
            ? $this->model->Update($Puesto)
            : $this->model->Create($Puesto);

        header('Location:Index.php?c=mant_puestos&a=Index');
    }

}