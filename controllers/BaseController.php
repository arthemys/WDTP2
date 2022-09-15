<?php

function base_controller_index(){
    require(MODEL_DIR.'/user.php');
    require(MODEL_DIR.'/forum.php');

    $data = forum_model_list();

    render(VIEW_DIR.'/base/welcome.php', $data);
}

?>