<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=à, initial-scale=1.0">
    <title>MVC</title>
    <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>
    <!-- <ul class="navigation">
      <li><a href="?module=user&action=index">Lister les utilisateurs</a></li>
      <li><a href="?module=user&action=create">Saisir un utilisateur</a></li>
    </ul> -->
    <nav class="navigation">
        <a href="index.php">Accueil</a>
        <?php if(isset($_SESSION["nom"])){
        ?>
            Bonjour, <?= $_SESSION["nom"] ?>
            <a href="?module=forum&action=create">Créer une publication</a>
            <a href="?module=user&action=deconnection">Déconnection</a>
        <?php
        }
        else{
        ?>
            <a href="?module=user&action=connect">Connection</a>
            <a href="?module=user&action=register">S'enregister</a>
        <?php    
        }
        ?>
    </nav>
    <div class="container">
        <?php echo $content; ?>
    </div>
</body>
</html>