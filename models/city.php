<?php
function city_model_list(){
    require(CONNEX_DIR);
    $sql = "SELECT * FROM city ORDER BY cityName";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($con);
    return $result;
}

?>