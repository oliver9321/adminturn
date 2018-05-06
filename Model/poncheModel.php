<?php

/**
 * Created by PhpStorm.
 * User: HPs
 * Date: 24/5/17
 * Time: 11:11 PM
 */
class Ponche
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

    public function ListarBotones()
    {
        try
        {

            $DepartamentoID = $_SESSION['DataUserOnline']['Usuario']->DepartamentoID;
            $stm = $this->pdo->prepare("SELECT * FROM vw_botones_departamentos WHERE DepartamentoID = ?");
            $stm->execute(array($DepartamentoID));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function GetNexTurn($BotonId, $SucursalID)
    {
        $Ponche = new Ponche();
        $UsuarioOnlineID = $_SESSION['DataUserOnline']['Usuario']->UsuarioID;
        $DepartamentoID = $_SESSION['DataUserOnline']['Usuario']->DepartamentoID;

        try
        {

            $RsArray =  $Ponche->ExecuteStoreProcedure($this->pdo, "SP_GetNextTurn",
                array(
                    "BotonTurnoID"          => $BotonId,
                    "CreadoPorUsuarioID"    => $UsuarioOnlineID,
                    "DepartamentoID"        => $DepartamentoID,
                    "SucursalID"            => $SucursalID,
                    "Contador"              => "?"
                ));

                return $RsArray;

        } catch (Exception $e)
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