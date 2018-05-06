<?php

require_once 'Config/Core.php';
require_once 'Model/departamentosModel.php';
require_once 'Model/sucursalesModel.php';

class Mant_departamentosController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Mant_Departamentos();
    }

    public function Index(){

        if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {

        GetRouteView(null, "header");
        GetRouteView("mant_departamentos", "Index");
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

        $Departamento = new Mant_Departamentos();
        $Sucursal = new Mant_Sucursales();
        $Sucursal = $Sucursal->GetListSucursales();

        if(isset($_REQUEST['Id'])){
            $Departamento = $this->model->Edit($_REQUEST['Id']);
        }

       GetRouteView(null, "header");
       require_once 'View/mant_departamentos/edit.php';
       GetRouteView(null, "footer");

         }else{header('Location:Index.php?c=login&a=Index');}
    }

    public function Save(){

        $Departamento = new Mant_Departamentos();

        $Departamento->Id = $_REQUEST['Id'];
        $Departamento->Codigo = $_REQUEST['Codigo'];
        $Departamento->Nombre = $_REQUEST['Nombre'];
        $Departamento->Descripcion = $_REQUEST['Descripcion'];
        $Departamento->Activo = $_REQUEST['Activo'];
        $Departamento->SucursalID = $_REQUEST['SucursalID'];
        $Departamento->FechaModificacion = date('Y-m-d');
        $Departamento->FechaCreacion = date('Y-m-d');
        $Departamento->ModificadoPorUsuarioID =  $_SESSION['DataUserOnline']['Usuario']->UsuarioID;
        $Departamento->CreadoPorUsuarioID =  $_SESSION['DataUserOnline']['Usuario']->UsuarioID;


        $Departamento->Id > 0
            ? $this->model->Update($Departamento)
            : $this->model->Create($Departamento);

        header('Location:?c=mant_departamentos&a=Index');
    }

}