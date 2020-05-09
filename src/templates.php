<!DOCTYPE php>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                <a href="#" class="nav-item nav-link active"><?=_("Templates")?></a>
                <a href="about.php" class="nav-item nav-link"><?=_("About")?></a>
            </div>
        </div>
    </nav>
    <section class="container">
        <article class="text-center">
            <h1 class="p-4"><?=_("TEMPLATES")?></h1>
            <p class="p-3"><?=_("Choose from three designs, the one that best suits you")?></p>
            <div class="text-justify card-deck">
                <div class="card">
                    <img src="#" class="card-img-top" alt="<?=_("Design")?> 1">
                    <div class="card-body">
                        <h4 class="card-title"><?=_("Design")?> 1</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, eaque neque
                            libero aut eos excepturi reiciendis odit rem autem quibusdam, blanditiis animi temporibus
                            sunt nam, natus sequi cupiditate eveniet facere!</p>
                        <p class="card-text">Sus características son:</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Característica 1</li>
                        <li class="list-group-item">Característica 2</li>
                        <li class="list-group-item">Característica 3</li>
                    </ul>
                    <div class="card-body">
                        <a href="form.php?design=1" class="btn btn-block"><?=_("Access form")?></a>
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
                                        <p>Accede a esta <a id="link_example_1" href="examples/example_1.html" target="_blank">página web</a>
                                            desde otro dispositivo.</p>
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
                    <img src="#" class="card-img-top" alt="<?=_("Design")?> 2">
                    <div class="card-body">
                        <h4 class="card-title"><?=_("Design")?> 2</h4>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam sed
                            accusantium nam iste explicabo cupiditate neque atque natus aut adipisci dolores, facere
                            temporibus quisquam dicta expedita asperiores ipsum architecto. Vitae?</p>
                        <p class="card-text">Sus características son:</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Característica 1</li>
                        <li class="list-group-item">Característica 2</li>
                        <li class="list-group-item">Característica 3</li>
                    </ul>
                    <div class="card-body">
                        <a href="form.php?design=2" class="btn btn-block"><?=_("Access form")?></a>
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
                                        <p>Accede a esta <a id="link_example_2" href="examples/example_2.html" target="_blank">página web</a>
                                            desde otro dispositivo.</p>
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
                    <img src="#" class="card-img-top" alt="<?=_("Design")?> 3">
                    <div class="card-body">
                        <h4 class="card-title"><?=_("Design")?> 3</h4>
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam veniam
                            voluptatibus natus at quos id commodi sequi unde animi, tempore consectetur dicta. Nostrum
                            illum ex eum quidem commodi veritatis a.</p>
                        <p class="card-text">Sus características son:</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Característica 1</li>
                        <li class="list-group-item">Característica 2</li>
                        <li class="list-group-item">Característica 3</li>
                    </ul>
                    <div class="card-body">
                        <a href="form.php?design=3" class="btn btn-block"><?=_("Access form")?></a>
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
                                        <p>Accede a esta <a id="link_example_3" href="examples/example_3.html" target="_blank">página web</a>
                                            desde otro dispositivo.</p>
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

</html>