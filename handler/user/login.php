<?php

session_start();
include_once "../../core/validations.php";
include_once "../../core/functions.php";


if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $password=trim($_POST['password']);

$type_of_error=valid_login($email,$password);

if(!empty($type_of_error)){
// echo 'man what are you doing '; exit;

    set_messages('danger',$type_of_error);
    // header('location: ../../index.php');
    header('location: ../../login.php');
    exit;
    }
if(login_user($email,$password))
{
        // echo 'man what are you doing '; exit;

    set_messages('success',"Login successfully");
    header("location: ../../index.php");
    // echo "welldone";
    exit;
}
else {
    set_messages('danger',"fail Login try again !!");
    header("location: ../../login.php");
    exit;
    }
}