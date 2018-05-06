<?php

class Mant_Departamentos
{
    private $pdo;

    public $Id;
    public $Codigo;
    public $Nombre;
    public $Descripcion;
    public $SucursalID;
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

                $stm = $this->pdo->prepare("SELECT * FROM vw_departamentos_sucursales");
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
                ->prepare("SELECT *  FROM tbl_departamentos WHERE Id = ?");


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
            $sql = "UPDATE tbl_departamentos SET
						Codigo  = ?,
						Nombre   = ?,
                        Descripcion  = ?,
						SucursalID = ?,
						ModificadoPorUsuarioID = ?,
						FechaModificacion = ?,
						Activo = ?
				    WHERE Id = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Codigo,
                        $data->Nombre,
                        $data->Descripcion,
                        $data->SucursalID,
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

    public function Create (Mant_Departamentos $data)
    {
        try
        {
            $sql = "INSERT INTO tbl_departamentos (SucursalID,Codigo,Nombre,Descripcion,CreadoPorUsuarioID,FechaCreacion,Activo)
		        VALUES (?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->SucursalID,
                        $data->Codigo,
                        $data->Nombre,
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

    public function GetListDepartamentos()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM vw_departamentos_sucursales WHERE Activo = 1");
            $stm->execute();


            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $Departamento = new Mant_Departamentos();

                $Departamento->Id                     =  $r->Id;
                $Departamento->Codigo                 =  $r->Codigo;
                $Departamento->Nombre                 =  $r->Departamento.' - '.$r->Sucursal;
                $Departamento->Descripcion            =  $r->Descripcion;
                $Departamento->Activo                 =  (int)$r->Activo;

                $result[] = $Departamento;
            }


            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function GetListDepartamentoByBoton($BotonTurnoID){
        try
        {
            $stm = $this->pdo->prepare("SELECT DepartamentoID  FROM vw_botones_departamentos WHERE BotonTurnoID = ?");
            $stm->execute(array($BotonTurnoID));
            $ArrayDepartamentos = array();

            foreach($stm->fetchAll() as $value){

                $ArrayDepartamentos[] = $value['DepartamentoID'];
            }

            return $ArrayDepartamentos;

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

}