<?php

function base_controller_index(){
    require(MODEL_DIR.'/user.php');
    require(MODEL_DIR.'/forum.php');

    // $user = user_model_list();
    $data = forum_model_list();
    // $data = array_merge($user, $posts);

    render(VIEW_DIR.'/base/welcome.php', $data);
}

?>