<?php
require_once 'Config/Core.php';
require_once 'Model/loginModel.php';

class loginController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new login();
    }

    public function Index(){
        GetRouteView("login", "Index");
    }

    public function GetSucursalesByUser(){


    }

    public function ValidateUser(){

        if(isset($_REQUEST['Usuario']) && isset($_REQUEST['Password']) && isset($_REQUEST['PuestoID'])){

            $login = new login();

            $login->Usuario = $_REQUEST['Usuario'];
            $login->Password = $_REQUEST['Password'];
            $login->PuestoID = $_REQUEST['PuestoID'];

            $returnResponse =  $this->model->login($login);


            if($returnResponse){

                $_SESSION['DataUserOnline'] = $returnResponse;
                $Perfil = $returnResponse['Usuario']->Perfil;

                $SucursalID_File    =  $returnResponse['Usuario']->SucursalID;
                $DepartamentoID_File =  $returnResponse['Usuario']->DepartamentoID;

                $RutaTurnos_File = RUTA_TURNO_ARCHIVO.$DepartamentoID_File.".".$SucursalID_File.".txt";
                $_SESSION['$RutaTurnos_File'] = $RutaTurnos_File;

                $Puesto = $returnResponse['Usuario']->Puesto;


                switch($Perfil){

                    case "Administrador":
                        header('Location: Index.php?c=Administracion&a=Index');
                        break;

                    case "Oficial":
                        header('Location: Index.php?c=dashboard&a=Index');
                        break;

                    case "Analista":
                        header('Location: Index.php?c=dashboard&a=Index');
                        break;

                    case "Ponche":
                        header('Location: Index.php?c=ponche&a=Index');
                        break;

                    case "Pantalla":
                        header('Location: Index.php?c=pantalla&a=Index');
                        break;

                    default:
                        echo '<script>alert("Usuario invalido, No posee permisos o Clave invalida"); setTimeout(function(){ window.location.href = "Index.php?c=Login&a=Index"; }, 100);</script>';
                        break;
                }


            }else{
                echo '<script>alert("Usuario invalido, No posee permisos o Clave invalida"); setTimeout(function(){ window.location.href = "Index.php?c=Login&a=Index"; }, 100);</script>';

            }
        }else{
            echo '<script>alert("Usuario invalido, No posee permisos o Clave invalida"); setTimeout(function(){ window.location.href = "Index.php?c=Login&a=Index"; }, 100);</script>';
        }

    }

    public function Logout(){

        if(isset($_SESSION)){
            session_destroy();
        }

        header('Location: Index.php?c=login&a=Index');

    }

    public function  GetListPuestosByUser(){

        if(isset($_POST['Usuario']) && $_POST['Action'] == "GetListPuestosByUser") {
            $Usuario = $_POST['Usuario'];
            echo json_encode($this->model->GetListPuestosByUser($Usuario));
        }
    }

}