<html>
<head>
    <script src="../src/libraries/aframe.min.js"></script>
</head>
<body>
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

    @$num_licenses = count($drive_license);
    $have_license = false;
    $licenses = "";
    if($num_licenses != 0){
        $have_license = true;
        $licenses = $licenses.$drive_license[0];
        for($i=1;$i<$num_licenses;$i++){
            $licenses = $licenses.", ".$drive_license[$i];
        }
    }

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
        $bugs = $bugs._("You can't upload such a heavy image, the maximum size is ").$maximun_file_size." bytes<br>";
    }else if($_FILES['picture']['name'] == ""){
        $name_file = '';
    }else{
        $bugs = $bugs._("Could not upload image")."<br>";
    }
    
    if($bugs != ""){
        print _("The creation could not be carried out due to:")."<br>".$bugs;
    }else{
        if($file_upload){
            move_uploaded_file ($_FILES['picture']['tmp_name'], $path);
        }

        print "<a-scene>";
        print "<a-entity position='0 0.5 2.1'>
                    <a-camera></a-camera>
                </a-entity>";
        switch ($design) {
            case "1":
                if($file_upload){
                    print "<a-image id='photo' position='-0.4 3.15 0' src='".$path."' height='1.2' width='1.1' material='' visible=''></a-image>";
                }
                print "<a-entity id='user' text='value:".$first_name." ".$last_name."; width: 4; tabSize: 6; color:  #EF2D5E' position='2.4 3.65 0'></a-entity>";
                print "<a-entity id='home' text='value:".$home.", ".$postal_code."; width: 2; color:  #4CC3D9' position='1.43 3.3 0'></a-entity>";
                print "<a-entity id='country' text='value:".$city.", ".$country."; width: 2; color:  #4CC3D9' position='1.43 3.15 0'></a-entity>";
                print "<a-entity id='phone' text='value:".$type_phone.": ".$number_phone."; width: 2; color:  #4CC3D9' position='1.43 3 0'></a-entity>";
                print "<a-entity id='email' text='value:".$email."; width: 2; color:  #4CC3D9' position='1.43 2.85 0'></a-entity>";
                
                print "<a-entity id='studies' text='value: "._("Studies").":; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 2.45 0'></a-entity>";
                print "<a-entity id='date_start1' text='value: ".$date_education_start."; width: 2; color: #4CC3D9' position='0.04 2.25 0'></a-entity>";

                if($current_education == "on"){
                    print "<a-entity id='title' text='value: "._("Studying ").$title._(" in ").$school_name._(" of ").$school_city._(" in ").$school_country.".; width: 2; color: #4CC3D9' position='0.6 2.25 0'></a-entity>";
                }else{
                    print "<a-entity id='date_end1' text='value: ".$date_education_end."; width: 2; color: #4CC3D9' position='0.04 2.15 0'></a-entity>";
                    print "<a-entity id='title' text='value: ".$title._(" in ").$school_name._(" of ").$school_city._(" in ").$school_country.".; width: 2; color: #4CC3D9' position='0.6 2.25 0'></a-entity>";
                }
                print "<a-entity id='skills1' text='value: -".$acquired_skills.".; width: 2; color: #4CC3D9' position='0.65 2.10 0'></a-entity>";
                if(!(empty($job))){
                    print "<a-entity id='works' text='value: "._("Work experience").":; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.8 0'></a-entity>";
                    print "<a-entity id='date_start2' text='value: ".$date_job_start."; width: 2; color: #4CC3D9' position='0.04 1.60 0'></a-entity>";
                    if($current_job == "on"){
                        print "<a-entity id='experience' text='value: "._("Working from ").$job._(" in ").$employer_name._(" of ").$employer_city._(" in ").$employer_country.".; width: 2; color: #4CC3D9' position='0.6 1.55 0'></a-entity>";
                    }else{
                        print "<a-entity id='date_end2' text='value: ".$date_job_end."; width: 2; color: #4CC3D9' position='0.04 1.5 0'></a-entity>";
                        print "<a-entity id='experience' text='value: ".$job._(" in ").$employer_name._(" of ").$employer_city._(" in ").$employer_country.".; width: 2; color: #4CC3D9' position='0.6 1.55 0'></a-entity>";
                    }

                    if($have_license){
                        print "<a-entity id='licenses' text='value: "._("Licenses").":; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.2 0'></a-entity>";
                        print "<a-entity id='licenses_drive' text='value: ".$licenses."; width: 2; color: #4CC3D9' position='0.7 1.2 0'></a-entity>";
                        if(!(empty($other_skills))){
                            print "<a-entity id='other_skills' text='value: "._("Other skills").":; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 1 0'></a-entity>";
                            print "<a-entity id='skills2' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 0.8 0'></a-entity>";
                        }
                    }else{
                        if(!(empty($other_skills))){
                            print "<a-entity id='other_skills' text='value: "._("Other skills").":; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 1.2 0'></a-entity>";
                            print "<a-entity id='skills2' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 1 0'></a-entity>";
                        }
                    }
                }else{
                    if($have_license){
                        print "<a-entity id='licenses' text='value: "._("Licenses").":; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.8 0'></a-entity>";
                        print "<a-entity id='licenses_drive' text='value: ".$licenses."; width: 2; color: #4CC3D9' position='0.7 1.8 0'></a-entity>";
                        if(!(empty($other_skills))){
                            print "<a-entity id='other_skills' text='value: "._("Other skills").":; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 1.6 0'></a-entity>";
                            print "<a-entity id='skills2' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 1.4 0'></a-entity>";
                        }
                    }else{
                        if(!(empty($other_skills))){
                            print "<a-entity id='other_skills' text='value: "._("Other skills").":; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 1.8 0'></a-entity>";
                            print "<a-entity id='skills2' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 1.6 0'></a-entity>";
                        }
                    }
                }
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
        print "</a-scene>";
    }
?>
</body>
</html>