<?php 
session_start() ;
if(isset($_SESSION['user_id'])){
    echo "Welcome ".$_SESSION['userName'] ;
}else{
    header("location:login.php");
}


?>