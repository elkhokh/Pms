<?php

/************************* golbal variables*************************** */
$json_file_checkout=realpath(__DIR__ . "/../data/checkout.json");
$json_file_user=realpath(__DIR__ . "/../data/user.json");
$json_file_contect_us=realpath(__DIR__ . "/../data/contect_us.json");
$json_file_product=realpath(__DIR__ . "/../data/product.json");
$json_file_cart=realpath(__DIR__ . "/../data/cart.json");
// print_r($json_file_user); exit;
/*********************************** message function ******************************************** */
function set_messages($type_of_alert,$message_of_error)
{
    $_SESSION['message']=[
        'type'=>$type_of_alert,
        'text'=>$message_of_error,
    ];
}

function show_message()
{
    if(isset($_SESSION['message'])){
        $type = $_SESSION['message']['type'];//success or danger
        $text = $_SESSION['message']['text'];// email or name etc 
        echo "<div class='alert alert-$type'>$text</div>";
        unset($_SESSION['message']);
    }   
}

/***********************************global functions ************************************ */
function create_user_session($array):void
{
    if(isset($_SESSION['user']))
    {
        unset($_SESSION['user']);
    }
        $_SESSION['user']= $array;
}
// still not use 
function get_data_from_json($file_name = '')
{
    if($file_name == '')
    {
        $file_name = $GLOBALS['json_file_crat'];
    }
    if(!file_exists($file_name))
    {
        return false;
    }
    $file =  file_exists($file_name  ) ? json_decode(file_get_contents($file_name ), true) : [];
    if(!is_array($file))
    {
        set_data_in_json([] , $file);
    }
    return $file;   
}
// still not use 
function set_data_in_json(array $data , $file = '')
{
    if(!$file)
    {
        $file = $GLOBALS['json_file_crat'];
    }
    if(!file_exists($file))
    {
        return false;
    }
    file_put_contents($file,json_encode($data,JSON_PRETTY_PRINT));
    return true;
}
/****************************** register function ******************************** */

function register_user($name,$email,$password){
    $user_file = $GLOBALS['json_file_user'];
    $users = file_exists($user_file) ? json_decode(file_get_contents($user_file), true) : [];
    if(!is_array($users)){
        $users = [];
    }
    // $data= get_data_from_json($GLOBALS['json_file_user']);
    $id = empty($users) ? 1 :  max(array_column($users,'id')) + 1 ;
    // $hashpassowrd=password_hash($password,PASSWORD_DEFAULT);
    $data =[
        'id'=>$id , 
        'name'=>$name,
        'email'=>$email,
        'password'=>password_hash($password,PASSWORD_DEFAULT)
    ];
        // set_data_in_json($data , $GLOBALS['json_file_user']);
    $users[] = $data;
    file_put_contents($user_file, json_encode($users, JSON_PRETTY_PRINT));
    $_SESSION['user'] = [
        'name' => $name,
        'email' => $email
    ];
    // return true;
        // create_user_session([
        //     'name'=>$name,
        //     'email'=>$email,
        // ]);
    return true;
}

/********************************************************************************************** */
function login_user($email,$password){
    // $data= get_data_from_json($GLOBALS['json_file_user']);
    // $users = is_array($data) ? $data : [];
    $file = $GLOBALS['json_file_user'];
    $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    if(!is_array($users))
    {
        $users = [];
    }
    foreach($users as $user)
    {
        if($user['email'] == $email && password_verify($password,$user['password'])){
            // create_user_session([
            //     'email'=>$email,
            //     'name'=>$user['name']
            // ]);
            // session_start();
            $_SESSION['user'] = [
                'name' => $user['name'],
                'email' =>  $user['email']
            ];
            // print_r( $_SESSION['user']); exit;
            return true; 
        }
    }
    return false;
}
/**********************************function of login admin *********************************** */
function login_admin($email,$password){
if($email==="admin@gmail.com"  &&  $password==="123456"){
    return true;
}
return false;
}
/************************************ fucntion of contect us********************************** */
function contect_from__user($name,$email,$message){
    $contect_file = $GLOBALS['json_file_contect_us'];
    $users = file_exists($contect_file) ? json_decode(file_get_contents($contect_file), true) : [];
    if(!is_array($users))
    {
        $users = [];
    }
    // $data= get_data_from_json($GLOBALS['json_file_user']);
    $id = empty($users) ? 1 :  max(array_column($users,'id')) + 1 ;
    $data =[
        'id'=>$id , 
        'name'=>$name,
        'email'=>$email,
        'massage'=>$message
    ];
        // set_data_in_json($data , $GLOBALS['json_file_user']);
    $users[] = $data;
    file_put_contents($contect_file, json_encode($users, JSON_PRETTY_PRINT));
    return true;
}

/************************************** function add to cart****************** */

// $products = $GLOBALS['json_file_product'];
    // $product = file_exists($products) ? json_decode(file_get_contents($products), true) : [];
function get_products()
{
    $products = $GLOBALS['json_file_product'];
    return file_exists($products) ? json_decode(file_get_contents($products), true) : [];
}
function add_to_cart($product_id, $quantity = 1) {
    //to get data from product file 
    // $products = get_data_from_json($GLOBALS['json_file_product']);
    // $product = null;
    
   $products =get_products();
     $product = null;

    foreach ($products as $value) 
    {
        if ($value['id'] == $product_id) {
            $product = $value;
            break;
        }
    }
    // if i don't have any product
    if (!$product) 
    {
        return false;
    }

    if (!isset($_SESSION['cart'])) 
    {
        $_SESSION['cart'] = [];
    }

    $found = false;
    foreach ($_SESSION['cart'] as &$item)
    {
        if ($item['id'] == $product_id) {
            $item['quantity'] += $quantity;
            $found = true;
            break;
        }
    }

    if (!$found) 
    {
        $_SESSION['cart'][] = [
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => $quantity
        ];
    }
    $cart = get_products();
    $_SESSION['cart'] = $cart;
    return true;
}
/*************************** increment the quantity of product************************ */
function update_cart_quantity($product_id, $quantity) {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $product_id) {
                $item['quantity'] = max(1, (int)$quantity);
                $cart_file = $GLOBALS['json_file_cart'];
                $cart = file_exists($cart_file) ? json_decode(file_get_contents($cart_file), true) : [];
                //  get_data_from_json($GLOBALS['json_file_cart']);
              $_SESSION['cart'] = $cart;
                return true;
            }
        }
    }
    return false;
}
/************************delete the product************************* */
function remove_from_cart($product_id) {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $product_id) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        $cart_file = $GLOBALS['json_file_cart'];
        $cart = file_exists($cart_file) ? json_decode(file_get_contents($cart_file), true) : [];
        // $cart = get_data_from_json($GLOBALS['json_file_cart']);
    $_SESSION['cart'] = $cart;
        return true;
    }
    return false;
}



































