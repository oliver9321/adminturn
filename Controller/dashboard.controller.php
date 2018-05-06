<?php
require_once 'Config/Core.php';
require_once 'Model/dashboardModel.php';
require_once 'Model/puestosModel.php';
require_once 'Model/systemModel.php';

class dashboardController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new dashboard();
    }

    public function Index(){



         if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador" || $_SESSION['DataUserOnline']['Usuario']->Perfil == "Oficial"  || $_SESSION['DataUserOnline']['Usuario']->Perfil == "Analista") {

             $Puesto = new Mant_Puestos();
             $Puestos = $Puesto->GetListPuestos();

             GetRouteView(null, "header");
             require_once 'View/dashboard/Index.php';
             GetRouteView(null, "footer");


         }else{header('Location:Index.php?c=login&a=Index');}
    }

    public function Minipopup(){

      // GetRouteView(null, "header");
        GetRouteView("dashboard", "minipopup");
    // GetRouteView(null, "footer");
    }

    public function GenerarLlamadaTurnoController(){

        if(isset($_POST) && $_POST['Action'] == "GenerarLlamadaTurno"){

                $JsonReturn = $this->model->GenerarLlamadaTurnoModel();
                $Puesto = $_POST['Puesto'];
                $DepartamentoID = $_SESSION['DataUserOnline']['Usuario']->DepartamentoID;
                $DiaHoy = getdate();
                $DiaHoy = $DiaHoy['mday'];

                if(count($JsonReturn) > 0){

                    if (file_exists($_SESSION['$RutaTurnos_File'])) {

                        $fp = fopen($_SESSION['$RutaTurnos_File'], 'w');
                        $DataTurno = array("PuestoID"=>$JsonReturn[0]->InPuestoID,"Turno"=>$JsonReturn[0]->Turno,"Sucursal"=>$JsonReturn[0]->InSucursalID, "Estado"=>"L", "Puesto"=>$Puesto, "DepartamentoID"=>$DepartamentoID, "DiaSeleccion"=>$DiaHoy);
                        fwrite($fp,serialize($DataTurno));

                    }else{

                       $fp =  fopen($_SESSION['$RutaTurnos_File'],"wb");
                       $DataTurno =array("PuestoID"=>$JsonReturn[0]->InPuestoID,"Turno"=>$JsonReturn[0]->Turno,"Sucursal"=>$JsonReturn[0]->InSucursalID, "Estado"=>"L","Puesto"=>$Puesto,"DepartamentoID"=>$DepartamentoID,"DiaSeleccion"=>$DiaHoy);
                       fwrite($fp,serialize($DataTurno));
                    }

                    echo  json_encode($JsonReturn, true);

                }else{
                    echo json_encode("false", true);
                }

            }else{
                echo json_encode("false", true);
            }

        }


    public function ActualizarPlayListYoutube(){

        if(isset($_POST) && $_POST['Action'] == "ActualizarPlayListYoutube"){

            $Opcion = $_POST['Opcion'];
            $PlayListYoutube = $_POST['PlayListYoutube'];

            echo json_encode( $this->model->ActualizarPlayListYoutube($PlayListYoutube, $Opcion), true);

        }

    }


    public function GetLastTurnByPuestoController(){

        if(isset($_POST) && $_POST['Action'] == "GetLastTurno"){

            $PuestoID = $_POST['PuestoID'];

            echo json_encode($this->model->GetLastTurnByPuestoModel($PuestoID), true);

        }else{
            echo json_encode("false", true);
        }

    }

    public function ActualizarEstadoTurnoController(){

        if(isset($_POST) && $_POST['Action'] == "ActualizarEstadoTurno"){

            $DepartamentoID = $_SESSION['DataUserOnline']['Usuario']->DepartamentoID;

            $Estado       = $_POST['Estado'];
            $PuestoID     = $_POST['PuestoID'];
            $TurnoID      = $_POST['TurnoID'];
            $SucursalID   = $_POST['SucursalID'];
            $Turno        = $_POST['Turno'];
            $Puesto       = $_POST['Puesto'];
            $Comentario   = $_POST['Comentario'];


            echo json_encode($this->model->ActualizarEstadoTurnoModel($Estado, $TurnoID, $PuestoID, $Comentario), true);

            if (file_exists($_SESSION['$RutaTurnos_File'])) {

                $fp = fopen($_SESSION['$RutaTurnos_File'], 'w');
                $DataTurno = array("PuestoID"=>$PuestoID,"Turno"=>$TurnoID,"Sucursal"=>$SucursalID, "Estado"=> $Estado, "Turno"=>$Turno, "Puesto"=>$Puesto, "DepartamentoID"=>$DepartamentoID);
                fwrite($fp,serialize($DataTurno));

            }else{

                $fp =  fopen($_SESSION['$RutaTurnos_File'],"wb");
                $DataTurno = array("PuestoID"=>$PuestoID,"Turno"=>$TurnoID,"Sucursal"=>$SucursalID, "Estado"=> $Estado, "Turno"=>$Turno, "Puesto"=>$Puesto, "DepartamentoID"=>$DepartamentoID);
                fwrite($fp,serialize($DataTurno));
            }

        }else{
            echo json_encode("false", true);
        }

    }

    public function GetListTurnosBySucursal(){

        echo json_encode($this->model->GetListTurnosBySucursal(), true);
    }

    public function GetListTurnosAnulados(){

        echo json_encode($this->model->GetListTurnosAnulados(), true);
    }

    public function CambiarModoLlamadaPuesto(){

        if(isset($_POST) && $_POST['Action'] == "CambiarModoLlamadaPuesto"){

            $Departamento  = $_POST['Departamento'];
            $PuestoID     = $_POST['PuestoID'];
            $Opcion      = $_POST['Opcion'];

            echo json_encode( $this->model->CambiarModoLlamadaPuesto($Opcion, $PuestoID, $Departamento), true);

        }

    }


    public function ActivarModoDesarrollador(){

    if(isset($_POST) && $_POST['Action'] == "ActivarModoDesarrollador"){

        $Opcion = $_POST['Opcion'];

        echo json_encode( $this->model->ActivarModoDesarrollador($Opcion), true);

    }
}


    public function TransferirTurnoPuesto(){

        if(isset($_POST) && $_POST['Action'] == "TransferirTurnoPuesto"){

            $PuestoIDTransferir = $_POST['PuestoIDTransferir'];
            $ComentarioTransferir = $_POST['ComentarioTransferir'];
            $TurnoID = $_POST['TurnoID'];

            echo json_encode( $this->model->TransferirTurnoPuesto($PuestoIDTransferir, $ComentarioTransferir, $TurnoID), true);

        }

    }


    public function ActivarTurnoAnulado(){

        if(isset($_POST) && $_POST['Action'] == "ActivarTurnoAnulado"){

            $TurnoID  = $_POST['TurnoID'];

            echo json_encode( $this->model->ActivarTurnoAnulado($TurnoID), true);

        }

    }

}