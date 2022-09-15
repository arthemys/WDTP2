<?php

function forum_controller_view(){
    require(MODEL_DIR.'/forum.php');
    $articleId = $_REQUEST["id"];
    $article = forum_model_view($articleId);
    render(VIEW_DIR.'/forum/article.php', $article);
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

function forum_controller_modify(){
    require(MODEL_DIR.'/forum.php');
    $article = $_REQUEST["id"];
    $articleAModifier = forum_model_modify($article);
    render(VIEW_DIR.'/forum/create.php',$articleAModifier);
}
function forum_controller_modifyArticle(){
    require(MODEL_DIR.'/forum.php');
    forum_model_modifyArticle($_POST);
}
?>