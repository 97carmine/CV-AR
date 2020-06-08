<?php include "../resources/selectLanguaje.php" ?>

<!DOCTYPE html>
<html lang="<?php echo (substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2))?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=_("Start")?></title>
    <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- CSS personalizados -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">CV-AR</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a href="#" class="nav-item nav-link active"><?=_("Start")?></a>
                <a href="templates.php" class="nav-item nav-link"><?=_("Templates")?></a>
                <a href="about.php" class="nav-item nav-link"><?=_("About")?></a>
                <?php
                session_start();
                if(isset($_SESSION['login'])){
                    print "<a href='register.php' class='nav-item nav-link'>".$_SESSION['login']."</a>";
                }else{
                    print "<a href='register.php' class='nav-item nav-link'>"._("log in")."</a>";
                }
                ?>
            </div>
        </div>
    </nav>
    <section>
        <article class="jumbotron jumbotron-fluid">
            <div class="container text-center">
                <h1><?=_("HELLO")?></h1>
                <p><?=_("Welcome to the world's first augmented reality resume builder")?></p>
                <hr>
                <p><?=_("Designed by Axel Gabriel Calle Granda and Adrián Rodríguez Ballesteros as a final degree project in the Jose Ramón Otero cooperative")?></p>
            </div>
        </article>
        <div class="container">
            <article>

            </article>
        </div>
    </section>
</body>
<script src="libraries/jquery-3.5.1.min.js"></script>
<script src="libraries/bootstrap.min.js"></script>
<script src="libraries/popper.min.js"></script>

</html>