<?php
    function forum_model_list(){
        require(CONNEX_DIR);
        $sql = "SELECT forumWDTP2.id, titre, date, userId, nom FROM forumWDTP2 INNER JOIN userWDTP2 ON userId = userWDTP2.id";
        if(mysqli_query($con, $sql)){
            $result = mysqli_query($con, $sql);
            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_close($con);
            return $result;
        }
    }
    function forum_model_insert($article){
        session_start();
        $msgErreur = [];
        if(isset($_SESSION["id"])){
            if(strlen($article["titre"]) < 5 || strlen($article["titre"]) > 100){
                $msgErreur["erreurTitre"] = "Le titre doit être entre 5 et 100 charactères";
            }
            if(strlen($article["article"]) === 0){
                $msgErreur["erreurArticle"] = "Veuillez composer un article";
            }
            elseif(strlen($article["article"]) > 1000){
                $msgErreur["erreurArticle"] = "Votre article doit avoir moins de 1000 charactères";
            }
            if(count($msgErreur) > 0){
                render(VIEW_DIR.'/forum/create.php', $msgErreur);
            }
            require(CONNEX_DIR);
            foreach($article as $key=>$value){
                $$key=mysqli_real_escape_string($con,$value);
            }
            $id = $_SESSION["id"];
            $sql = "INSERT INTO forumWDTP2 VALUES (null, '$titre','$article', current_timestamp(),'$id')";
            mysqli_query($con, $sql);
            mysqli_close($con);
            header("Location: index.php");    
        }
        else{
            render(VIEW_DIR.'/user/connect.php');
        }
    }
    function forum_model_view($id){
        require(CONNEX_DIR);
        $id = mysqli_real_escape_string($con,$id);
        $sql = "SELECT * FROM forumWDTP2 INNER JOIN userWDTP2 ON userId = userWDTP2.id WHERE forumWDTP2.id = $id";
        $result = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if(count($result) === 1){
            return $result;
        }
        else{
            header("Location: index.php");
        }
    }

    function forum_model_modify($id){
        session_start();
        require(CONNEX_DIR);
        $id = mysqli_real_escape_string($con,$id);
        $sql = "SELECT forumWDTP2.id, titre, date, article, userId, nom FROM forumWDTP2 INNER JOIN userWDTP2 ON userId = userWDTP2.id WHERE forumWDTP2.id = $id";
        $result = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if($_SESSION["id"] === $result[0]["userId"]){
            return $result;
        }
        else{
            header("Location: index.php");
        }
    }

    function forum_model_modifyArticle($article){
        session_start();
        require(CONNEX_DIR);
        print_r($article);
        foreach($article as $key=>$value){
            $$key=mysqli_real_escape_string($con,$value);
        }
        if($_SESSION["id"]===$userId){
            $sql = "UPDATE forumWDTP2 SET titre = '$titre', article = '$article' WHERE id = $id";
            mysqli_query($con, $sql);
            header("Location: index.php");
        }
        else{
            header("Location: index.php");
        }
    }
    function forum_model_delete($id){
        session_start();
        require(CONNEX_DIR);
        $id = mysqli_real_escape_string($con,$id);
        $sql = "SELECT * FROM forumWDTP2 where id = $id";
        $result = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if($result[0]["userId"] === $_SESSION["id"]){
            $delete = "DELETE FROM forumWDTP2 WHERE id = '$id'";
            mysqli_query($con, $delete);
            header("Location: index.php");
        }
        else{
            header("Location: index.php");
        }
    }
?>