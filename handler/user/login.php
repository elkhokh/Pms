<?php

session_start();
include_once "../../core/validations.php";
include_once "../../core/functions.php";


if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $password=trim($_POST['password']);

$type_of_error=valid_login($email,$password);

if(is_array($type_of_error)){
    
if(login_user($email,$password)){
    set_messages('success',"Login successfully");
    header("location: ../../index.php");
    // echo "welldone";
    exit;
}}
if(!empty($type_of_error)){
set_messages('danger',$type_of_error);
header('location: ../../index.php');
exit;
}

else {
    set_messages('danger',"fail Login try again !!");
    header("location: ../../login.php");
    exit;
}
}