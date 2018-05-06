<?php

require_once 'Config/Core.php';
require_once 'Model/botonesTurnosModel.php';


class Mant_botones_turnosController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Mant_BotonesTurnos();
    }

    public function Index(){
        if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {

        GetRouteView(null, "header");
        require_once 'View/mant_turnos/mant_botones_turnos/Index.php';
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

                    if(isset($_REQUEST['Id'])){
                        $this->model = $this->model->Edit($_REQUEST['Id']);
                    }

                    GetRouteView(null, "header");
                    require_once 'View/mant_turnos/mant_botones_turnos/edit.php';
                    GetRouteView(null, "footer");
                }else{
                    header('Location:Index.php?c=login&a=Index');
                }
    }

    public function Save(){

        $this->model->Id              = $_REQUEST['Id'];
        $this->model->Nombre          = $_REQUEST['Nombre'];
        $this->model->Icono           = $_REQUEST['Icono'];
        $this->model->Activo          = $_REQUEST['Activo'];
        $this->model->Color           = $_REQUEST['Color'];
        $this->model->TextoPeqMostrar = $_REQUEST['TextoPeqMostrar'];
        $this->model->TextoGraMostrar = $_REQUEST['TextoGraMostrar'];
        $this->model->ValorBoton      = $_REQUEST['ValorBoton'];
        $this->model->TipoBoton       = $_REQUEST['TipoBoton'];
        $this->model->FechaModificacion      = date('Y-m-d');
        $this->model->FechaCreacion          = date('Y-m-d');
        $this->model->ModificadoPorUsuarioID =  $_SESSION['DataUserOnline']['Usuario']->UsuarioID;
        $this->model->CreadoPorUsuarioID     =  $_SESSION['DataUserOnline']['Usuario']->UsuarioID;

        if( !empty($_FILES['Logo']['name']) ){
            $foto = date('ymdhis') . '-' . strtolower($_FILES['Logo']['name']);
            move_uploaded_file ($_FILES['Logo']['tmp_name'], 'uploads/' . $foto);
            $this->model->Logo = $foto;
        }else{
            $this->model->Logo = $_REQUEST['Logo'];
        }

        $this->model->Id > 0
            ? $this->model->Update($this->model)
            : $this->model->Create($this->model);

        header('Location:?c=mant_botones_turnos&a=Index');
    }

    public function GetListBotones(){


    }

}