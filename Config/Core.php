<?php

//CONFIGURACIONES DE LA APLICACION

define("RUTA_TURNO_ARCHIVO",  "files/");
define ("NOMBRE_APLICATION", "OneTime");
define ("VERSION", "v3");
define ("DEBUG", true);

global $PathString;

$Chars = count_chars($_SERVER['PHP_SELF']); 

foreach ($Chars as $Char=>$nChars){ 
  //var_dump($nChars);
   if ($Char==47) {$n=$nChars;break;} 
} 

if ($n==0) $PathString=""; else $PathString=str_pad("",($n-2)*3,"../");


function GetRouteView($Controller = null, $View = null){

    if (file_exists('View/'.$Controller.'/'.$View.'.php')) {

        require_once('View/'.$Controller.'/'.$View.'.php');

    }else{
        echo "No se ha encontrado la ruta parametrizada: View/".$Controller."/".$View.".php<br>";
    }
}



