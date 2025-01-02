<?php 
require_once "../include/conn.php" ;
session_start() ;
if(isset($_POST['Register'])){
    // extract
    $userName = htmlspecialchars(trim($_POST['userName']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirmPassword = htmlspecialchars(trim($_POST['confirmPassword']));
    //validation
    $errors = [] ;
    // userName [length 3:20 char , only letters and numbers , unique]
    if(strlen($userName)<3 ||strlen($userName)>20){
        $errors['userName'] = "UserName Length Must be 3:20 char" ;
    }elseif(!preg_match("#[0-9]+#",$userName)) {
        $errors['userName'] = "Your userName Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$userName)) {
        $errors['userName'] = "Your userName Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$userName)) {
        $errors['userName'] = "Your userName Must Contain At Least 1 Lowercase Letter!";
    }else{
        $query = "select id from Users where userName='$userName'" ;
        $runQuery = mysqli_query($conn , $query);
        if(mysqli_num_rows($runQuery) == 1){
            $errors['userName'] = "userName Already Found" ;
        }
    }
    // password
    if (strlen($password) <= 5) {
        $errors['password'] = "Your Password Must Contain At Least 5 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $errors['password'] = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $errors['password'] = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $errors['password'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
    } 
    
    
    // confirmPassword must be the same entered in password field
    if($password !== $confirmPassword){
        $errors['confirmPassword'] = "ConfirmPassword Does Not Match Password";
    }
    // email [unique]
        $query = "select id from Users where email='$email'" ;
        $runQuery = mysqli_query($conn , $query);
        if(mysqli_num_rows($runQuery) == 1){
            $errors['email'] = "Email Already Found" ;
        }
    
    // check errors
    if(empty($errors)){
        // insert
        $password = password_hash($password , PASSWORD_DEFAULT);
        $query = "insert into users(`userName`,`email`,`password`)values('$userName','$email','$password')" ;
        $runQuery = mysqli_query($conn , $query);
        if($runQuery){
            $_SESSION['success'] = "You Registered Successfully";
            header("location:../views/login.php");
        }else{
            $_SESSION['errors']['insert'] = "error while Registering";
            header("location:../views/index.php") ;
        }
    }else{
        $_SESSION['errors'] = $errors;
        $_SESSION['userName'] = $userName ;
        $_SESSION['email'] = $email ;
        header("location:../views/index.php") ;
    }


}else{
    header("location:../views/index.php");
}




?>