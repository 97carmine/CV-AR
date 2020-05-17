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
    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">CV-AR</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a href="index.php" class="nav-item nav-link active"><?=_("Start")?></a>
                <a href="templates.php" class="nav-item nav-link active"><?=_("Templates")?></a>
                <a href="about.php" class="nav-item nav-link active"><?=_("About")?></a>
            </div>
        </div>
    </nav>
    <section class="container">
        <article class="text-center">
            <h1 class="p-4"><?=_("FORM")?></h1>
            <p class="p-3"><?=_("Fill in the options on the form, those with an asterisk are mandatory")?></p>
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
                            <label for="first_name"><?=_("First name")?> *</label>
                            <input type="text" class="form-control" name="first_name" required>
                        </div>
                        <div class="form-group col-md">
                            <label for="last_name"><?=_("Last name")?> *</label>
                            <input type="text" class="form-control" name="last_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <svg class="bi bi-info-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg" id="start-geolocalization">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z"
                                clip-rule="evenodd" />
                            <path
                                d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                            <circle cx="8" cy="4.5" r="1" />
                        </svg>
                        <?=_("Click on the icon to geolocate your position")?>
                    </div>
                    <div class="form-group">
                        <label for="home"><?=_("Home")?> *</label>
                        <input type="text" class="form-control" name="home" required>
                        <div class="invalid-feedback">
                            <?=_("There was an error obtaining the street information")?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-12">
                            <label for="city"><?=_("City")?> *</label>
                            <input type="text" class="form-control" name="city" required>
                        </div>
                        <div class="form-group col-lg-4 col-md-8">
                            <label for="country"><?=_("Country")?> *</label>
                            <input type="text" class="form-control" name="country" required>
                        </div>
                        <div class="form-group col-lg-2 col-md-4">
                            <label for="zip"><?=_("Postal Code")?> *</label>
                            <input type="text" class="form-control" name="postal_code" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="number_phone"><?=_("Phone")?>: *</label>
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
                            <label for="email"><?=_("Email")?> *</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>
                </fieldset>
                <legend><?=_("PROFESSIONAL EXPERIENCE")?></legend>
                <fieldset class="check-fieldset">
                    <div class="form-group add-fields">
                        <svg class="bi bi-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
                        </svg>
                        <?=_("Click on the icon to add a field")?>
                    </div>
                    <div class="form-group del-fields" style="display: none;">
                        <svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
                        </svg>
                        <?=_("Click on the icon to delete the last field")?>
                    </div>
                </fieldset>
                <legend><?=_("EDUCATION AND FORMATION")?></legend>
                <fieldset class="check-fieldset">
                    <div class="form-group add-fields">
                        <svg class="bi bi-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
                        </svg>
                        <?=_("Click on the icon to add a field")?>
                    </div>
                    <div class="form-group del-fields" style="display: none;">
                        <svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
                        </svg>
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
                                <option value="B_+_E_">B + E</option>
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
                        <button type="submit" class="btn btn-outline-dark"><?=_("Generate resume")?></button>
                        <button type="reset" class="btn btn-outline-* "><?=_("Clean form")?></button>
                    </div>                   
                </fieldset>
            </form>
        </article>
    </section>
</body>
<script src="libraries/jquery-3.5.1.min.js"></script>
<script src="libraries/bootstrap.min.js"></script>
<script src="libraries/popper.min.js"></script>
<script type="module" src="scripts/form.js"></script>

</html>