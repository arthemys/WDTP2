<?php

function forum_controller_view(){
    // require(MODEL_DIR.'/user.php');
    // $msg = user_model_authentification($_POST);
    // render(VIEW_DIR.'/user/connect.php', $msg);
}
function forum_controller_create(){
    session_start();
    if(isset($_SESSION["id"])){
        render(VIEW_DIR.'/forum/create.php');
    }
    else{
        render(VIEW_DIR.'/user/connect.php');
    }
}

function forum_controller_insert(){
    require(MODEL_DIR.'/forum.php');
    forum_model_insert($_POST);
}

?>