<?php
/************************* golbal variables*************************** */
$json_file_checkout=realpath(__DIR__ . "/../data/checkout.json");
$json_file_user=realpath(__DIR__ . "/../data/user.json");
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
        $file_name = $GLOBALS['json_file'];
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
        $file = $GLOBALS['json_file'];
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

    $hashpassowrd=password_hash($password,PASSWORD_DEFAULT);

    $data =[
        'id'=>$id , 
        'name'=>$name,
        'email'=>$email,
        'password'=>$hashpassowrd
    ];
    
        // set_data_in_json($data , $GLOBALS['json_file_user']);

    $users[] = $data;

    file_put_contents($user_file, json_encode($users, JSON_PRETTY_PRINT));

    // $_SESSION['user'] = [
    //     'name' => $name,
    //     'email' => $email
    // ];
    // return true;
        create_user_session([
            'name'=>$name,
            'email'=>$email,
        ]);
    
    return true;
}


/********************************************************************************************** */

function login_user($email,$password){
    
    // $data= get_data_from_json($GLOBALS['json_file_user']);
    // $users = is_array($data) ? $data : [];
    $file = $GLOBALS['json_file_user'];
    $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    if(!is_array($users)){
        $users = [];
    }

    foreach($users as $user){

        if($user['email']==$email && password_verify($password,$user['password'])){
            create_user_session([
                'email'=>$email,
                'name'=>$user['name']
            ]);
            return true; 
        }
    }
    return false;
}

/*********************************************************************** */










