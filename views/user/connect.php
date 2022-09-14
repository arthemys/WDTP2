<span><?php if(isset($data)){echo $data["erreur"];} ?></span>
<form action="?module=user&action=authentification" method="post">
    <label>Username
        <input type="text" name="username" value="<?php if(isset($data["username"])){echo $data["username"];} ?>">
    </label>
    <label>Mot de passe
        <input type="password" name="password">
    </label>
    <input type="submit" value="Login">
</form>