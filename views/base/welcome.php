<?php
    require_once(CONNEX_DIR); 
    $sql = "SELECT * FROM forumWDTP2 INNER JOIN userWDTP2 ON userId = userwdtp2.id";
    $result = mysqli_query($con, $sql);
    // print_r($result);
    foreach($result as $article){
        ?>
        <article>
            <header><a href="#"><?= $article["titre"]?></a></header>
        </article>
        <a href="#"><?= $article["nom"] ?></a>
        <span><?= $article["date"] ?></span>
        <?php
    }
    mysqli_close($con);
?>