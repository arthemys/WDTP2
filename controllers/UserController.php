<?php

function user_controller_connect(){
    session_start();
    if(isset($_SESSION["id"])){
        header("Location: index.php");
    }
    else{
        render(VIEW_DIR.'/user/connect.php');
    }
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
    session_start();
    if(isset($_SESSION["id"])){
        header("Location: index.php");
    }
    else{
        render(VIEW_DIR.'/user/register.php');
    }
}
function user_controller_registerValidation(){
    require(MODEL_DIR.'/user.php');
    $erreur = user_model_registerValidation($_POST);
    render(VIEW_DIR.'/user/register.php', $erreur);
}

function user_controller_view(){
    session_start();
    require(MODEL_DIR.'/user.php');
    $user = $_REQUEST["id"];
    $articles = user_model_view($user);
    render(VIEW_DIR.'/user/view.php', $articles);
}

?>