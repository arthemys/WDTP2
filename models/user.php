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
    session_start();

    require(CONNEX_DIR);
    foreach($login as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "SELECT * FROM USERWDTP2 WHERE username = '$username'";

    $result = mysqli_query($con, $sql);

    //2 compter == 1
    $count = mysqli_num_rows($result);
    if($count===1){
    //3 verifier le mot de passe
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $dbpassword = $user['password'];
        if($password === $dbpassword){
    //    if(password_verify($password, $dbpassword)){
        // 4 creer la session
        header("Location: index.php");
        }
        else{
            return "Mauvais mot de passe";
        }   
    }
    else{
        return "Vérifier votre nom d'utilisateur";
    }

}









function user_model_insert($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO user (name, email, birthday, username, password, userCityId) VALUES ('$name','$email','$birthday','$username','$password','$userCityId')";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function user_model_view($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "SELECT * FROM user WHERE userId = '$id'";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($result);
    mysqli_close($con);
    return $result;
}

function user_model_edit($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "UPDATE user SET name = '$name', email = '$email', birthday = '$birthday', userCityId = '$userCityId' WHERE userId = '$userId'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}
function user_model_delete($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "DELETE FROM user WHERE userId = '$userId'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

?>