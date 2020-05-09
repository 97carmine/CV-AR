<?PHP

    $design = $_POST["design"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $home = $_POST["home"];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $postal_code = $_POST["postal_code"];
    $type_phone = $_POST["type_phone"];
    $number_phone = $_POST["number_phone"];
    $email = $_POST["email"];
    $date_job_start = $_POST["date_job_start"];
    $date_job_end = $_POST["date_job_end"];
    @$current_job = $_POST["current_job"];
    $job = $_POST["job"];
    $employer_name = $_POST["employer_name"];
    $employer_city = $_POST["employer_city"];
    $employer_country = $_POST["employer_country"];
    $date_education_start = $_POST["date_education_start"];
    $date_education_end = $_POST["date_education_end"];
    @$current_education = $_POST["current_education"];
    $title = $_POST["title"];
    $school_name = $_POST["school_name"];
    $school_city = $_POST["school_city"];
    $school_country = $_POST["school_country"];
    $acquired_skills = $_POST["acquired_skills"];
    @$drive_license = $_POST["drive_license"];
    $other_skills = $_POST["other_skills"];

    $bugs = "";
    $file_upload = false;
    $path = "";

    if (is_uploaded_file ($_FILES['picture']['tmp_name'])){
        $folder = "../src/img/users/";
        $name_file = $_FILES['picture']['name'];
        $file_upload = true;
        $path = $folder.$name_file;
        if (is_file($path)){
            $name_file = time()."_".$name_file;
        }
        $path = $folder.$name_file;
    }else if($_FILES['picture']['error'] == UPLOAD_ERR_FORM_SIZE){
        $maximun_file_size = $_POST['maximun_file_size'];
        $bugs = $bugs."No se puede subir una imagen tan pesada, el maximo es ".$maximun_file_size." bytes<br>";
    }else if($_FILES['picture']['name'] == ""){
        $name_file = '';
    }else{
        $bugs = $bugs."No se pudo subir la imagen.<br>";
    }

    if($bugs == ""){
        if($file_upload)
            move_uploaded_file ($_FILES['picture']['tmp_name'], $path);
        if($file_upload){
            print "<img src='".$path."'>";
        }else{
            print "no hay foto";
        }
    }else{
        print "No se a podido realizar la inserccion por: <br>".$bugs;
    }

    switch ($design) {
        case "1":
          print "serio<br>";
            break;
        case "2":
            print "estrobertido<br>";
            break;
        case "3":
            print "dinamico<br>";
            break;
        default:
            print "petardazo";
            break;
    }
    
    print ($first_name."<br>".$last_name."<br>");
    print ($home.", ".$city.", ".$country.", ".$postal_code."<br>");
    print ($type_phone.": ".$number_phone."<br>");
    print ($email."<br>");

    if(!(empty($job))){
        print ($job."<br>");
        print ($employer_name."<br>");
        print ($employer_city."<br>");
        print ($employer_country."<br>");
        print ($date_job_start."<br>");
        if($current_job == "on"){
            $d=strtotime("today");
            echo "trabajando a ".date("Y-m-d", $d)."<br>";
        }else{
            print ($date_job_end."<br>");
        }
    }else{
        print("sin esperiencia laboral<br>");
    }
    
    if(!(empty($title))){
        print ($title."<br>");
        print ($school_name."<br>");
        print ($school_city."<br>");
        print ($school_country."<br>");
        print ($acquired_skills."<br>");
        print ($date_education_start."<br>");
        if($current_education == "on"){
            $d=strtotime("today");
            echo date("Y-m-d", $d) . "<br>";
        }else{
            print ($date_education_end."<br>");
        }
    }else{
        print("sin estudios<br>");
    }
    
    @$num_licenses = count($drive_license);

    if($num_licenses != 0){
        foreach ($drive_license as $license)
        print ($license."<br>");
    }else{
        print "Sin carnet";
    }

    if(!(empty($other_skills))){
        print ($other_skills);
    }
?>