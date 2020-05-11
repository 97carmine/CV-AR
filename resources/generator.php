<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
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

        if($current_education == "on"){
            $date_education_end = date("Y-m-d");
        }
        if($current_job == "on"){
            $date_job_end = date("Y-m-d");
        }

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
            $bugs = $bugs."No se puede subir una imagen tan pesada, el maximo es ".$maximun_file_size." bytes<br>";
        }else if($_FILES['picture']['name'] == ""){
            $name_file = '';
        }else{
            $bugs = $bugs."No se pudo subir la imagen.<br>";
        }
        
        if($bugs != ""){
            print "No se a podido realizar la inserccion por: <br>".$bugs;
        }else{
            if($file_upload){
                move_uploaded_file ($_FILES['picture']['tmp_name'], $path);
            }

            print "<a-scene>";
            print "<a-entity position='0 0.5 2.5'>
                        <a-camera></a-camera>
                    </a-entity>";
            switch ($design) {
                case "1":
                    if($file_upload){
                        print "<a-image id='photo' position='-0.8 3.25 0' src='".$path."' height='1.2' width='1.1' material='' visible=''></a-image>";
                    }
                    print "<a-entity id='user' text='value:".$first_name." ".$last_name."; width: 4; tabSize: 6; color:  #EF2D5E' position='1.9 3.75 0'></a-entity>";
                    print "<a-entity id='home' text='value:".$home.", ".$postal_code."; width: 2; color:  #4CC3D9' position='0.9 3.4 0'></a-entity>";
                    print "<a-entity id='country' text='value:".$city.", ".$country."; width: 2; color:  #4CC3D9' position='0.9 3.25 0'></a-entity>";
                    print "<a-entity id='phone' text='value:".$type_phone.": ".$number_phone."; width: 2; color:  #4CC3D9' position='0.9 3.1 0'></a-entity>";
                    print "<a-entity id='email' text='value:".$email."; width: 2; color:  #4CC3D9' position='0.9 2.95 0'></a-entity>";
                    
                    print "<a-entity id='studies' text='value: Estudios:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.37 2.45 0'></a-entity>";
                    print "<a-entity id='date_start1' text='value: ".$date_education_start."; width: 2; color: #4CC3D9' position='-0.35 2.25 0'></a-entity>";
                    print "<a-entity id='date_end1' text='value: ".$date_education_end."; width: 2; color: #4CC3D9' position='-0.35 2.15 0'></a-entity>";
                    print "<a-entity id='title' text='value: ".$title." en el centro ".$school_name." de ".$school_city." en ".$school_country.".; width: 2; color: #4CC3D9' position='0.2 2.25 0'></a-entity>";
                    print "<a-entity id='skils' text='value: -".$acquired_skills.".; width: 2; color: #4CC3D9' position='0.3 2.10 0'></a-entity>";
                    if(!(empty($job))){
                        print "<a-entity id='works' text='value: Esperiencia Laboral:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.37 1.8 0'></a-entity>";
                        print "<a-entity id='date_start2' text='value: ".$date_job_start."; width: 2; color: #4CC3D9' position='-0.35 1.6 0'></a-entity>";
                        print "<a-entity id='date_end2' text='value: ".$date_job_end."; width: 2; color: #4CC3D9' position='-0.35 1.5 0'></a-entity>";
                        print "<a-entity id='experience' text='value: ".$job." en ".$employer_name." de ".$employer_city." en ".$employer_country.".; width: 2; color: #4CC3D9' position='0.2 1.55 0'></a-entity>";

                        if($have_license){
                            print "<a-entity id='licenses' text='value: Carnet:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.37 1.2 0'></a-entity>";
                            print "<a-entity id='licenses_drive' text='value: ".$licenses."; width: 2; color: #4CC3D9' position='0.2 1.2 0'></a-entity>";
                            if(!(empty($other_skills))){
                                print "<a-entity id='other_skills' text='value: Otras habilidades:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.37 0.9 0'></a-entity>";
                                print "<a-entity id='skills' text='value: ".$other_skills." ; width: 2; color: #4CC3D9' position='-0.35 0.7 0'></a-entity>";
                            }
                        }else{
                            if(!(empty($other_skills))){
                                print "<a-entity id='other_skills' text='value: Otras habilidades:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.37 1.2 0'></a-entity>";
                                print "<a-entity id='skills' text='value: ".$other_skills." ; width: 2; color: #4CC3D9' position='-0.35 1 0'></a-entity>";
                            }
                        }
                    }else{
                        if($have_license){
                            print "<a-entity id='licenses' text='value: Carnet:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.37 1.8 0'></a-entity>";
                            print "<a-entity id='licenses_drive' text='value: ".$licenses."; width: 2; color: #4CC3D9' position='0.2 1.8 0'></a-entity>";
                            if(!(empty($other_skills))){
                                print "<a-entity id='other_skills' text='value: Otras habilidades:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.37 1.5 0'></a-entity>";
                                print "<a-entity id='skills' text='value: ".$other_skills.". ; width: 2; color: #4CC3D9' position='-0.35 1.3 0'></a-entity>";
                            }
                        }else{
                            if(!(empty($other_skills))){
                                print "<a-entity id='other_skills' text='value: Otras habilidades:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.37 1.8 0'></a-entity>";
                                print "<a-entity id='skills' text='value: ".$other_skills.". ; width: 2; color: #4CC3D9' position='-0.35 1.6 0'></a-entity>";
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