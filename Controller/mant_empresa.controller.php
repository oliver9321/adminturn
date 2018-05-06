<?php

require_once 'Config/Core.php';
require_once 'Model/empresaModel.php';

class Mant_empresaController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Mant_Empresa();
    }

    public function Index(){
        if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {
        GetRouteView(null, "header");
        GetRouteView("mant_empresa", "Index");
        GetRouteView(null, "footer");
        }else{header('Location:Index.php?c=login&a=Index');}
    }

    public function Edit(){
            if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {
        $Empresa = new Mant_Empresa();

        if(isset($_REQUEST['Id'])){
            $Empresa = $this->model->Edit($_REQUEST['Id']);
        }

       GetRouteView(null, "header");
       require_once 'View/mant_empresa/edit.php';
       GetRouteView(null, "footer");
            }else{header('Location:Index.php?c=login&a=Index');}
    }

    public function Save(){

        $Empresa = new Mant_Empresa();

        $Empresa->Id = $_REQUEST['Id'];
        $Empresa->Codigo = $_REQUEST['Codigo'];
        $Empresa->Nombre = $_REQUEST['Nombre'];
        $Empresa->Descripcion = $_REQUEST['Descripcion'];
        $Empresa->Activo = $_REQUEST['Activo'];
        $Empresa->Rnc = $_REQUEST['Rnc'];
        $Empresa->Direccion = $_REQUEST['Direccion'];
        $Empresa->Telefono = $_REQUEST['Telefono'];
        $Empresa->FechaModificacion = date('Y-m-d');
        $Empresa->FechaCreacion = date('Y-m-d');
        $Empresa->ModificadoPorUsuarioID =  $_SESSION['DataUserOnline']['Usuario']->UsuarioID;
        $Empresa->CreadoPorUsuarioID =  $_SESSION['DataUserOnline']['Usuario']->UsuarioID;


        if( !empty($_FILES['LogoGrande']['name']) ){
            $foto = date('ymdhis') . '-' . strtolower($_FILES['LogoGrande']['name']);
            move_uploaded_file ($_FILES['LogoGrande']['tmp_name'], 'uploads/' . $foto);
            $Empresa->LogoGrande = $foto;
        }else{
            $Empresa->LogoGrande = $_REQUEST['LogoGrande'];
        }

        if( !empty($_FILES['LogoPeq']['name']) ){
            $foto = date('ymdhis') . '-' . strtolower($_FILES['LogoPeq']['name']);
            move_uploaded_file ($_FILES['LogoPeq']['tmp_name'], 'uploads/' . $foto);
            $Empresa->LogoPeq = $foto;
        }else{
            $Empresa->LogoPeq = $_REQUEST['LogoPeq'];
        }

        $Empresa->Id > 0
            ? $this->model->Update($Empresa)
            : $this->model->Create($Empresa);

        header('Location:?c=mant_empresa&a=Index');
    }

    public function GetListEmpresas(){
        echo json_encode($this->model->View());
    }
}