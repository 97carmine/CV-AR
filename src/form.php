<!DOCTYPE php>
<php lang="<?php echo (substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2))?>">

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

            <form class="text-left" action="#" method="post">
                <input type="hidden" name="design" max="3" value="<?php echo $_GET["design"] ?>" required>
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
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z"
                                clip-rule="evenodd" />
                            <path
                                d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                            <circle cx="8" cy="4.5" r="1" />
                        </svg>
                        Si quieres que se geolocalice tu posición, haz click <span
                            id="start-geolocalization">aquí</span>.
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
                                        <option value="mobile_phone_number"><?=_("Mobile")?></option>
                                        <option value="house_phone_number"><?=_("House")?></option>
                                        <option value="main_phone_number"><?=_("Main")?></option>
                                        <option value="other_number_phone"><?=_("Other")?></option>
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
                            <input type="email" class="form-control" id="email" required>
                        </div>
                    </div>
                </fieldset>
                <legend><?=_("PROFESSIONAL EXPERIENCE")?></legend>
                <fieldset>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="date_job_start"><?=_("Enter the job start date")?></label>
                            <input type="date" class="form-control check-start-date" name="date_job_start"
                                min="1900-01-01">
                            <div class="invalid-feedback">
                                <?=_("The date entered is higher than the end date")?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_job_end"><?=_("Indicate the end date of the jobs")?></label>
                                <input type="date" class="form-control check-end-date" name="date_job_end"
                                    min="1900-01-01">
                                <div class="invalid-feedback">
                                    <?=_("The date entered is before the start date")?>
                                </div>
                            </div>
                            <div class="form-group custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="current_job">
                                <label class="custom-control-label" for="current_job"><?=_("Current job")?></label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="job"><?=_("Position or position occupied")?></label>
                            <input type="text" class="form-control" name="job">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="first_name"><?=_("Name of employer")?></label>
                            <input type="text" class="form-control" name="employer_name">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="last_name"><?=_("Employer City")?></label>
                            <input type="text" class="form-control" name="employer_city">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="last_name"><?=_("Employer Country")?></label>
                            <input type="text" class="form-control" name="employer_country">
                        </div>
                    </div>
                </fieldset>
                <legend><?=_("EDUCATION AND FORMATION")?></legend>
                <fieldset>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="date_education_start"><?=_("Indicate the start date of the study")?></label>
                            <input type="date" class="form-control check-start-date" name="date_education_start"
                                min="1900-01-01">
                            <div class="invalid-feedback">
                                <?=_("The date entered is higher than the end date")?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_education_end"><?=_("Indicate the end date of the study")?></label>
                                <input type="date" class="form-control check-end-date" name="date_education_end"
                                    min="1900-01-01">
                                <div class="invalid-feedback">
                                    <?=_("The date entered is before the start date")?>
                                </div>
                            </div>
                            <div class="form-group custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="current_education">
                                <label class="custom-control-label" for="current_education"><?=_("Current study")?></label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title"><?=_("Title of qualification awarded")?></label>
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row col">
                            <div class="form-group col-md-12">
                                <label for="school_name"><?=_("Name of the organization that provided your education")?></label>
                                <input type="text" class="form-control" name="school_name">
                            </div>
                            <div class="form-group col-md">
                                <label for="school_city"><?=_("Organization location")?></label>
                                <input type="text" class="form-control" name="school_city">
                            </div>
                            <div class="form-group col-md">
                                <label for="school_country"><?=_("Organization country")?></label>
                                <input type="text" class="form-control" name="school_country">
                            </div>
                        </div>
                        <div class="form-row col">
                            <div class="form-group col-md">
                                <label for="acquired_skills"><?=_("Main subjects taken and professional skills acquired")?></label>
                                <textarea class="form-control" rows="4" name="acquired_skills"></textarea>
                            </div>
                        </div>
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
                                <select class="custom-select" name="drive_license">
                                    <option selected></option>
                                    <option value="AM_drive_license">AM</option>
                                    <option value="A1_drive_license">A1</option>
                                    <option value="A_drive_license">A</option>
                                    <option value="B_drive_license">B</option>
                                    <option value="B_drive_license">A + B</option>
                                    <option value="B_+_E_drive_license">B + E</option>
                                    <option value="C1_drive_license">C1</option>
                                    <option value="C1_+_E_drive_license">C1 + E</option>
                                    <option value="C_drive_license">C</option>
                                    <option value="C_+_E">C + E</option>
                                    <option value="D1_drive_license">D1</option>
                                    <option value="D1_+_E">D1 + E</option>
                                    <option value="D_drive_license">D</option>
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
                    <button type="submit" class="btn btn-outline-dark"><?=_("Generate resume")?></button>
                    <button type="reset" class="btn btn-outline-* "><?=_("Clean form")?></button>                    
                </fieldset>
            </form>
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
<script type="module" src="scripts/form.js">
</script>

</php>