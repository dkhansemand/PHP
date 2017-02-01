<?php
header("Content-type: text/html");

$datotid = date("D d. - M - Y @ H:i:s");
$dag = date("N");

echo "<p>$datotid</p>";

function tidsberegner(){
    $timeFormat = date("H.i");

    if($timeFormat >= 8.10 && $timeFormat <= 10.00){
        $html = "Start på skole.. YIKES!";
    }else if($timeFormat >= 9.40 && $timeFormat < 10.00){
        $html = "Så er det første pause";        
    }elseif($timeFormat === 10.00 && $timeFormat <= 11.29){
        $html = "Timen er startet.. work!";
    }else if($timeFormat >= 11.30 && $timeFormat <= 11.59){
        $html = "Så er det frokost tid!";
    }else if($timeFormat >= 12.00 && $timeFormat <= 13.29){
        $html =  "Så er forkosten slut. Back to work!";
    }else if($timeFormat >= 13.30 && $timeFormat <= 13.39){
        $html =  "Eftermiddags pause";
    }else if($timeFormat >= 13.40 && $timeFormat <= 15.09){
        $html =  "Sidste pause slut. Back to work!";
    }else if($timeFormat >= 15.10){
        $html =  "Get home FFS!";
    }else if($timeFormat >= 8.10 && $timeFormat <= 15.10){
        $html =  "ARBEJD!";
    }else{
        $html =  "Burde du være her?!";
    }
    return $html;
}


switch($dag){
    case 1: echo tidsberegner(); break;
    case 2: echo tidsberegner(); break;
    case 3: echo tidsberegner(); break;
    case 4: echo tidsberegner(); break;
    case 5: echo tidsberegner(); break;
    default: echo "Weekend!"; break;
}

