<?php
    session_start();
    if(isset($data)){
        foreach($data as $article){
            // print_r($data);
            ?>
        <article>
            <header>
                <a href="?module=forum&action=view<?= "&id=". $article["id"]?>"><?= $article["titre"]?></a>
            </header>
            <div>
                <span><a href="#"><?= $article["nom"]?></a></span>
                <span><?= $article["date"]?></span>
            </div>
        </article>
        <?php
    }
} 
?>