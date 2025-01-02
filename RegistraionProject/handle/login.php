<?php 
require_once "../include/conn.php" ;
session_start();

if(isset($_POST['login'])){
    //extract
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    // check email
    $query = "select id,userName,password from users where email='$email'" ;
    $runQuery = mysqli_query($conn , $query);
    if(mysqli_num_rows($runQuery) == 1){
        $userData = mysqli_fetch_assoc($runQuery) ;
        $hashedPassword = $userData['password'];
        $is_verify = password_verify($password , $hashedPassword) ;
        if($is_verify){
            $user_id = $userData['id'];
            $userName = $userData['userName'];
            $_SESSION['user_id'] = $user_id ;
            $_SESSION['userName'] = $userName ;
            header("location:../views/welcome.php") ;
            exit() ;
        }else{
            $_SESSION['errors'] = "Error In Credentials" ;
            header("location:../views/login.php");
            exit() ;
        }
    }else{
        $_SESSION['errors'] = "Error In Credentials" ;
        header("location:../views/login.php");
        exit() ;
    }
}else{
    header("location:../views/login.php");
    exit() ;
}


?>