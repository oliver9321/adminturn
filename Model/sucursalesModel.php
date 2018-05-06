<?php

class Mant_Sucursales
{
    private $pdo;

    public $Id;
    public $Codigo;
    public $SucursalID;
    public $Nombre;
    public $Descripcion;
    public $Direccion;
    public $Telefono;
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

                $stm = $this->pdo->prepare("SELECT * FROM vw_sucursales_empresa");
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
                ->prepare("SELECT *  FROM vw_sucursales_empresa WHERE Id = ?");


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
            $sql = "UPDATE tbl_sucursales SET
                        EmpresaID = ?,
						Codigo  = ?,
						Nombre   = ?,
                        Descripcion  = ?,
                        Direccion  = ?,
						Telefono = ?,
						ModificadoPorUsuarioID = ?,
						FechaModificacion = ?,
						Activo = ?
				    WHERE Id = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->EmpresaID,
                        $data->Codigo,
                        $data->Nombre,
                        $data->Descripcion,
                        $data->Direccion,
                        $data->Telefono,
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

   public function Create(Mant_Sucursales $data)
    {
        try
        {
            $sql = "INSERT INTO tbl_sucursales (EmpresaID,Codigo,Nombre,Descripcion,Direccion,Telefono,CreadoPorUsuarioID,FechaCreacion, Activo)
		        VALUES (?,?,?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->EmpresaID,
                        $data->Codigo,
                        $data->Nombre,
                        $data->Descripcion,
                        $data->Direccion,
                        $data->Telefono,
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

    public function GetListSucursales()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM vw_sucursales_empresa WHERE Activo = 1");
            $stm->execute();


            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $Sucursal = new Mant_Sucursales();

                $Sucursal->Id                     =  $r->Id;
                $Sucursal->Codigo                 =  $r->Codigo;
                $Sucursal->Nombre                 =  $r->Nombre.' - '.$r->Empresa;
                $Sucursal->Descripcion            =  $r->Descripcion;
                $Sucursal->Telefono               =  $r->Telefono;
                $Sucursal->Direccion              =  $r->Direccion;
                $Sucursal->Activo                 =  (int)$r->Activo;

                $result[] = $Sucursal;
            }


            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }


}