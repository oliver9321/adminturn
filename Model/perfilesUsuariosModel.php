<?php

class Mant_PerfilesUsuarios
{
    private $pdo;

    public $Id;
    public $Perfil;
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

                $stm = $this->pdo->prepare("SELECT * FROM tbl_perfiles_usuarios");
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
                ->prepare("SELECT *  FROM tbl_perfiles_usuarios WHERE Id = ?");


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
            $sql = "UPDATE tbl_perfiles_usuarios SET
						Perfil  = ?,
                        Descripcion  = ?,
						ModificadoPorUsuarioID = ?,
						FechaModificacion = ?,
						Activo = ?
				    WHERE Id = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Perfil,
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

    public function Create (Mant_PerfilesUsuarios $data)
    {
        try
        {
            $sql = "INSERT INTO tbl_perfiles_usuarios (Perfil,Descripcion,CreadoPorUsuarioID,FechaCreacion,Activo)
		        VALUES (?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Perfil,
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

    public function GetListPerfilesUsuarios()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM tbl_perfiles_usuarios WHERE Activo = 1");
            $stm->execute();



            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $PerfilUsuario = new Mant_PerfilesUsuarios();

                $PerfilUsuario->Id             = $r->Id;
                $PerfilUsuario->Perfil         = $r->Perfil;
                $PerfilUsuario->Descripcion    = $r->Descripcion;
                $PerfilUsuario->Activo         =  (int)$r->Activo;

                $result[] = $PerfilUsuario;
            }


            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }


}