<form action="?module=user&action=registerValidation" method="post">
    <label>
        Courriel <span><?php if(isset($data["erreurUsername"])){echo $data["erreurUsername"];} ?></span>
        <input type="email" name="username" value="<?php if(isset($data["username"])){echo $data["username"];}?>">
    </label>
    <label>
        Mot de passe <span><?php if(isset($data["erreurPassword"])){echo $data["erreurPassword"];}?></span>
        <input type="password" name="password"  maxlength="25" > 
    </label>
    <label>
        Nom <span><?php if(isset($data["erreurNom"])){echo $data["erreurNom"];} ?></span>
        <input type="text" name="nom" minlength="2" maxlength="25" value="<?php if(isset($data["nom"])){echo $data["nom"];}?>">
    </label>
    <label>
        Date de naissance <span><?php if(isset($data["erreurDateNaissance"])){echo $data["erreurDateNaissance"];} ?></span>
        <input type="date" name="dateNaissance" value="<?php if(isset($data["dateNaissance"])){echo $data["dateNaissance"];}?>">
    </label>
    <button type="submit">Enregistrer</button>
</form>