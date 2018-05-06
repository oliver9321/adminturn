<?php
global $PathString;

$Chars = count_chars($_SERVER['PHP_SELF']); 

foreach ($Chars as $Char=>$nChars){ 
  //var_dump($nChars);
   if ($Char==47) {$n=$nChars;break;} 
} 

if ($n==0) $PathString=""; else $PathString=str_pad("",($n-3)*3,"../");

set_time_limit(0);

while (true) {

    $last_ajax_call = isset($_GET['timestamp']) ? (int)$_GET['timestamp'] : null;
  //  $RutaArchivo = $PathString.$_GET['RutaArchivo'];
     $RutaArchivo = "../".$_GET['RutaArchivo'];

    clearstatcache();
    $last_change_in_data_file = filemtime($RutaArchivo);

    if ($last_ajax_call == null || $last_change_in_data_file > $last_ajax_call) {

        // get content of data.txt
        $data = file_get_contents($RutaArchivo);
        $recoveredArray = unserialize($data);
        $recoveredArray['timestamp'] = $last_change_in_data_file;

        $json = json_encode($recoveredArray);
        echo $json;

        break;

    } else {
        sleep(1);
        continue;
    }
}
