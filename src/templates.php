<!DOCTYPE html>
<html lang="<?php echo (substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2))?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=_("Templates")?></title>
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
                <a href="#" class="nav-item nav-link active"><?=_("Templates")?></a>
                <a href="about.php" class="nav-item nav-link"><?=_("About")?></a>
                <?php
                print "<a href='register.php' class='nav-item nav-link'>".$_SESSION['login']."</a>";
                ?>
            </div>
        </div>
    </nav>
    <?php }else{ ?>
    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">CV-AR</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a href="index.php" class="nav-item nav-link"><?=_("Start")?></a>
                <a href="#" class="nav-item nav-link active"><?=_("Templates")?></a>
                <a href="about.php" class="nav-item nav-link"><?=_("About")?></a>
                <?php
                print "<a href='register.php' class='nav-item nav-link'>"._("Acount")."</a>";
                ?>
            </div>
        </div>
    </nav>
    <?php } ?>

    <section class="container">
        <article class="text-center">
            <h1 class="p-4"><?=_("TEMPLATES")?></h1>
            <p class="p-3"><?=_("Choose from three designs, the one that best suits you")?></p>
            <div class="text-justify card-deck">
                <div class="card">
                    <img src="img/examples/example_1.PNG" class="card-img-top" alt="<?=_("Design")?> 1">
                    <div class="card-body">
                        <h4 class="card-title"><?=_("Design")?> 1</h4>
                        <p class="card-text"><?=_("Their characteristics are")?>:</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?=_("Simple")?></li>
                        <li class="list-group-item"><?=_("Discreet")?></li>
                        <li class="list-group-item"><?=_("Formal")?></li>
                    </ul>
                    <div class="card-body">
                        <?php if(isset($_SESSION['login'])){ ?>
                        <a href="form.php?design=1" class="btn btn-block"><?=_("Access form")?></a>
                        <?php } ?>
                        <a class="btn btn-block" data-toggle="modal" data-target="#example_1"><?=_("See example")?></a>
                        <div class="modal fade" id="example_1" tabindex="-1" role="dialog"
                            aria-labelledby="example_title_1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="example_title_1"><?=_("Design")?> 1</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <?=_("First make sure that the web server works with HTTPS as it is a requirement to access the camera from a web browser")?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <p><?=_("Access this ")?><a id="link_example_1" href="examples/example_1.php" target="_blank"><?=_("web page")?></a>
                                        <?=_(" from another camera device.")?></p>
                                        <p><?=_("Now with the other device, scan the following mark")?>.</p>
                                        <img src="img/patterns/hiro.png" class="img-fluid"
                                            alt="Marca del ejemplo 1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="img/examples/example_2.PNG" class="card-img-top" alt="<?=_("Design")?> 2">
                    <div class="card-body">
                        <h4 class="card-title"><?=_("Design")?> 2</h4>
                        <p class="card-text"><?=_("Their characteristics are")?>:</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?=_("Creative")?></li>
                        <li class="list-group-item"><?=_("Witty")?></li>
                        <li class="list-group-item"><?=_("Animated")?></li>
                    </ul>
                    <div class="card-body">
                        <?php if(isset($_SESSION['login'])){ ?>
                        <a href="form.php?design=2" class="btn btn-block"><?=_("Access form")?></a>
                        <?php } ?>
                        <a href="#" class="btn btn-block" data-toggle="modal" data-target="#example_2"><?=_("See example")?></a>
                        <div class="modal fade" id="example_2" tabindex="-1" role="dialog"
                            aria-labelledby="example_title_2" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="example_title_2"><?=_("Design")?> 2</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <?=_("First make sure that the web server works with HTTPS as it is a requirement to access the camera from a web browser")?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <p><?=_("Access this ")?><a id="link_example_2" href="examples/example_2.php" target="_blank"><?=_("web page")?></a>
                                            <?=_(" from another camera device.")?></p>
                                        <p><?=_("Now with the other device, scan the following mark")?>.</p>
                                        <img src="img/patterns/hiro.png" class="img-fluid"
                                            alt="Marca del ejemplo 2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="img/examples/example_3.PNG" class="card-img-top" alt="<?=_("Design")?> 3">
                    <div class="card-body">
                        <h4 class="card-title"><?=_("Design")?> 3</h4>
                        <p class="card-text"><?=_("Their characteristics are")?>:</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?=_("Outgoing")?></li>
                        <li class="list-group-item"><?=_("Curious")?></li>
                        <li class="list-group-item"><?=_("Image enhancer")?></li>
                    </ul>
                    <div class="card-body">
                        <?php if(isset($_SESSION['login'])){ ?>
                        <a href="form.php?design=3" class="btn btn-block"><?=_("Access form")?></a>
                        <?php } ?>
                        <a href="#" class="btn btn-block" data-toggle="modal" data-target="#example_3"><?=_("See example")?></a>
                        <div class="modal fade" id="example_3" tabindex="-1" role="dialog"
                            aria-labelledby="example_title_3" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="example_title_3"><?=_("Design")?> 3</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <?=_("First make sure that the web server works with HTTPS as it is a requirement to access the camera from a web browser")?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <p><?=_("Access this ")?><a id="link_example_3" href="examples/example_3.php" target="_blank"><?=_("web page")?></a>
                                            <?=_(" from another camera device.")?></p>
                                        <p><?=_("Now with the other device, scan the following mark")?>.</p>
                                        <img src="img/patterns/hiro.png" class="img-fluid"
                                            alt="Marca del ejemplo 3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
</body>
<script src="libraries/jquery-3.5.1.min.js"></script>
<script src="libraries/bootstrap.min.js"></script>
<script src="libraries/popper.min.js"></script>

</html>