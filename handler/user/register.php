<?php
session_start();

include_once "../../core/validations.php";
include_once "../../core/functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'] ;
        $email = $_POST['email'];
        $password = trim($_POST['password']);
        $password_confirm = trim($_POST['password_confirm']);

    $error = valid_register($name, $email, $password, $password_confirm);


    if (!empty($error)) 
    {
        set_messages('danger', $error);
        header("Location: ../../register.php");
        // print_r(header("Location: ../../register.php"));
        exit;
    }

    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if (register_user($name, $email, $password)) 
    {
        set_messages('success', "User Registered Successfully");
        header("Location: ../../index.php");
    //   print_r(  header("Location: ../../index.php")); 
        exit;
    } else {
        set_messages('danger', "Failed to Register User");
        header("Location: ../../register.php"); 
    //    print_r(header("Location: ../../register.php")); 
        exit;
    }
}