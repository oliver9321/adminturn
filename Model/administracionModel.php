<?php

class Administracion
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = Database::StartUp();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }



    public function GetTotalTurnosByUsersAndDepartaments($DepartamentID){

        $RsArray = array();
        //SELECT NombreUsuario as Usuario, count(*) Total FROM onetime.vw_administracion_turnos WHERE Estado = 'E' AND Estatus = 'F' AND DepartamentoID = ? group by Usuario
        $stm2 = $this->pdo->prepare("SELECT NombreUsuario as Usuario, count(*) Total FROM onetime.vw_administracion_turnos WHERE Estado = 'A'/* AND Estatus = 'F'*/ AND DepartamentoID = ? group by Usuario");
        $stm2->execute(array($DepartamentID));
        $RsArray["TurnosUsuarios"] = $stm2->fetchAll(PDO::FETCH_OBJ);

        $TotalTurnos =  $this->GetTotalTurnosByEstadoAndDepartamentID("null", $DepartamentID);
        foreach($TotalTurnos as $v){$TotalTurnos = $v->Total;}
        $RsArray["TotalTurnosDepartamento"] = $TotalTurnos;

        $TotalTurnosEspera =  $this->GetTotalTurnosByEstadoAndDepartamentID("E", $DepartamentID);
        foreach($TotalTurnosEspera as $v){$TotalTurnosEspera = $v->Total;}
        $RsArray["TotalTurnosEspera"] = $TotalTurnosEspera;

        $TotalTurnosEnPuesto =  $this->GetTotalTurnosByEstadoAndDepartamentID("P", $DepartamentID);
        foreach($TotalTurnosEnPuesto as $v){$TotalTurnosEnPuesto = $v->Total;}
        $RsArray["TotalTurnosEnPuesto"] = $TotalTurnosEnPuesto;

        $TotalTurnosFinalizados =  $this->GetTotalTurnosByEstadoAndDepartamentID("F", $DepartamentID);
        foreach($TotalTurnosFinalizados as $v){$TotalTurnosFinalizados = $v->Total;}
        $RsArray["TotalTurnosFinalizados"] = $TotalTurnosFinalizados;

        return $RsArray;

    }

    public function GetTotalTurnosByEstadoAndDepartamentID($Estado, $DepartamentID)
    {
        $Administracion = new Administracion();

        try
        {

            $RsArray =  $Administracion->ExecuteStoreProcedure($this->pdo, "SP_GetTotalTurnosByEstadoToday",
                array(
                    "Estado"               => $Estado,
                    "DepartamentID"        => $DepartamentID,
                    "Total"                => "?"
                ));

            return $RsArray;

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ActualizarEstadoTurnoModel($Estado, $TurnoID, $PuestoID){

        $Dashboard = new Dashboard();
        $UsuarioOnlineID = $_SESSION['DataUserOnline']['Usuario']->UsuarioID;
        $SucursalID = $_SESSION['DataUserOnline']['Usuario']->SucursalID;

        try
        {

            $RsArray =  $Dashboard->ExecuteStoreProcedure($this->pdo, "SP_ActualizarEstadoTurno",
                array(
                    "PuestoID"            => $PuestoID,
                    "TurnoID"             => $TurnoID,
                    "CreadoPorUsuarioID"  => $UsuarioOnlineID,
                    "Estado"              => $Estado,
                    "SucursalID"          => $SucursalID,
                    "Turno"               => "?"

                ));

            return $RsArray;

        } catch (Exception $e)
        {
            die($e->getMessage());
        }

    }


    public function GetListTurnosBySucursal(){

        try
        {

            $stm = $this->pdo->prepare("SELECT TurnoConcatenado, Estado,  FechaHoraSeleccion FROM onetime.vw_administracion_turnos WHERE Estado = 'E' AND SucursalID AND Activo = 1");
            $stm->execute();

            $row = $stm->fetchAll();

            $response = array();
            $response['success'] = true;
            $response['aaData'] = $row;
            return $response;

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }

    }

    function ExecuteStoreProcedure($po_db, $pv_proc, $pt_args )
    {
        if (empty($pv_proc) || empty($pt_args))
        {
            return false;
        }
        $lv_call   = "CALL `$pv_proc`(";
        $lv_select = "SELECT";
        $lv_log = "";
        foreach($pt_args as $lv_key=>$lv_value)
        {
            $lv_query = "SET @_$lv_key = '$lv_value'";
            $lv_log .= $lv_query.";\n";
            if (!$lv_result = $po_db->query($lv_query))
            {
                /* Write log */
                return false;
            }
            $lv_call   .= " @_$lv_key,";
            $lv_select .= " @_$lv_key AS $lv_key,";
        }

        $lv_call   = substr($lv_call, 0, -1).")";
        $lv_select = substr($lv_select, 0, -1);
        $lv_log .= $lv_call;

        if ($lv_result = $po_db->query($lv_call))
        {
            if($lo_result = $po_db->query($lv_select))
            {
                $lt_result = $lo_result->fetchAll(PDO::FETCH_OBJ);

                return $lt_result;
            }
            return false;
        }

        return false;
    }

}