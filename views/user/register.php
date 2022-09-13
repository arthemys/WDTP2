<?php if(isset($data)){
    print_r($data);
}
else{
    $erreurPassword = null;
    $erreurNom = null;
    $erreurUsername = null;
} ?>
<form action="?module=user&action=registerValidation" method="post">
    <label>
        Courriel
        <input type="email" name="username" >
    </label>
    <label>
        Mot de passe
        <input type="password" name="password"  maxlength="25" > 
    </label>
    <label>
        Nom
        <input type="text" name="nom" minlength="2" maxlength="25" >
    </label>
    <label>
        Date de naissance
        <input type="date" name="dateNaissance" >
    </label>
    <button type="submit">Enregistrer</button>
</form>