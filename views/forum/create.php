<?php if($_REQUEST["action"] ==="modify"){?>
    <form action="?module=forum&action=modifyArticle" method="post">
    <input type="hidden" name="userId" value="<?= $data[0]["userId"] ?>">
    <input type="hidden" name="id" value="<?= $data[0]["id"] ?>">
<?php }else{?>
<form action="?module=forum&action=insert" method="post">
<?php } ?>
    <label>
        Titre <span><?php if(isset($data["erreurTitre"])){echo $data["erreurTitre"];}?></span>
        <input type="text" name="titre" value="<?php if($_REQUEST["action"] ==="modify"){echo $data[0]["titre"]; }?>" required>
    </label>
    <label>
        Contenu <span><?php if(isset($data["erreurArticle"])){echo $data["erreurArticle"];} ?></span>
        <textarea name="article" cols="30" rows="10" required><?php if($_REQUEST["action"] ==="modify"){echo $data[0]["article"]; }?></textarea>
    </label>
    <input type="submit" value=<?php if($_REQUEST["action"] ==="modify"){echo "Modifier";}else{echo "Envoyer";}?>>
</form>
