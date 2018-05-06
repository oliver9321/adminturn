<?php

class Mant_Marquesina
{
    private $pdo;

    public $Id;
    public $TextoMostrar;
    public $HoraInicial;
    public $FechaInicial;
    public $HoraFinal;
    public $FechaFinal;
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

                $stm = $this->pdo->prepare("SELECT a.Id, a.TextoMostrar, a.DepartamentoID, CONCAT(b.Departamento,' - ',b.Sucursal) AS Departamento, CONCAT(a.HoraInicial, ' ',a.FechaInicial) AS 'Hora-Fecha-inicial', CONCAT(a.HoraFinal,' ',a.FechaFinal) AS 'Hora-Fecha-Final', a.CreadoPorUsuarioID, a.FechaCreacion, a.FechaCreacion, a.ModificadoPorUsuarioID, a.FechaModificacion, a.Activo FROM onetime.tbl_marquesina_pantalla as a  INNER JOIN onetime.vw_departamentos_sucursales as b ON (a.DepartamentoID = b.Id)");
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
                ->prepare("SELECT  Id,DepartamentoID,TextoMostrar,HoraInicial, DATE_FORMAT(FechaInicial, '%m/%d/%Y') FechaInicial,HoraFinal, DATE_FORMAT(FechaFinal, '%m/%d/%Y') FechaFinal,CreadoPorUsuarioID,FechaCreacion,ModificadoPorUsuarioID,FechaModificacion,Activo FROM tbl_marquesina_pantalla WHERE Id = ?");
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
            $sql = "UPDATE tbl_marquesina_pantalla SET
						DepartamentoID  = ?,
						TextoMostrar   = ?,
                        HoraInicial  = ?,
						FechaInicial = ?,
						HoraFinal = ?,
						FechaFinal = ?,
						ModificadoPorUsuarioID = ?,
						FechaModificacion = ?,
						Activo = ?
				    WHERE Id = ?";

            $FechaInicial = date_create($data->FechaInicial);
            $FechaInicial =  date_format($FechaInicial,"Y-m-d");

            $FechaFinal = date_create($data->FechaFinal);
            $FechaFinal =  date_format($FechaFinal,"Y-m-d");

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->DepartamentoID,
                        $data->TextoMostrar,
                        $data->HoraInicial,
                        $FechaInicial,
                        $data->HoraFinal,
                        $FechaFinal,
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

    public function Create (Mant_Marquesina $data)
    {
        try
        {
            $sql = "INSERT INTO tbl_marquesina_pantalla (DepartamentoID,TextoMostrar,HoraInicial,HoraFinal,FechaInicial,FechaFinal,CreadoPorUsuarioID,FechaCreacion,Activo)
		        VALUES (?,?,?,?,?,?,?,?,?)";

            $FechaInicial = date_create($data->FechaInicial);
            $FechaInicial =  date_format($FechaInicial,"Y-m-d");

            $FechaFinal = date_create($data->FechaFinal);
            $FechaFinal =  date_format($FechaFinal,"Y-m-d");


            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->DepartamentoID,
                        $data->TextoMostrar,
                        $data->HoraInicial,
                        $FechaInicial,
                        $data->HoraFinal,
                        $FechaFinal,
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

    public function GetListMarquesina($HoraFinal)
    {

        try
        {
            $result = array();

            $FechaFinal = date('Y-m-d');
            $DepartamentoID = $_SESSION['DataUserOnline']['Usuario']->DepartamentoID;

            $stm = $this->pdo->prepare("SELECT a.Id, a.TextoMostrar FROM onetime.tbl_marquesina_pantalla as a  INNER JOIN onetime.vw_departamentos_sucursales as b ON (a.DepartamentoID = b.Id) WHERE a.Activo = 1 AND FechaFinal <= ? AND HoraFinal <= ? AND a.DepartamentoID = ?");
            $stm->execute(array($FechaFinal, $HoraFinal, $DepartamentoID));

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $result[] = $r->TextoMostrar;
            }


            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }


}