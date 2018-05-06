<?php

class Mant_EstatusTurnos
{
    private $pdo;

    public $Id;
    public $Estatus;
    public $Descripcion;
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

                $stm = $this->pdo->prepare("SELECT * FROM tbl_estatus_turnos");
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
                ->prepare("SELECT *  FROM tbl_estatus_turnos WHERE Id = ?");


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
            $sql = "UPDATE tbl_estatus_turnos SET
						Estatus  = ?,
                        Descripcion  = ?,
						ModificadoPorUsuarioID = ?,
						FechaModificacion = ?,
						Activo = ?
				    WHERE Id = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Estatus,
                        $data->Descripcion,
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

   public function Create (Mant_EstatusTurnos $data)
    {
        try
        {
            $sql = "INSERT INTO tbl_estatus_turnos (Estatus,Descripcion,CreadoPorUsuarioID,FechaCreacion,Activo)
		        VALUES (?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Estatus,
                        $data->Descripcion,
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