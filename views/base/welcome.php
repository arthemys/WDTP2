<?php
    session_start();
    foreach($data as $article){
        // print_r($data);
        ?>
        <article>
            <header>
                <a href="?module=forum&action=view<?= "&". $article["id"]?>"><?= $article["titre"]?></a>
            </header>
            <div>
                <span><a href="#"><?= $article["nom"]?></a></span>
                <span><?= $article["date"]?></span>
            </div>
        </article>
        <?php
    }
  
?>