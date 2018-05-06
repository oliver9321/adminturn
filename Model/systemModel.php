<?php

class System
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function SaveLogSystem ($Action, $Descripcion, $IDAfectado = null, $UsuarioID)
    {

        try
        {
            $sql = "INSERT INTO tbl_log_administracion_turnos (Accion,Descripcion,IDAfectado,UsuarioID,FechaHora) VALUES (?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $Action,
                        $Descripcion,
                        $IDAfectado,
                        $UsuarioID,
                        date('Y-m-d')
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}