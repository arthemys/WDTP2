<?php
    require(MODEL_DIR.'/user.php');
    require(MODEL_DIR.'/forum.php');

    $user = user_model_list();
    $posts = forum_model_list();

    foreach($posts as $article){
        ?>
        <article>
            <header><a href="#"><?= $article["titre"]?></a></header>
            <a href="#"><?= $user[$article["userId"]-1]["nom"] ?></a>
            <span><?= $article["date"] ?></span>
        </article> 
        <?php
    }

?>