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
    <?php
    session_start();
    if(isset($_SESSION['login'])){
        ?>
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#">CV-AR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a href="index.php" class="nav-item nav-link"><?=_("Start")?></a>
                    <a href="templates.php" class="nav-item nav-link"><?=_("Templates")?></a>
                    <a href="about.php" class="nav-item nav-link"><?=_("About")?></a>
                    <?php
                    print "<a href='#' class='nav-item nav-link' active>".$_SESSION['login']."</a>";
                    ?>
                </div>
            </div>
        </nav>
        <div class="mt-5 d-flex justify-content-center container-fluid">
            <div class="row d-flex justify-content-center" style="width:80%;">
                <div class="col-12 d-flex justify-content-end">
                    <form action="../resources/account_creator.php" method="POST" align="right" style="width:80%;">
                    <button type="submit" name="exit" class="btn btn-outline-dark"><?=_("Log out")?></button>
                    </form>
                </div>
                <div class="col-md-4">
                <?php
                $conexion = mysqli_connect ("localhost", "root", "") or die ("No se puede conectar con el servidor");
                mysqli_select_db ($conexion,"cv-ar") or die ("No se puede seleccionar la base de datos");
                
                $consulta = mysqli_query ($conexion, "SELECT * FROM curriculums WHERE usuario='".$_SESSION['login']."'") or die ("Fallo en la consulta");
                
                if(mysqli_num_rows($consulta)>0){
                    print "<h3 class='my-4'>Listado de curriculums</h3>";
                    for($i=0;$i<mysqli_num_rows($consulta);$i++){
                        $fila = mysqli_fetch_array ($consulta);
                        print "<a href='".$fila["cv"]."' class='mt-4'>CV_".$_SESSION['login'].$i."</a><br>";
                    }
                }else{
                    print "<p class='my-4'>"._("You still don't have any resume").".</p>";
                    print "<p>"._("Choose one of our designs and create it").".</p>";
                }
            
                mysqli_close($conexion);
                ?>
                </div>
                <div class="col-md-5">
                    <p class="my-4"><?=_("Entering the link of your CV, scan the following image with the camera.")?></p>
                    <img src="img/patterns/hiro.png" class="img-fluid">
                </div>
            </div>
        </div>
        <?php
    }else{
        ?>
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#">CV-AR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a href="index.php" class="nav-item nav-link"><?=_("Start")?></a>
                    <a href="templates.php" class="nav-item nav-link"><?=_("Templates")?></a>
                    <a href="about.php" class="nav-item nav-link"><?=_("About")?></a>
                    <a href="#" class="nav-item nav-link" active><?=_("log in")?></a>
                </div>
            </div>
        </nav>
        <?php
        ?>
        <div class="d-flex justify-content-center container-fluid pt-4">
            <div class="row d-flex justify-content-center mt-5 pt-4" style="width:80%;">
                <div class="col-md-7 d-flex justify-content-center">
                    <div class="row" style="width:80%;">
                        <div class="col-12 d-flex justify-content-center"><p><?=_("Enter with your account")?></p></div>
                        <div class="col-12 d-flex justify-content-center">
                            <form action="../resources/account_creator.php" method="POST">
                                <?=_('User')?>: <input type="text" name="usuario" value="" required><br><br>
                                <?=_('password')?>: <input type="password" name="pass" value="" required><br><br>
                                <button type="submit" name="enter" class="btn btn-outline-dark"><?=_("Log in")?></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center"><p><?=_("If you don't have any account")?></p></div>
                        <div class="col-12"><center><a class="btn btn-outline-dark" href="new_account.php"><?=_("log up")?></a></center></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    
</body>
<script src="libraries/jquery-3.5.1.min.js"></script>
<script src="libraries/bootstrap.min.js"></script>
<script src="libraries/popper.min.js"></script>
</html>