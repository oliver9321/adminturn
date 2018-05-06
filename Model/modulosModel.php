<?php

class Mant_Modulos
{
    private $pdo;

    public $Id;
    public $Codigo;
    public $Nombre;
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

                $stm = $this->pdo->prepare("SELECT * FROM tbl_modulos_aplicacion");
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
                ->prepare("SELECT *  FROM tbl_modulos_aplicacion WHERE Id = ?");


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
            $sql = "UPDATE tbl_modulos_aplicacion SET
						Codigo  = ?,
						Nombre   = ?,
                        Descripcion  = ?,
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

   public function Create(Mant_Modulos $data)
    {
        try
        {
            $sql = "INSERT INTO tbl_modulos_aplicacion (Codigo,Nombre,Descripcion,CreadoPorUsuarioID,FechaCreacion, Activo)
		        VALUES (?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
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

    public function GetListModulos()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM tbl_modulos_aplicacion WHERE Activo = 1");
            $stm->execute();


            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $Modulos = new Mant_Modulos();

                $Modulos->Id                     =  $r->Id;
                $Modulos->Codigo                 =  $r->Codigo;
                $Modulos->Nombre                 =  $r->Nombre;
                $Modulos->Descripcion            =  $r->Descripcion;

                $result[] = $Modulos;
            }


            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }


}