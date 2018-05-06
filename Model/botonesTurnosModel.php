<?php

class Mant_BotonesTurnos
{
    private $pdo;

    public $Id;
    public $Nombre;
    public $Icono;
    public $Color;
    public $TextoGraMostrar;
    public $TextoPeqMostrar;
    public $ValorBoton;
    public $TipoBoton;
    public $Logo;
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

                $stm = $this->pdo->prepare("SELECT * FROM tbl_botones_turnos");
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
                ->prepare("SELECT *  FROM tbl_botones_turnos WHERE Id = ?");


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
            $sql = "UPDATE tbl_botones_turnos SET
						Nombre  = ?,
                        Icono  = ?,
                        Color  = ?,
                        TextoGraMostrar  = ?,
                        TextoPeqMostrar  = ?,
                        ValorBoton  = ?,
                        TipoBoton  = ?,
                        Logo = ?,
						ModificadoPorUsuarioID = ?,
						FechaModificacion = ?,
						Activo = ?
				    WHERE Id = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Nombre,
                        $data->Icono,
                        $data->Color,
                        $data->TextoGraMostrar,
                        $data->TextoPeqMostrar,
                        $data->ValorBoton,
                        $data->TipoBoton,
                        $data->Logo,
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

    public function Create (Mant_BotonesTurnos $data)
    {
        try
        {
            $sql = "INSERT INTO onetime.tbl_botones_turnos(Nombre,Icono,Color,TextoGraMostrar,TextoPeqMostrar,ValorBoton,TipoBoton,Logo,CreadoPorUsuarioID,FechaCreacion,Activo)
		        VALUES (?,?,?,?,?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Nombre,
                        $data->Icono,
                        $data->Color,
                        $data->TextoGraMostrar,
                        $data->TextoPeqMostrar,
                        $data->ValorBoton,
                        $data->TipoBoton,
                        $data->Logo,
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

    public function GetListBotones()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM tbl_botones_turnos WHERE Activo = 1");
            $stm->execute();


            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $Botones = new Mant_BotonesTurnos();

                $Botones->Id              = $r->Id;
                $Botones->Nombre          = $r->Nombre." - ".$r->TipoBoton;
                $Botones->ValorBoton      = $r->ValorBoton;

                $result[] = $Botones;
            }


            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }


}