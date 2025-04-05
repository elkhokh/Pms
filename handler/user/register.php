<?php
session_start();

include_once "../../core/validations.php"; 
include_once "../../core/functions.php";   


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    $error = valid_register($name, $email, $password, $confirm_password);

    if (!empty($error)) 
    {
        set_messages('danger', $error);
        header("Location: ../user/register.php");
        exit;
    }

    if(register_user($name, $email, $password))
    {
        set_messages('success', "User Reqister sucessfully");
        header("Location: ../index.php");
        exit;
    }else{
        set_messages('danger',"Fail Reqister User");
        header("Location: ../user/register.php");
        exit;
    }
}