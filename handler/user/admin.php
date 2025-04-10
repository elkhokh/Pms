<?php
session_start();

include_once "../../core/validations.php";
include_once "../../core/functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = trim($_POST['password']);
    
    $error = valid_login($email, $password);

    if (!empty($error)) 
    {
        set_messages('danger', $error);
        header("Location: ../../login_admin.php");
        exit;
    }

    if (login_admin( $email, $password)) 
    {
        set_messages('success', "WELLCOME ADMIN ^_^");
        header("Location: ../../control_admin.php");
        exit;
    } else {
        set_messages('danger', "YOU NOT ADMIN ^-^");
        header("Location: ../../login_admin.php"); 
        exit;
    }
}