<?php
    session_start();
    if(isset($data)){
        foreach($data as $article){
?>
        <article>
            <header>
                <h2><a href="?module=forum&action=view<?= "&id=". $article["id"]?>"><?= $article["titre"]?></a></h2>
            </header>
            <div>
                <span>Par <a href="?module=user&action=view&id=<?=$article["userId"]?>"><?= $article["nom"]?></a></span>
                <span>Le <?= $article["date"]?></span>
                <?php if(isset($_SESSION["id"]) && $_SESSION["id"]=== $article["userId"] ){?>
            </div>
            <a href="?module=forum&action=modify&id=<?=$article["id"]?>">Modifier</a>
            <a href="?module=forum&action=delete&id=<?=$article["id"]?>">Supprimer</a>
            <?php ;}?>
        </article>
        <?php
    }
} 
?>