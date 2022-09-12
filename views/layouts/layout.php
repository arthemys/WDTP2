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
        <a href="#">Connection</a>
        <a href="#">Déconnection</a>
    </nav>
    <div class="container">
        <?php echo $content; ?>
    </div>
</body>
</html>