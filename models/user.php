<?php

function user_model_list(){
    require(CONNEX_DIR);
    $sql = "SELECT 'id', 'nom' FROM userWDTP2";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($con);
    return $result;
}

function user_model_authentification($login){
    require(CONNEX_DIR);
    $erreurUsername = ["erreur" => "Vérifier votre nom d'utilisateur"];
    $erreurPassword = ["erreur" => "Mauvais mot de passe"];

    foreach($login as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "SELECT * FROM userWDTP2 WHERE username = '$username'";
    $result = mysqli_query($con, $sql);

    //2 compter == 1
    $count = mysqli_num_rows($result);
    if($count===1){
    //3 verifier le mot de passe
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $dbpassword = $user['password'];
        if(password_verify($password, $dbpassword)){
        // 4 creer la session
            user_model_session($user);
            header("Location: index.php");
        }
        else{
            $erreur = array_merge($login, $erreurPassword);
            return $erreur;
        }   
    }
    else{
        return $erreurUsername;
    }

}

function user_model_deconnection(){
    session_start();
    session_destroy();
    header("Location: index.php");

    
}

function user_model_session($user){
    session_start();
    $_SESSION['nom'] = $user['nom'];
    $_SESSION['id'] = $user['id'];
    $_SESSION['fingerPrint'] =md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']);
}

function user_model_registerValidation($user){
    require(CONNEX_DIR);
    $erreur = false;
    $msgErreur = [];
    foreach($user as $key=>$value){
        if($key == 'nom' && (strlen($value)<2 || strlen($value)>20 )){
            $msgErreur['erreurNom']= "Le nom doit etre entre 2 et 25 charactères";
            $erreur = true;
        }elseif($key == 'username'){
            $value = mysqli_real_escape_string($con,$value); 
            $sql = "SELECT * FROM userWDTP2 WHERE username = '$value'";
            $result = mysqli_query($con, $sql);
            $count = mysqli_num_rows($result);
            if($count > 0){
                $msgErreur["erreurUsername"] = "Il y a déjà un utilisateur avec ce courriel";
                $erreur = true;
            }

            if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
                $msgErreur["erreurUsername"]= "username doit etre un courriel valide";
                $erreur = true;
            }
        }elseif($key == 'password' && (strlen($value)<6 || strlen($value)>20 )){
            $msgErreur["erreurPassword"]= "Le mot de passe doit etre entre 6 et 20 charactères";
            $erreur = true;
        }elseif($key == 'dateNaissance'){
            $date = date_create_from_format("Y-m-d", $value);
            if(!$date){
                $msgErreur["erreurDateNaissance"]= "Veuillez entrer une date de naissance";
                $erreur = true;
            }
        }
    }
    if($erreur){
        $user = array_merge($user, $msgErreur);
        return $user;
    }
    else{
        user_model_insert($user);
        user_model_authentification($user);
    }
}

function user_model_insert($user){
    require(CONNEX_DIR);
    foreach($user as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO userWDTP2 VALUES (null, '$username','$password','$nom','$dateNaissance')";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function user_model_view($id){
    require(CONNEX_DIR);
    $id = mysqli_real_escape_string($con,$id);
    $sql = "SELECT forumWDTP2.id, titre, date, userId, nom FROM forumWDTP2 INNER JOIN userWDTP2 ON userId = userWDTP2.id WHERE userWDTP2.id = $id";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if(count($result) !==0){
        return $result;
    }
    else{
        header("Location: index.php");
    }
}
?>