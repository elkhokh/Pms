<?php

// session_start();
include_once "../../core/validations.php";
include_once "../../core/functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'] ;
        $email = $_POST['email'];
        $message = $_POST['message'];

    $error = valid_contect_us($name, $email, $message);


    if (!empty($error)) 
    {
        set_messages('danger', $error);
        header("Location: ../../contact.php");
        // print_r(header("Location: ../../register.php"));
        exit;
    }

    if (contect_from__user($name, $email, $message)) 
    {
        set_messages('success', "YOur Comment Add Successfull");
        header("Location: ../../index.php");
    //   print_r(  header("Location: ../../index.php")); 
        exit;
    } else {
        set_messages('danger', "Failed Add Your Comment");
        header("Location: ../../contact.php"); 
    //    print_r(header("Location: ../../register.php")); 
        exit;
    }
}