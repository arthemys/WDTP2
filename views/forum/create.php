<!-- <?php
session_start();
?> -->
<form action="?module=forum&action=insert" method="post">
    <label>
        Titre <span><?php if(isset($data["erreurTitre"])){echo $data["erreurTitre"];} ?></span>
        <input type="text" name="titre" required>
    </label>
    <label>
        Contenu <span><?php if(isset($data["erreurArticle"])){echo $data["erreurArticle"];} ?></span>
        <textarea name="article" cols="30" rows="10" required></textarea>
    </label>
    <input type="submit" value="Envoyer">
</form>
