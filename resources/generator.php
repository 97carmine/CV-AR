<html>
<head>
    <link rel="stylesheet" href="../src/css/bootstrap.min.css">
</head>
<body>
<?PHP
    if (isset($_POST['cancel'])){
        @$resume = $_POST["resume1"];
        @$design = $_POST["design"];
        @$picture = $_POST["picture"];
        unlink($resume.".php");
        unlink($picture);
        header("Location:../src/form.php?design=".$design);
    }
    if (isset($_POST['download'])){
        @$resume1 = $_POST["resume1"];
        @$resume2 = $_POST["resume2"];
        @$first_name = $_POST["first_name"];
        @$picture = $_POST["picture"];
        @$picture_name = $_POST["picture_name"];
        
        require '../src/libraries/simple_html_dom/simple_html_dom.php';

        $html = file_get_html("../src/CVs/".$resume2.".php");
        $head = $html->find("head",0);
        $body = $html->find("body",0);

        $resume1 = $resume1."2";
        $fp = fopen($resume1.".html", "a+");
        fputs($fp, "<html>\r\n<head>");
        foreach ($head->find("meta") as $meta) {
            fputs($fp, $meta."\r\n");
        }
        fputs($fp, "<script src='../libraries/aframe.min.js'></script>");
        fputs($fp, "<script src='../libraries/aframe-ar.js'></script>");
        foreach ($head->find("style") as $style) {
            fputs($fp, $style."\r\n");
        }
        fputs($fp, "</head>");
        fputs($fp, $body);
        fputs($fp, "</html>");
        fclose($fp);

        $zip = new ZipArchive();
        $zip->open($resume1.'.zip', ZipArchive::CREATE);
        $zip->addFile($resume1.".html","cv/CV_".$first_name.".html");
        $zip->addFile($picture,"img/users/".$picture_name);
        $zip->addFile("../src/libraries/aframe.min.js","libraries/aframe.min.js");
        $zip->addFile("../src/libraries/aframe-ar.js","libraries/aframe-ar.js");
        $zip->close();

        print ""; 
    }
    if (isset($_POST['send'])){
        @$design = $_POST["design"];
        @$first_name = $_POST["first_name"];
        @$last_name = $_POST["last_name"];
        @$home = $_POST["home"];
        @$city = $_POST["city"];
        @$country = $_POST["country"];
        @$postal_code = $_POST["postal_code"];
        @$type_phone = $_POST["type_phone"];
        @$number_phone = $_POST["number_phone"];
        @$email = $_POST["email"];
        @$date_job_start = $_POST["date_job_start_1"];
        @$date_job_end = $_POST["date_job_end_1"];
        @$current_job = $_POST["current_job_1"];
        @$job = $_POST["job_1"];
        @$employer_name = $_POST["employer_name_1"];
        @$employer_city = $_POST["employer_city_1"];
        @$employer_country = $_POST["employer_country_1"];
        @$date_education_start = $_POST["date_education_start_1"];
        @$date_education_end = $_POST["date_education_end_1"];
        @$current_education = $_POST["current_education_1"];
        @$title = $_POST["title_1"];
        @$school_name = $_POST["school_name_1"];
        @$school_city = $_POST["school_city_1"];
        @$school_country = $_POST["school_country_1"];
        @$acquired_skills = $_POST["acquired_skills_1"];
        @$drive_license = $_POST["drive_license"];
        @$other_skills = $_POST["other_skills"];
    
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
        $path1 = "";
        if (is_uploaded_file ($_FILES['picture']['tmp_name'])){
            $folder1 = "../src/img/users/";
            $folder2 = "../img/users/";
            $name_file = $_FILES['picture']['name'];
            $file_upload = true;
            $path1 = $folder1.$name_file;
            if (is_file($path1)){
                $name_file = time()."_".$name_file;
            }
            $path1 = $folder1.$name_file;
            $path2 = $folder2.$name_file;
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
            header("Refresh:3; url=../src/form.php");
        }else{
            if($file_upload){
                move_uploaded_file ($_FILES['picture']['tmp_name'], $path1);
            }
            $cv = time();
            $folder_cv = "../src/CVs/";
            $fp = fopen($folder_cv.$cv.".php", "a+");

            fputs($fp, "<html>\r\n<head>\r\n<script src='../libraries/aframe.min.js'></script>\r\n</head>\r\n<body>\r\n");
            fputs($fp, "<a-scene>\r\n");
            fputs($fp, "<a-entity position='0 0.5 2'><a-camera></a-camera></a-entity>\r\n");

            switch ($design) {
                case "1":
                    if($file_upload){
                        fputs($fp, "<a-image id='photo' position='-0.4 3.15 0' src='".$path2."' height='1.2' width='1.1' material='' visible=''></a-image>\r\n");
                    }
                    fputs($fp, "<a-entity id='user' text='value:".$first_name." ".$last_name."; width: 4; tabSize: 6; color:  #EF2D5E' position='2.4 3.65 0'></a-entity>\r\n");
                    fputs($fp, "<a-entity id='home' text='value:".$home.", ".$postal_code."; width: 2; color:  #4CC3D9' position='1.43 3.3 0'></a-entity>\r\n");
                    fputs($fp, "<a-entity id='country' text='value:".$city.", ".$country."; width: 2; color:  #4CC3D9' position='1.43 3.15 0'></a-entity>\r\n");
                    fputs($fp, "<a-entity id='phone' text='value:".$type_phone.": ".$number_phone."; width: 2; color:  #4CC3D9' position='1.43 3 0'></a-entity>\r\n");
                    fputs($fp, "<a-entity id='email' text='value:".$email."; width: 2; color:  #4CC3D9' position='1.43 2.85 0'></a-entity>\r\n");

                    if((!(empty($title)))&&(!(empty($job)))){
                        fputs($fp, "<a-entity id='studies' text='value: <?=_('Studies')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 2.45 0'></a-entity>\r\n");
                        fputs($fp, "<a-entity id='date_start1' text='value: ".$date_education_start."; width: 2; color: #4CC3D9' position='0.04 2.25 0'></a-entity>\r\n");
                        if($current_education == "on"){
                            fputs($fp, "<a-entity id='title' text='value: <?=_('Studying ')?>".$title."<?=_(' in ')?>".$school_name."<?=_(' of ')?>".$school_city."<?=_(' in ')?>".$school_country.".; width: 2; color: #4CC3D9' position='0.6 2.25 0'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end1' text='value: ".$date_education_end."; width: 2; color: #4CC3D9' position='0.04 2.15 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='title' text='value: ".$title."<?=_(' in ')?>".$school_name."<?=_(' of ')?>".$school_city."<?=_(' in ')?>".$school_country.".; width: 2; color: #4CC3D9' position='0.6 2.25 0'></a-entity>\r\n");
                        }
                        fputs($fp, "<a-entity id='skills1' text='value: ".$acquired_skills.".; width: 2; color: #4CC3D9' position='0.65 2.10 0'></a-entity>\r\n");

                        fputs($fp, "<a-entity id='works' text='value: <?=_('Work experience')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.8 0'></a-entity>\r\n");
                        fputs($fp, "<a-entity id='date_start2' text='value: ".$date_job_start."; width: 2; color: #4CC3D9' position='0.04 1.60 0'></a-entity>\r\n");
                        if($current_job == "on"){
                            fputs($fp, "<a-entity id='experience' text='value: <?=_('Working from ')?>".$job."<?=_(' in ')?>".$employer_name."<?=_(' of ')?>".$employer_city."<?=_(' in ')?>".$employer_country.".; width: 2; color: #4CC3D9' position='0.6 1.55 0'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end2' text='value: ".$date_job_end."; width: 2; color: #4CC3D9' position='0.04 1.5 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='experience' text='value: ".$job."<?=_(' in ')?>".$employer_name."<?=_(' of ')?>".$employer_city."<?=_(' in ')?>".$employer_country.".; width: 2; color: #4CC3D9' position='0.6 1.55 0'></a-entity>\r\n");
                        }
                        if($have_license){
                            fputs($fp, "<a-entity id='licenses' text='value: <?=_('Licenses')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.2 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='licenses_drive' text='value: ".$licenses.".; width: 2; color: #4CC3D9' position='0.7 1.2 0'></a-entity>\r\n");
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 1 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills2' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 0.8 0'></a-entity>\r\n");
                            }
                        }else{
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 1.2 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills2' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 1 0'></a-entity>\r\n");
                            }
                        }
                    }else if(!(empty($title))){
                        fputs($fp, "<a-entity id='studies' text='value: <?=_('Studies')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 2.45 0'></a-entity>\r\n");
                        fputs($fp, "<a-entity id='date_start1' text='value: ".$date_education_start."; width: 2; color: #4CC3D9' position='0.04 2.25 0'></a-entity>\r\n");

                        if($current_education == "on"){
                            fputs($fp, "<a-entity id='title' text='value: <?=_('Studying ')?>".$title."<?=_(' in ')?>".$school_name."<?=_(' of ')?>".$school_city."<?=_(' in ')?>".$school_country.".; width: 2; color: #4CC3D9' position='0.6 2.25 0'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end1' text='value: ".$date_education_end."; width: 2; color: #4CC3D9' position='0.04 2.15 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='title' text='value: ".$title."<?=_(' in ')?>".$school_name."<?=_(' of ')?>".$school_city."<?=_(' in ')?>".$school_country.".; width: 2; color: #4CC3D9' position='0.6 2.25 0'></a-entity>\r\n");
                        }
                        fputs($fp, "<a-entity id='skills1' text='value: ".$acquired_skills.".; width: 2; color: #4CC3D9' position='0.65 2.10 0'></a-entity>\r\n");
                        
                        if($have_license){
                            fputs($fp, "<a-entity id='licenses' text='value: <?=_('Licenses')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.8 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='licenses_drive' text='value: ".$licenses.".; width: 2; color: #4CC3D9' position='0.7 1.8 0'></a-entity>\r\n");
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 1.6 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills2' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 1.4 0'></a-entity>\r\n");
                            }
                        }else{
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 1.8 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills2' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 1.6 0'></a-entity>\r\n");
                            }
                        }
                    }else if(!(empty($job))){
                        fputs($fp, "<a-entity id='works' text='value: <?=_('Work experience')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 2.45 0'></a-entity>\r\n");
                        fputs($fp, "<a-entity id='date_start2' text='value: ".$date_job_start."; width: 2; color: #4CC3D9' position='0.04 2.25 0'></a-entity>\r\n");
                        if($current_job == "on"){
                            fputs($fp, "<a-entity id='experience' text='value: <?=_('Working from ')?>".$job."<?=_(' in ')?>".$employer_name."<?=_(' of ')?>".$employer_city."<?=_(' in ')?>".$employer_country.".; width: 2; color: #4CC3D9' position='0.6 2.25 0'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end2' text='value: ".$date_job_end."; width: 2; color: #4CC3D9' position='0.04 2.15 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='experience' text='value: ".$job."<?=_(' in ')?>".$employer_name."<?=_(' of ')?>".$employer_city."<?=_(' in ')?>".$employer_country.".; width: 2; color: #4CC3D9' position='0.6 2.25 0'></a-entity>\r\n");
                        }
                        if($have_license){
                            fputs($fp, "<a-entity id='licenses' text='value: <?=_('Licenses')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.8 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='licenses_drive' text='value: ".$licenses.".; width: 2; color: #4CC3D9' position='0.7 1.8 0'></a-entity>\r\n");
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 1.6 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills2' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 1.4 0'></a-entity>\r\n");
                            }
                        }else{
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 1.8 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills2' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 1.6 0'></a-entity>\r\n");
                            }
                        }
                    }else{

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
            fputs($fp, "</a-scene>\r\n");
            fputs($fp, "</body>\r\n</html>");
            fclose($fp);

            print "<div class='row' style='height:100%;'>";
                print "<div class='col-md-2 py-5 my-5 d-flex align-items-center'>";
                    print "<div class='row'>";
                    print "<form action='generator.php' method='post'>";
                        print "<input type='hidden' name='resume1' value=".$folder_cv.$cv.">";
                        print "<input type='hidden' name='resume2' value=".$cv.">";
                        print "<input type='hidden' name='first_name' value=".$first_name.">";
                        print "<input type='hidden' name='design' value=".$design.">";
                        print "<input type='hidden' name='picture' value=".$path1.">";
                        print "<input type='hidden' name='picture_name' value=".$name_file.">";
                        print "<div class='col-12'>";
                        print "<button type='submit' name='download' class='btn btn-outline-dark m-5'>"._('Download')."</button>";
                        print "</div>";
                        print "<div class='col-12'>";
                        print "<button type='submit' name='cancel' class='btn btn-outline-* m-5'>"._('Cancel')."</button>";
                        print "</div>";
                    print "</form>";
                    print "</div>";
                print "</div>";
                print "<div class='col-md-9'>";
                    print "<iframe src='".$folder_cv.$cv.".php' width='100%' height='100%'></iframe>";
                print "</div>";
            print "</div>";
        }
    }
?>
</body>
</html>