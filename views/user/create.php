<form action="index.php?module=user&action=insert" method="post">
        <label>
            Nom
            <input type="text" name="name">
        </label>
        <label>
            Courriel
            <input type="email" name="email">
        </label>
        <label>
            Date de naissance
            <input type="date" name="birthday">
        </label>
        <label>
            Username
            <input type="email" name="username">
        </label>
        <label>
            Mot de passe
            <input type="password" name="password">
        </label>
         <label>
            Ville
            <select name="userCityId">
            <?php
                foreach($data as $row){
                ?>
                <option value="<?php echo $row['cityId'];?>"><?php echo $row['cityName'];?></option>
                <?php
                }
                ?>
            </select>
        </label>
        <input type="submit">
    </form>
 