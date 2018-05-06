<?php

require_once 'Config/Core.php';
require_once 'Model/usuariosModel.php';
require_once 'Model/puestosModel.php';
require_once 'Model/perfilesUsuariosModel.php';


class Mant_usuariosController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Mant_Usuarios();
    }

    public function Index(){
        if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {

        GetRouteView(null, "header");
        require_once 'View/mant_usuarios/mant_usuarios/Index.php';
        GetRouteView(null, "footer");

        }else{
            header('Location:Index.php?c=login&a=Index');
        }
    }

    public function View(){
        if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {
         echo json_encode($this->model->View(), true);
        }else{
            header('Location:Index.php?c=login&a=Index');
        }
    }

    public function Edit(){

        if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {

        //Instancias de clases
        $Usuario = new Mant_Usuarios();
        $Puestos = new Mant_Puestos();
        $PuestosByUser = "";
        $PuestosArray = $Puestos->GetListPuestos();

        $PerfilesUsuarios = new Mant_PerfilesUsuarios();
        $PerfilesUsuarios = $PerfilesUsuarios->GetListPerfilesUsuarios();

        if(isset($_REQUEST['Id'])){

            $Usuario =  $this->model->Edit($_REQUEST['Id']);
            $PuestosByUser =  $Puestos->GetListPuestosByUser($_REQUEST['Id']);
        }

       GetRouteView(null, "header");
       require_once 'View/mant_usuarios/mant_usuarios/edit.php';
       GetRouteView(null, "footer");

        }else{
            header('Location:Index.php?c=login&a=Index');
        }
    }

    public function Save()
    {

        if (isset($_REQUEST['Nombre']) || isset($_REQUEST['Usuario'])) {

            $Usuario = new Mant_Usuarios();

            $Usuario->Id = $_REQUEST['Id'];
            $Usuario->PerfilUsuarioID = $_REQUEST['PerfilUsuarioID'];
            $Usuario->Nombre = $_REQUEST['Nombre'];
            $Usuario->Apellido = $_REQUEST['Apellido'];
            $Usuario->Usuario = $_REQUEST['Usuario'];
            $Usuario->Password = $_REQUEST['Password'];
            $Usuario->PuestoID = $_REQUEST['PuestoID'];
            $Usuario->Email = $_REQUEST['Email'];
            $Usuario->Activo = $_REQUEST['Activo'];
            $Usuario->FechaModificacion = date('Y-m-d');
            $Usuario->FechaCreacion = date('Y-m-d');
            $Usuario->ModificadoPorUsuarioID = $_SESSION['DataUserOnline']['Usuario']->UsuarioID;
            $Usuario->CreadoPorUsuarioID = $_SESSION['DataUserOnline']['Usuario']->UsuarioID;

            if (!empty($_FILES['Imagen']['name'])) {
                $Imagen2 = date('ymdhis') . '-' . strtolower($_FILES['Imagen']['name']);
                move_uploaded_file($_FILES['Imagen']['tmp_name'], 'uploads/' . $Imagen2);
                $Usuario->Imagen = $Imagen2;
            } else {
                $Usuario->Imagen = $_REQUEST['Imagen'];
            }


            if ($Usuario->Id > 0) {

                $Message =  $this->model->Update($Usuario);

                if ($Message != "1") {
                    echo '<script>alert("' . $Message . '"); setTimeout(function(){ window.location.href = "/Index.php?c=mant_usuarios&a=Edit&Id="+$Usuario->Id+"; }, 100);</script>';
                } else {
                    header('Location:Index.php?c=mant_usuarios&a=Index');
                }

            } else {

                $Message = $this->model->Create($Usuario);

                if ($Message != "1") {
                    echo '<script>alert("' . $Message . '"); setTimeout(function(){ window.location.href = "../Index.php"; }, 100);</script>';
                } else {
                    header('Location:Index.php?c=mant_usuarios&a=Index');
                }
            }

        } else {
            header('Location:Index.php?c=mant_usuarios&a=Edit');
        }
    }
}