<!DOCTYPE html>
<html lang="<?php echo (substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2))?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=_("About")?></title>
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
        <a class="navbar-brand" href="index.php">CV-AR</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a href="index.php" class="nav-item nav-link"><?=_("Start")?></a>
                <a href="templates.php" class="nav-item nav-link"><?=_("Templates")?></a>
                <a href="#" class="nav-item nav-link active"><?=_("About")?></a>
                <?php
                session_start();
                if(isset($_SESSION['login'])){
                    print "<a href='register.php' class='nav-item nav-link'>".$_SESSION['login']."</a>";
                }else{
                    print "<a href='register.php' class='nav-item nav-link'>"._("acount")."</a>";
                }
                ?>
            </div>
        </div>
    </nav>
    <section class="container">
        <article class="text-justify m-4">
            <h1 class=""><?=_("TEAM")?></h1>
            <p>Somos un grupo de alumnos formado por Axel Gabriel Calle Granda y Adrián Rodríguez Balleteros que estudia
                un grado superior de <span class="font-italic">Desarrollo de aplicaciones web</span>.</p>
            <h1><?=_("OUR HISTORY")?></h1>
            <p><?=_("For the choice of this project, we observe that the ways of representing oneself have hardly changed, for this reason we decided to create this tool that complements the traditional curriculum.")?></p>
            <h1><?=_("INVOLVE")?></h1>
            <p>Puedes crear una incidencia <a href="https://github.com/97carmine/CV-AR/issues/new"
                    target="_blank">aquí</a>, puedes proponer ideas sobre como mejorar.</p>
        </article>
    </section>
</body>
<script src="libraries/jquery-3.5.1.min.js"></script>
<script src="libraries/bootstrap.min.js"></script>
<script src="libraries/popper.min.js"></script>

</html>