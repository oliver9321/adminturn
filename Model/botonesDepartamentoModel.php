<?php

class Mant_BotonesDepartamento
{
    private $pdo;

    public $Id;
    public $BotonTurnoID;
    public $DepartamentoID;
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

                $stm = $this->pdo->prepare("SELECT * FROM vw_botones_departamentos");
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
                ->prepare("SELECT *  FROM pv_botones_turnos_departamentos WHERE BotonTurnoID = ?");


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

            $sql2 = "DELETE FROM  pv_botones_turnos_departamentos WHERE BotonTurnoID = ?";
            $this->pdo->prepare($sql2)->execute(array($data->BotonTurnoID));

            foreach($data->DepartamentoID as $value){

                $sql2 = "INSERT INTO onetime.pv_botones_turnos_departamentos(BotonTurnoID,DepartamentoID, CreadoPorUsuarioID,FechaCreacion,Activo)
		        VALUES (?,?,?,?,?)";

                $this->pdo->prepare($sql2)
                    ->execute(
                        array(
                            $data->BotonTurnoID,
                            $value,
                            (int)$data->CreadoPorUsuarioID,
                            date('Y-m-d'),
                            1
                        )
                    );

            }
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Create (Mant_BotonesDepartamento $data)
    {
        try
        {
            foreach($data->DepartamentoID as $value){

                $sql2 = "INSERT INTO onetime.pv_botones_turnos_departamentos(BotonTurnoID,DepartamentoID, CreadoPorUsuarioID,FechaCreacion,Activo)
		        VALUES (?,?,?,?,?)";

                $this->pdo->prepare($sql2)
                    ->execute(
                        array(
                            $data->BotonTurnoID,
                            $value,
                            (int)$data->CreadoPorUsuarioID,
                            date('Y-m-d'),
                            1
                        )
                    );

            }


        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
/*
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
*/

}