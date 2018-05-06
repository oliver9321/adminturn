<?php

class Mant_Puestos
{
    private $pdo;

    public $Id;
    public $Codigo;
    public $Nombre;
    public $Descripcion;
    public $DepartamentoID;
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

                $stm = $this->pdo->prepare("SELECT * FROM vw_puestos_sucursales");
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
                ->prepare("SELECT *  FROM tbl_puestos WHERE Id = ?");


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
            $sql = "UPDATE tbl_puestos SET
						Codigo  = ?,
						Nombre   = ?,
                        Descripcion  = ?,
						DepartamentoID = ?,
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
                        $data->DepartamentoID,
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

    public function Create (Mant_Puestos $data)
    {
        try
        {
            $sql = "INSERT INTO tbl_puestos (DepartamentoID,Codigo,Nombre,Descripcion,CreadoPorUsuarioID,FechaCreacion,Activo)
		        VALUES (?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->DepartamentoID,
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

    public function GetListPuestos()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM vw_puestos_sucursales WHERE Activo = 1");
            $stm->execute();


            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $Puestos = new Mant_Puestos();

                $Puestos->Id             = $r->PuestoID;
                $Puestos->Nombre         = $r->Puesto." - ".$r->Departamento." - ".$r->Sucursal;
                $Puestos->Codigo         = $r->PuestoCodigo;
                $Puestos->Departamento   = $r->Departamento;
                $Puestos->Sucursal       = $r->Sucursal;
                $Puestos->Empresa        = $r->Empresa;
                $Puestos->Activo         =  (int)$r->Activo;

                $result[] = $Puestos;
            }


            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function GetListPuestosByUser($id){

        try
        {
            $stm = $this->pdo->prepare("SELECT PuestoID  FROM vw_pvt_puestos_usuarios WHERE UsuarioID = ?");
            $stm->execute(array($id));
            $ArrayPuestos = array();

            foreach($stm->fetchAll() as $value){

                $ArrayPuestos[] = $value['PuestoID'];
            }

            return $ArrayPuestos;

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}