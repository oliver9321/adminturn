<?php

class Mant_PrioridadTurnosPuestos
{
    private $pdo;

    public $Id;
    public $PrioridadID;
    public $BotonTurnoID;
    public $PuestoID;
    public $FechaCreacion;
    public $CreadoPorUsuarioID;
    public $ModificadoPorUsuarioID;
    public $FechaModificacion;
    public $Activo;


    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function View()
    {
        try
        {
                $stm = $this->pdo->prepare("SELECT * FROM vw_prioridades_turnos_puesto");
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

    public function Edit($id)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT *  FROM tbl_prioridad_turnos_puestos WHERE Id = ?");


            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Update($data)
    {
        try
        {
            $sql = "UPDATE tbl_prioridad_turnos_puestos SET
						PrioridadID  = ?,
						BotonTurnoID   = ?,
                        PuestoID  = ?,
						ModificadoPorUsuarioID = ?,
						FechaModificacion = ?,
						Activo = ?
				    WHERE Id = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->PrioridadID,
                        $data->BotonTurnoID,
                        $data->PuestoID,
                        (int)$data->ModificadoPorUsuarioID,
                        $data->FechaModificacion,
                        (int)$data->Activo,
                        $data->Id
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Create (Mant_PrioridadTurnosPuestos $data)
    {
        try
        {
            $sql = "INSERT INTO tbl_prioridad_turnos_puestos (PrioridadID,BotonTurnoID,PuestoID,CreadoPorUsuarioID,FechaCreacion,Activo)
		        VALUES (?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->PrioridadID,
                        $data->BotonTurnoID,
                        $data->PuestoID,
                        (int)$data->CreadoPorUsuarioID,
                        date('Y-m-d'),
                        1
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    


}