<?php
    foreach($data as $article){
        ?>
        <article>
            <header>
                <a href="#"><?= $article["titre"]?></a>
            </header>
            <div>
                <span><a href="#"><?= $article["nom"]?></a></span>
                <span><?= $article["date"]?></span>
            </div>
        </article>
        <?php
    }
  
?>