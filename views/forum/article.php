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
</footer>