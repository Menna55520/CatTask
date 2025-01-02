<?php 
function operation($arr){
    $res = 0 ;
    foreach($arr as $item){
        if($item === "++") $res++;
        else $res--;
    }
    return $res ;
}

$array = ["++", "++", "--", "++"] ;
echo operation($array);


?>