<form action="index.php?module=user&action=edit" method="post">
    <input type="hidden" name="userId" value="<?php echo $data['user']['userId']; ?>">
        <label>
            Nom
            <input type="text" name="name" value="<?php echo $data['user']['name']; ?>">
        </label>
        <label>
            Courriel
            <input type="email" name="email" value="<?php echo $data['user']['email']; ?>">
        </label>
        <label>
            Date de naissance
            <input type="date" name="birthday" value="<?php echo date_format(date_create($data['user']['birthday']),"Y-m-d") ?>">
        </label>
         <label>
            Ville
            <select name="userCityId">
            <?php
                foreach($data['city'] as $row){
                ?>
                <option value="<?php echo $row['cityId'];?>" <?php if($row['cityId']==$data['user']['userCityId']){ echo 'selected';}?>><?php echo $row['cityName'];?></option>
                <?php
                }
                ?>
            </select>
        </label>
        <input type="submit">
    </form>
 