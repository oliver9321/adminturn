<?php
require_once 'Config/Core.php';
require_once 'Model/administracionModel.php';
require_once 'Model/departamentosModel.php';

class AdministracionController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Administracion();
    }

    public function Index(){

        if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {

         $Departamento = new Mant_Departamentos();
         $Departamentos = $Departamento->GetListDepartamentos();


        GetRouteView(null, "header");
        require_once 'View/Administracion/Index.php';
        GetRouteView(null, "footer");

        }else{
            header('Location:Index.php?c=login&a=Index');
        }
    }


    public function GetTotalTurnosByUsers(){

        if(isset($_POST)) {

            $DepartamentID = $_POST['DepartamentID'];

            if($DepartamentID){
                echo json_encode($this->model->GetTotalTurnosByUsersAndDepartaments($DepartamentID), true);
            }
        }
    }


}