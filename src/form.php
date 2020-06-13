<!DOCTYPE html>
<html lang="<?php echo (substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2))?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=_("Form")?></title>
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
        <a class="navbar-brand" href="index.php">CV-AR</a>
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
                print "<a href='register.php' class='nav-item nav-link'>".$_SESSION['login']."</a>";
                ?>
            </div>
        </div>
    </nav>
    <section class="container">
        <article class="text-center">
            <h1 class="p-4"><?=_("FORM")?></h1>
            <p class="p-3"><?=_("Fill in the options on the form, those with an exclamation are mandatory")?></p>
            <div class="alert alert-danger" style="display: none;">
                <span class="text_error"></span>
            </div>

            <form class="text-left" action="../resources/generator.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="design" max="3" value="<?php echo $_GET["design"] ?>" required>
                <input type="hidden" name="countProExp">
                <input type="hidden" name="countEdu">
                <input type="hidden" name="maximun_file_size" value="1048576" required>
                <legend><?=_("PERSONAL INFORMATION")?></legend>
                <fieldset>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="first_name">
                                <?=_("First name")?>
                                <img src="img/svg/exclamation.svg" alt="<?=_("Exclamation")?>">
                            </label>
                            <input type="text" class="form-control" name="first_name" required>
                        </div>
                        <div class="form-group col-md">
                            <label for="last_name">
                                <?=_("Last name")?>
                                <img src="img/svg/exclamation.svg" alt="<?=_("Exclamation")?>">
                            </label>
                            <input type="text" class="form-control" name="last_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <img src="img/svg/info-circle.svg" alt="<?=_("Information circle")?>" id="start-geolocalization">
                        <?=_("Click on the icon to geolocate your position")?>
                    </div>
                    <div class="form-group">
                        <label for="home">
                            <?=_("Home")?>
                            <img src="img/svg/exclamation.svg" alt="<?=_("Exclamation")?>">
                        </label>
                        <input type="text" class="form-control" name="home" required>
                        <div class="invalid-feedback">
                            <?=_("There was an error obtaining the street information")?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-12">
                            <label for="city">
                                <?=_("City")?>
                                <img src="img/svg/exclamation.svg" alt="<?=_("Exclamation")?>">
                            </label>
                            <input type="text" class="form-control" name="city" required>
                        </div>
                        <div class="form-group col-lg-4 col-md-8">
                            <label for="country">
                                <?=_("Country")?>
                                <img src="img/svg/exclamation.svg" alt="<?=_("Exclamation")?>">
                            </label>
                            <input type="text" class="form-control" name="country" required>
                        </div>
                        <div class="form-group col-lg-2 col-md-4">
                            <label for="zip">
                                <?=_("Postal Code")?>
                                <img src="img/svg/exclamation.svg" alt="<?=_("Exclamation")?>">
                            </label>
                            <input type="text" class="form-control" name="postal_code" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="number_phone">
                                <?=_("Phone")?>:
                                <img src="img/svg/exclamation.svg" alt="<?=_("Exclamation")?>">
                            </label>
                            <div class="form-row">
                                <div class="col-6 col-lg-4">
                                    <select class="custom-select" name="type_phone">
                                        <option disabled selected><?=_("Type")?></option>
                                        <option value="mobile_phone"><?=_("Mobile")?></option>
                                        <option value="house_phone"><?=_("House")?></option>
                                        <option value="main_phone"><?=_("Main")?></option>
                                        <option value="other_number"><?=_("Other")?></option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control col-md" name="number_phone" min="1"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md">
                            <label for="email">
                                <?=_("Email")?>
                                <img src="img/svg/exclamation.svg" alt="<?=_("Exclamation")?>">
                            </label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>
                </fieldset>
                <legend><?=_("PROFESSIONAL EXPERIENCE")?></legend>
                <fieldset class="check-fieldset">
                    <div class="form-group add-fields">
                        <img src="img/svg/plus.svg" alt="<?=_("Plus")?>">
                        <?=_("Click on the icon to add a field")?>
                    </div>
                    <div class="form-group del-fields" style="display: none;">
                        <img src="img/svg/x.svg" alt="<?=_("X")?>">
                        <?=_("Click on the icon to delete the last field")?>
                    </div>
                </fieldset>
                <legend><?=_("EDUCATION AND FORMATION")?></legend>
                <fieldset class="check-fieldset">
                    <div class="form-group add-fields">
                    <img src="img/svg/plus.svg" alt="<?=_("Plus")?>">
                        <?=_("Click on the icon to add a field")?>
                    </div>
                    <div class="form-group del-fields" style="display: none;">
                    <img src="img/svg/x.svg" alt="<?=_("X")?>">
                        <?=_("Click on the icon to delete the last field")?>
                    </div>
                </fieldset>
                <legend><?=_("ADDITIONAL FIELDS")?></legend>
                <fieldset>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="picture">
                                <label class="custom-file-label" for="picture" data-browse="<?=_("Search")?>"><?=_("Attach a photo")?></label>
                            </div>
                        </div>
                        <div class="form-group col-md">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="drive_license"><?=_("Driving license")?></label>
                                </div>
                                <select multiple class="custom-select" name="drive_license[]" size="1">
                                <option value="AM">AM</option>
                                <option value="A1">A1</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="B_+_E">B + E</option>
                                <option value="C1">C1</option>
                                <option value="C1_+_E">C1 + E</option>
                                <option value="C">C</option>
                                <option value="C_+_E">C + E</option>
                                <option value="D1">D1</option>
                                <option value="D1_+_E">D1 + E</option>
                                <option value="D">D</option>
                                <option value="D_+_E">D + E</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="other_skills"><?=_("Other skills")?></label>
                        <textarea class="form-control" rows="5" name="other_skills"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <button type="submit" name="send" class="btn btn-outline-dark"><?=_("Generate resume")?></button>
                        <button type="reset" class="btn btn-outline-*"><?=_("Clean form")?></button>
                    </div>                   
                </fieldset>
            </form>
        </article>
    </section>
    <?php
    }else{
        header("Location:index.php");;
    }
    ?>
</body>
<script src="libraries/jquery-3.5.1.min.js"></script>
<script src="libraries/bootstrap.min.js"></script>
<script src="libraries/popper.min.js"></script>
<script type="module" src="scripts/form.js"></script>

</html>