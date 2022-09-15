<?php
session_start();
?>
<header>
    <h1><?= $data[0]["titre"]?></h1>
</header>
<div>
    <p><?= $data[0]["article"]?></p>
</div>
<footer>
    <span>Par <a href="?module=user&action=view<?= "&id=". $data[0]["userId"]?>"><?= $data[0]["nom"] ?></a></span>
    <span>Le <?= $data[0]["date"] ?></span>
    <?php if(isset($_SESSION["id"]) && $_SESSION["id"] === $data[0]["userId"] ){?>
                <a href="?module=forum&action=modify&id=<?=$_REQUEST["id"]?>">Modifier</a>
                <a href="?module=forum&action=delete&id=<?=$_REQUEST["id"]?>">Supprimer</a>
                 <?php ;}?>

</footer>