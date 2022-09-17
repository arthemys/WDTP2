<?php if($_REQUEST["action"] ==="modify"){?>
    <form action="?module=forum&action=modifyArticle" method="post">
    <input type="hidden" name="userId" value="<?= $data[0]["userId"] ?>">
    <input type="hidden" name="id" value="<?= $data[0]["id"] ?>">
<?php }else{?>
<form action="?module=forum&action=insert" method="post">
<?php } ?>
    <label>
        Titre <span class="erreur"><?php if(isset($data["erreurTitre"])){echo $data["erreurTitre"];}?></span>
        <input type="text" name="titre" value="<?php if($_REQUEST["action"] ==="modify"){echo $data[0]["titre"]; }?>" required>
    </label>
    <label for="article">Contenu</label>
    <textarea name="article" cols="107" rows="15" required id="article"><?php if($_REQUEST["action"] ==="modify"){echo $data[0]["article"]; }?></textarea>
    <input type="submit" value=<?php if($_REQUEST["action"] ==="modify"){echo "Modifier";}else{echo "Envoyer";}?>>
</form>
