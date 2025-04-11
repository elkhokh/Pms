<?php

session_start();
include_once "../../core/validations.php";
include_once "../../core/functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'] ;
        $email = $_POST['email_ch'];
        $phone = trim($_POST['phone']);
        $address = $_POST['address'];
        $notes = $_POST['notes'];

    $error = valid_checkout($name, $email, $phone,$address, $notes);


    if (!empty($error)) 
    {
        set_messages('danger', $error);
        header("Location: ../../checkout.php");
        exit;
    }

    if (checkout($name, $email, $phone,$address,$notes)) 
    {
        set_messages('success', "Successfully Checkout");
        header("Location: ../../index.php");
        exit;
    }
    else {
        set_messages('danger', "Failed Checkout");
        header("Location: ../../checkout.php"); 
        exit;
    }
}
