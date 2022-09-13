<?php

function user_controller_connect(){
    render(VIEW_DIR.'/user/connect.php');
}

function user_controller_authentification(){
    require(MODEL_DIR.'/user.php');
    $msg = user_model_authentification($_POST);
    render(VIEW_DIR.'/user/connect.php', $msg);
}

function user_controller_deconnection(){
    require(MODEL_DIR.'/user.php');
    user_model_deconnection();
}
function user_controller_register(){
    render(VIEW_DIR.'/user/register.php');
}
function user_controller_registerValidation(){
    require(MODEL_DIR.'/user.php');
    $erreur = user_model_registerValidation($_POST);
    render(VIEW_DIR.'/user/register.php', $erreur);
}


// function user_controller_index(){
//     require(MODEL_DIR.'/user.php');
//     $data = user_model_list();
//     //print_r($data);
//     render(VIEW_DIR.'/user/index.php', $data);
// }

// function user_controller_create(){
//     require(MODEL_DIR.'/city.php');
//     $data = city_model_list();
//     render(VIEW_DIR.'/user/create.php', $data);
// }

// function user_controller_insert($request){
//     require(MODEL_DIR.'/user.php');
//     user_model_insert($request);
//     //header("Location: ?module=user&action=index");
// }

// function user_controller_view($request){
//         //print_r($request);,
//     require(MODEL_DIR.'/user.php');
//     $user = user_model_view($request);
//     require(MODEL_DIR.'/city.php');
//     $city = city_model_list();
//     $data = array_merge(array('user' => $user), array('city'=> $city));
//     //print_r($data);
//     render(VIEW_DIR.'/user/view.php', $data);
// }

// function user_controller_edit($request){
//     require(MODEL_DIR.'/user.php');
//     user_model_edit($request);
//     header("Location: ?module=user&action=index");
// }

// function user_controller_delete($request){
//     require(MODEL_DIR.'/user.php');
//     user_model_delete($request);
//     header("Location: ?module=user&action=index");
// }
?>