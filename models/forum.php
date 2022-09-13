<?php
    function forum_model_list(){
        require(CONNEX_DIR);
        $sql = "SELECT forumWDTP2.id, titre, date, userId, nom FROM forumWDTP2 INNER JOIN userWDTP2 ON userId = userwdtp2.id";
        $result = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_close($con);
        return $result;
    }
?>