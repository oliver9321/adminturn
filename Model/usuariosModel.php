<?php

class Mant_Usuarios
{
    private $pdo;

    public $Id;
    public $PerfilUsuarioID;
    public $PuestoID;
    public $Nombre;
    public $Apellido;
    public $Usuario;
    public $Password;
    public $Email;
    public $Imagen;
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

                $stm = $this->pdo->prepare("SELECT Id, Imagen, Perfil, Nombre, Apellido, Usuario, Email, Activo  FROM vw_usuarios GROUP BY Id, Imagen, Perfil, Nombre, Apellido, Usuario, Email, Activo");
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
            $stm = $this->pdo->prepare("SELECT *  FROM tbl_usuarios WHERE Id = ?");
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
            $sql = "UPDATE tbl_usuarios SET
						PerfilUsuarioID  = ?,
                        Nombre = ?,
                        Apellido = ?,
                        Usuario = ?,
                        Password = ?,
                        Email = ?,
                        Imagen = ?,
						ModificadoPorUsuarioID = ?,
						FechaModificacion = ?,
						Activo = ?
				    WHERE Id = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->PerfilUsuarioID,
                        $data->Nombre,
                        $data->Apellido,
                        $data->Usuario,
                        $data->Password,
                        $data->Email,
                        $data->Imagen,
                        (int)$data->ModificadoPorUsuarioID,
                        $data->FechaModificacion,
                        (int)$data->Activo,
                        $data->Id
                    )
                );

            $sql2 = "DELETE FROM  pv_usuarios_puestos WHERE UsuarioID = ?";
            $this->pdo->prepare($sql2)->execute(array($data->Id));

            foreach($data->PuestoID as $value){

                $sql2 = "INSERT INTO pv_usuarios_puestos (UsuarioID,PuestoID,CreadoPorUsuarioID,FechaCreacion,Activo)
		        VALUES (?,?,?,?,?)";

                $this->pdo->prepare($sql2)
                    ->execute(
                        array(
                            $data->Id,
                            $value,
                            (int)$data->CreadoPorUsuarioID,
                            $data->FechaCreacion,
                            1
                        )
                    );

            }

            return true;

        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function Create (Mant_Usuarios $data)
    {
        try
        {
            $sql = "INSERT INTO tbl_usuarios (PerfilUsuarioID,Nombre,Apellido,Usuario,Password,Email,Imagen, CreadoPorUsuarioID,FechaCreacion,Activo)
		        VALUES (?,?,?,?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->PerfilUsuarioID,
                        $data->Nombre,
                        $data->Apellido,
                        $data->Usuario,
                        $data->Password,
                        $data->Email,
                        $data->Imagen,
                        (int)$data->CreadoPorUsuarioID,
                        $data->FechaCreacion,
                        1
                    )
                );

            $LastUsuarioID = $this->pdo->lastInsertId();

            if($LastUsuarioID){

            foreach($data->PuestoID as $value){

                $sql2 = "INSERT INTO pv_usuarios_puestos (UsuarioID,PuestoID,CreadoPorUsuarioID,FechaCreacion,Activo)
		        VALUES (?,?,?,?,?)";

                $this->pdo->prepare($sql2)
                    ->execute(
                        array(
                            $LastUsuarioID,
                            $value,
                            (int)$data->CreadoPorUsuarioID,
                            $data->FechaCreacion,
                            1
                        )
                    );

            }

            }

            return true;


        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }


}