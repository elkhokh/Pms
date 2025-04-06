<?php
// session_start();

// include_once "../../core/validations.php"; 
// include_once "../../core/functions.php";   


 
    // $name = isset($_POST['name']) ? $_POST['name'] : '';
    // $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
    // $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    // $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $password = trim($_POST['password']);
//     $password_confirm = trim($_POST['password_confirm']);

//     $error = valid_register($name, $email, $password, $password_confirm);

//     if (!empty($error)) 
//     {
//         set_messages('danger', $error);
//         header("Location: ../user/register.php");
//         exit;
//     }

//     if(register_user($name, $email, $password))
//     {
//         set_messages('success', "User Reqister sucessfully");
//         header("Location: ../index.php");
//         exit;
//     }else{
//         set_messages('danger',"Fail Reqister User");
//         header("Location: ../user/register.php");
//         exit;
//     }
// }



session_start();
include_once "../../core/validations.php";
include_once "../../core/functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
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

    if (register_user($name, $email, $hashed_password)) 
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