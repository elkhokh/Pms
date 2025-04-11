<?php

session_start();
include_once "../../core/validations.php";
include_once "../../core/functions.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'] ;
        $price = trim($_POST['price']);
        $original_price = trim($_POST['original_price']);
        $rating = $_POST['rating'];
        $image = $_POST['image'];

    $error = valid_add_product($name, $price, $original_price,$rating, $image);


    if (!empty($error)) 
    {
        set_messages('danger', $error);
        header("Location: ../../add_product.php");
        exit;
    }

    if (add_product($name, $price, $original_price,$rating,$image)) 
    {
        set_messages('success', "Porduct added Successfully ");
        header("Location: ../../index.php");
        exit;
    }
    else {
        set_messages('danger', "Porduct  Failed ");
        header("Location: ../../add_product.php"); 
        exit;
    }
}



