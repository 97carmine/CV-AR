<html>
<head>
    <link rel="stylesheet" href="../src/css/bootstrap.min.css">
</head>
<body>
<?PHP
session_start();
if(isset($_SESSION['login'])){
    if (isset($_POST['cancel'])){
        @$resume = $_POST["resume1"];
        @$design = $_POST["design"];
        @$picture = $_POST["picture"];
        unlink($resume.".php");
        unlink($picture);
        header("Location:../src/form.php?design=".$design);
    }
    if (isset($_POST['generate'])){
        @$resume1 = $_POST["resume1"];
        @$resume2 = $_POST["resume2"];
        @$picture = $_POST["picture"];
        
        require '../src/libraries/simple_html_dom/simple_html_dom.php';

        $html = file_get_html("../src/CVs/".$resume2.".php");
        $head = $html->find("head",0);
        $body = $html->find("body",0);
        
        $resume11 = $resume1."2";
        $resume2 = $resume2."2";
        $fp = fopen($resume11.".php", "a+");
        fputs($fp, "<html>\r\n<head>\r\n");
        fputs($fp, "<script src='../libraries/aframe.min.js'></script>\r\n");
        fputs($fp, "<script src='../libraries/aframe-ar.js'></script>\r\n");
        fputs($fp, "</head>\r\n");
        
        $scene = $body->find("a-scene",0);
        $entity = $scene->find("a-entity");
        $text = $scene->find("a-text");

        fputs($fp, "<body style='margin : 0px; overflow: hidden;'>\r\n");
        fputs($fp, $body->find("a-assets",0)."\r\n");
        fputs($fp, "<a-scene embedded arjs>\r\n");
        fputs($fp, "<a-marker preset='hiro'>\r\n");
        fputs($fp, "<a-entity position='0 0 10'><a-camera></a-camera></a-entity>\r\n");
        fputs($fp, $scene->find("a-image",0)."\r\n");
        for($i=1;$i<count($entity);$i++){
            if(!(empty($entity[$i]->text))){
                fputs($fp, "<a-entity id='".$entity[$i]->id."' text='".$entity[$i]->text."' position='".$entity[$i]->position."' rotation='".$entity[$i]->rotation."' scale='".$entity[$i]->scale."'></a-entity>\r\n");
            }else{
                fputs($fp, $entity[$i]."\r\n");
            }
        }
        for($j=0;$j<count($text);$j++){
            fputs($fp, "<a-text id='".$text[$j]->id."' rotation='".$text[$j]->rotation."' value='".$text[$j]->value."' position='".$text[$j]->position."' color='".$text[$j]->color."' font='".$text[$j]->font."' tabsize='".$text[$j]->tabsize."' width='".$text[$j]->width."' scale='".$text[$j]->scale."'></a-text>\r\n");
        }
        fputs($fp, "</a-marker>\r\n</a-scene>\r\n</body>\r\n</html>\r\n");
        fclose($fp);
        
        $conexion = mysqli_connect ("localhost", "root", "") or die ("No se puede conectar con el servidor");
        mysqli_select_db ($conexion,"cv-ar") or die ("No se puede seleccionar la base de datos");
        
        $consulta = mysqli_query ($conexion, "INSERT INTO curriculums(usuario, cv) VALUES ('".$_SESSION['login']."','CVs/".$resume2.".php')") or die ("Fallo en la consulta de usuarios 2");
        mysqli_close($conexion);
        
        header('Location:../src/register.php');
        unlink($resume1.".php");
    }
    if (isset($_POST['send'])){
        @$design = $_POST["design"];
        @$first_name = $_POST["first_name"];
        @$last_name = $_POST["last_name"];
        @$home = $_POST["home"];
        @$city = $_POST["city"];
        @$country = $_POST["country"];
        @$postal_code = $_POST["postal_code"];
        @$type_phone = str_replace("_"," ",$_POST["type_phone"]);
        @$number_phone = $_POST["number_phone"];
        @$email = $_POST["email"];
        @$date_job_start1 = $_POST["date_job_start_1"];
        @$date_job_end1 = $_POST["date_job_end_1"];
        @$current_job1 = $_POST["current_job_1"];
        @$job1 = $_POST["job_1"];
        @$employer_name1 = $_POST["employer_name_1"];
        @$employer_city1 = $_POST["employer_city_1"];
        @$employer_country1 = $_POST["employer_country_1"];
        @$date_job_start2 = $_POST["date_job_start_2"];
        @$date_job_end2 = $_POST["date_job_end_2"];
        @$current_job2 = $_POST["current_job_2"];
        @$job2 = $_POST["job_2"];
        @$employer_name2 = $_POST["employer_name_2"];
        @$employer_city2 = $_POST["employer_city_2"];
        @$employer_country2 = $_POST["employer_country_2"];
        @$date_education_start1 = $_POST["date_education_start_1"];
        @$date_education_end1 = $_POST["date_education_end_1"];
        @$current_education1 = $_POST["current_education_1"];
        @$title1 = $_POST["title_1"];
        @$school_name1 = $_POST["school_name_1"];
        @$school_city1 = $_POST["school_city_1"];
        @$school_country1 = $_POST["school_country_1"];
        @$acquired_skills1 = $_POST["acquired_skills_1"];
        @$date_education_start2 = $_POST["date_education_start_2"];
        @$date_education_end2 = $_POST["date_education_end_2"];
        @$current_education2 = $_POST["current_education_2"];
        @$title2 = $_POST["title_2"];
        @$school_name2 = $_POST["school_name_2"];
        @$school_city2 = $_POST["school_city_2"];
        @$school_country2 = $_POST["school_country_2"];
        @$acquired_skills2 = $_POST["acquired_skills_2"];
        @$drive_license = $_POST["drive_license"];
        @$other_skills = $_POST["other_skills"];
    
        @$num_licenses = count($drive_license);
        $have_license = false;
        $licenses = "";
        if($num_licenses != 0){
            $have_license = true;
            $licenses = $licenses.str_replace("_"," ",$drive_license[0]);
            for($i=1;$i<$num_licenses;$i++){
                $licenses = $licenses.", ".str_replace("_"," ",$drive_license[$i]);
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

            fputs($fp, "<html>\r\n<head>\r\n<script src='../libraries/aframe.min.js'></script>\r\n</head>\r\n<body style='margin: 0px; overflow: hidden;'>\r\n");

            switch ($design) {
                case "1":
                    fputs($fp, "<a-scene>\r\n<a-entity position='0 0 2'><a-camera></a-camera></a-entity>\r\n");
                    fputs($fp, "<a-entity><a-plane color='black' position='0 0 -0.2' scale='15 15 1'></a-plane></a-entity>");
                    if($file_upload){
                        fputs($fp, "<a-image id='photo' position='-0.4 2.65 0' src='".$path2."' height='1.2' width='1.1' material='' visible=''></a-image>\r\n");
                    }
                    fputs($fp, "<a-entity id='user' text='value:".$first_name." ".$last_name."; width: 4; tabSize: 6; color:  #EF2D5E' position='2.4 3.15 0'></a-entity>\r\n");
                    fputs($fp, "<a-entity id='home' text='value:".$home.", ".$postal_code."; width: 2; color:  #4CC3D9' position='1.43 2.8 0'></a-entity>\r\n");
                    fputs($fp, "<a-entity id='country' text='value:".$city.", ".$country."; width: 2; color:  #4CC3D9' position='1.43 2.65 0'></a-entity>\r\n");
                    fputs($fp, "<a-entity id='phone' text='value:".$type_phone.": ".$number_phone."; width: 2; color:  #4CC3D9' position='1.43 2.5 0'></a-entity>\r\n");
                    fputs($fp, "<a-entity id='email' text='value:".$email."; width: 2; color:  #4CC3D9' position='1.43 2.35 0'></a-entity>\r\n");

                    if ((!(empty($title1)))&&(!(empty($title2)))){
                        fputs($fp, "<a-entity id='studies' text='value: <?=_('Studies')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.95 0'></a-entity>\r\n");
                        fputs($fp, "<a-entity id='date_start1' text='value: ".$date_education_start1."; width: 2; color: #4CC3D9' position='0.04 1.75 0'></a-entity>\r\n");
                        if($current_education1 == "on"){
                            fputs($fp, "<a-entity id='title1' text='value: <?=_('Studying ')?>".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".; width: 2; color: #4CC3D9' position='0.6 1.75 0'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end1' text='value: ".$date_education_end1."; width: 2; color: #4CC3D9' position='0.04 1.65 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='title1' text='value: ".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".; width: 2; color: #4CC3D9' position='0.6 1.75 0'></a-entity>\r\n");
                        }
                        fputs($fp, "<a-entity id='skills1' text='value: ".$acquired_skills1.".; width: 2; color: #4CC3D9' position='0.65 1.60 0'></a-entity>\r\n");

                        fputs($fp, "<a-entity id='date_start2' text='value: ".$date_education_start2."; width: 2; color: #4CC3D9' position='0.04 1.4 0'></a-entity>\r\n");
                        if($current_education2 == "on"){
                            fputs($fp, "<a-entity id='title2' text='value: <?=_('Studying ')?>".$title2."<?=_(' in ')?>".$school_name2."<?=_(' of ')?>".$school_city2."<?=_(' in ')?>".$school_country2.".; width: 2; color: #4CC3D9' position='0.6 1.35 0'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end2' text='value: ".$date_education_end2."; width: 2; color: #4CC3D9' position='0.04 1.3 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='title2' text='value: ".$title2."<?=_(' in ')?>".$school_name2."<?=_(' of ')?>".$school_city2."<?=_(' in ')?>".$school_country2.".; width: 2; color: #4CC3D9' position='0.6 1.35 0'></a-entity>\r\n");
                        }
                        fputs($fp, "<a-entity id='skills2' text='value: ".$acquired_skills2.".; width: 2; color: #4CC3D9' position='0.65 1.20 0'></a-entity>\r\n");

                        if($have_license){
                            fputs($fp, "<a-entity id='licenses' text='value: <?=_('Licenses')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 0.9 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='licenses_drive' text='value: ".$licenses.".; width: 2; color: #4CC3D9' position='0.7 0.9 0'></a-entity>\r\n");
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 0.7 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 0.5 0'></a-entity>\r\n");
                            }
                        }else{
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 0.9 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 0.7 0'></a-entity>\r\n");
                            }
                        }
                    }else if((!(empty($job1)))&&(!(empty($job2)))){
                        fputs($fp, "<a-entity id='works' text='value: <?=_('Work experience')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.95 0'></a-entity>\r\n");
                        fputs($fp, "<a-entity id='date_start1' text='value: ".$date_education_start1."; width: 2; color: #4CC3D9' position='0.04 1.75 0'></a-entity>\r\n");
                        if($current_job1 == "on"){
                            fputs($fp, "<a-entity id='experience1' text='value: Trabajando de ".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".; width: 2; color: #4CC3D9' position='0.6 1.75 0'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end1' text='value: ".$date_job_end1."; width: 2; color: #4CC3D9' position='0.04 1.65 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='experience1' text='value: ".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".; width: 2; color: #4CC3D9' position='0.6 1.75 0'></a-entity>\r\n");
                        }

                        fputs($fp, "<a-entity id='date_start2' text='value: ".$date_job_start1."; width: 2; color: #4CC3D9' position='0.04 1.3 0'></a-entity>\r\n");
                        if($current_job2 == "on"){
                            fputs($fp, "<a-entity id='experience2' text='value: Trabajando de ".$job2."<?=_(' in ')?>".$employer_name2."<?=_(' of ')?>".$employer_city2."<?=_(' in ')?>".$employer_country2.".; width: 2; color: #4CC3D9' position='0.6 1.25 0'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end2' text='value: ".$date_job_end2."; width: 2; color: #4CC3D9' position='0.04 1. 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='experience2' text='value: ".$job2."<?=_(' in ')?>".$employer_name2."<?=_(' of ')?>".$employer_city2."<?=_(' in ')?>".$employer_country2.".; width: 2; color: #4CC3D9' position='0.6 1.25 0'></a-entity>\r\n");
                        }
                        if($have_license){
                            fputs($fp, "<a-entity id='licenses' text='value: <?=_('Licenses')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 0.9 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='licenses_drive' text='value: ".$licenses.".; width: 2; color: #4CC3D9' position='0.7 0.9 0'></a-entity>\r\n");
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 0.7 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 0.5 0'></a-entity>\r\n");
                            }
                        }else{
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 0.9 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 0.7 0'></a-entity>\r\n");
                            }
                        }
                    }else if((!(empty($title1)))&&(!(empty($job1)))){
                        fputs($fp, "<a-entity id='studies' text='value: <?=_('Studies')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.95 0'></a-entity>\r\n");
                        fputs($fp, "<a-entity id='date_start1' text='value: ".$date_education_start1."; width: 2; color: #4CC3D9' position='0.04 1.75 0'></a-entity>\r\n");
                        if($current_education1 == "on"){
                            fputs($fp, "<a-entity id='title' text='value: <?=_('Studying ')?>".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".; width: 2; color: #4CC3D9' position='0.6 1.75 0'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end1' text='value: ".$date_education_end1."; width: 2; color: #4CC3D9' position='0.04 1.65 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='title' text='value: ".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".; width: 2; color: #4CC3D9' position='0.6 1.75 0'></a-entity>\r\n");
                        }
                        fputs($fp, "<a-entity id='skills1' text='value: ".$acquired_skills1.".; width: 2; color: #4CC3D9' position='0.65 1.60 0'></a-entity>\r\n");

                        fputs($fp, "<a-entity id='works' text='value: <?=_('Work experience')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.3 0'></a-entity>\r\n");
                        fputs($fp, "<a-entity id='date_start2' text='value: ".$date_job_start1."; width: 2; color: #4CC3D9' position='0.04 1.10 0'></a-entity>\r\n");
                        if($current_job1 == "on"){
                            fputs($fp, "<a-entity id='experience' text='value: <?=_('Working from ')?>".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".; width: 2; color: #4CC3D9' position='0.6 1.05 0'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end2' text='value: ".$date_job_end1."; width: 2; color: #4CC3D9' position='0.04 1 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='experience' text='value: ".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".; width: 2; color: #4CC3D9' position='0.6 1.05 0'></a-entity>\r\n");
                        }
                        if($have_license){
                            fputs($fp, "<a-entity id='licenses' text='value: <?=_('Licenses')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 0.7 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='licenses_drive' text='value: ".$licenses.".; width: 2; color: #4CC3D9' position='0.7 0.7 0'></a-entity>\r\n");
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 0.5 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 0.3 0'></a-entity>\r\n");
                            }
                        }else{
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 0.7 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 0.5 0'></a-entity>\r\n");
                            }
                        }
                    }else if(!(empty($title1))){
                        fputs($fp, "<a-entity id='studies' text='value: <?=_('Studies')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.95 0'></a-entity>\r\n");
                        fputs($fp, "<a-entity id='date_start1' text='value: ".$date_education_start1."; width: 2; color: #4CC3D9' position='0.04 1.75 0'></a-entity>\r\n");

                        if($current_education1 == "on"){
                            fputs($fp, "<a-entity id='title' text='value: <?=_('Studying ')?>".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".; width: 2; color: #4CC3D9' position='0.6 1.75 0'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end1' text='value: ".$date_education_end1."; width: 2; color: #4CC3D9' position='0.04 1.65 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='title' text='value: ".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".; width: 2; color: #4CC3D9' position='0.6 1.75 0'></a-entity>\r\n");
                        }
                        fputs($fp, "<a-entity id='skills1' text='value: ".$acquired_skills1.".; width: 2; color: #4CC3D9' position='0.65 1.60 0'></a-entity>\r\n");
                        
                        if($have_license){
                            fputs($fp, "<a-entity id='licenses' text='value: <?=_('Licenses')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.3 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='licenses_drive' text='value: ".$licenses.".; width: 2; color: #4CC3D9' position='0.7 1.3 0'></a-entity>\r\n");
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 1.1 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 0.9 0'></a-entity>\r\n");
                            }
                        }else{
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 1.3 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 1.1 0'></a-entity>\r\n");
                            }
                        }
                    }else if(!(empty($job1))){
                        fputs($fp, "<a-entity id='works' text='value: <?=_('Work experience')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.95 0'></a-entity>\r\n");
                        fputs($fp, "<a-entity id='date_start2' text='value: ".$date_job_start1."; width: 2; color: #4CC3D9' position='0.04 1.75 0'></a-entity>\r\n");
                        if($current_job1 == "on"){
                            fputs($fp, "<a-entity id='experience' text='value: <?=_('Working from ')?>".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".; width: 2; color: #4CC3D9' position='0.6 1.75 0'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end2' text='value: ".$date_job_end1."; width: 2; color: #4CC3D9' position='0.04 1.65 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='experience' text='value: ".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".; width: 2; color: #4CC3D9' position='0.6 1.75 0'></a-entity>\r\n");
                        }
                        if($have_license){
                            fputs($fp, "<a-entity id='licenses' text='value: <?=_('Licenses')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.3 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='licenses_drive' text='value: ".$licenses.".; width: 2; color: #4CC3D9' position='0.7 1.3 0'></a-entity>\r\n");
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 1.1 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 0.9 0'></a-entity>\r\n");
                            }
                        }else{
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.77 1.3 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: #4CC3D9' position='0.04 1.1 0'></a-entity>\r\n");
                            }
                        }
                    }else{

                    }
                break;
                case "2":
                    fputs($fp, "<a-assets><img id='fondo' src='../img/example_2/fondo.png'></a-assets>\r\n");
                    fputs($fp, "<a-scene>\r\n<a-entity position='0 0 2.6'><a-camera></a-camera></a-entity>\r\n");
                    fputs($fp, "<a-entity><a-plane position='0 0 -1' scale='15 15 1'></a-plane></a-entity>\r\n");
                    fputs($fp, "<a-entity><a-plane material='src:#fondo;' position='0 1.6 -0.5' scale='4.85 5.15 1'></a-plane></a-entity>\r\n");
                    fputs($fp, "<a-entity><a-sphere material='color:blue;' scale='0.08 0.08 0.08' position='-0.35 2.55 0.8'></a-sphere></a-entity>\r\n
                                <a-entity rotation='0 0 0' animation='property: rotation; to: 360 0 0; loop: true; dur: 5000'  scale='0.05 0.05 0.05' position='-0.35 2.6 0.75'><a-sphere position='0 1 -3' scale='0.5 0.5 0.5'></a-sphere></a-entity>\r\n
                                <a-entity rotation='0 0 0' animation='property: rotation; to: 0 360 0; loop: true; dur: 5000'  scale='0.05 0.05 0.05' position='-0.35 2.5 0.8'><a-sphere position='0 1 -3' scale='0.5 0.5 0.5'></a-sphere></a-entity>\r\n
                                <a-entity rotation='0 0 0' animation='property: rotation; to: 0 0 360; loop: true; dur: 5000'  scale='0.1 0.1 0.1' position='-0.35 2.55 1.1'><a-sphere position='0 1 -3' scale='0.2 0.2 0.2'></a-sphere></a-entity>\r\n");
                    fputs($fp, "<a-entity><a-sphere material='color:blue;' scale='0.08 0.08 0.08' position='1 1.55 0.8'></a-sphere></a-entity>\r\n
                                <a-entity rotation='0 0 0' animation='property: rotation; to: 360 0 0; loop: true; dur: 5000'  scale='0.05 0.05 0.05' position='1 1.55 0.75'><a-sphere position='0 1 -3' scale='0.5 0.5 0.5'></a-sphere></a-entity>\r\n
                                <a-entity rotation='0 0 0' animation='property: rotation; to: 0 360 0; loop: true; dur: 5000'  scale='0.05 0.05 0.05' position='1 1.5 0.8'><a-sphere position='0 1 -3' scale='0.5 0.5 0.5'></a-sphere></a-entity>\n\r
                                <a-entity rotation='0 0 0' animation='property: rotation; to: 0 0 360; loop: true; dur: 5000'  scale='0.1 0.1 0.1' position='1 1.55 1.1'><a-sphere position='0 1 -3' scale='0.2 0.2 0.2'></a-sphere></a-entity>\r\n");
                    if($file_upload){
                        fputs($fp, "<a-image id='photo' position='-1.45 3.1 0' src='".$path2."' height='1' width='0.8' material='' visible=''></a-image>\r\n");
                    }
                    fputs($fp, "<a-entity id='user' text='value:".$first_name." ".$last_name."; width: 4; tabSize: 6' position='1 3.5 0'></a-entity>\r\n");
                    fputs($fp, "<a-entity id='home' text='value:".$home.", ".$postal_code."; width: 2' position='-0.86 2.5 0'></a-entity>\r\n");
                    fputs($fp, "<a-entity id='country' text='value:".$city.", ".$country."; width: 2' position='-0.86 2.35 0'></a-entity>\r\n");
                    fputs($fp, "<a-entity id='phone' text='value:".$type_phone.": ".$number_phone."; width: 2' position='-0.86 2.2 0'></a-entity>\r\n");
                    fputs($fp, "<a-entity id='email' text='value:".$email."; width: 2' position='-0.86 2.05 0'></a-entity>\r\n");

                    if ((!(empty($title1)))&&(!(empty($title2)))){
                        fputs($fp, "<a-entity id='studies' text='value: <?=_('Studies')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='-0.75 1.4 0' rotation='0 0 48'></a-entity>\r\n");
                        fputs($fp, "<a-entity id='date_start1' text='value: ".$date_education_start1."; width: 2; color: black' position='-1.12 0.74 0' rotation='0 0 48'></a-entity>\r\n");
                        if($current_education1 == "on"){
                            fputs($fp, "<a-entity id='title1' text='value: <?=_('Studying ')?>".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".; width: 2; color: black' position='-0.8 1.1 0' rotation='0 0 48'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end1' text='value: ".$date_education_end1."; width: 2; color: black' position='-1.03 0.64 0' rotation='0 0 48'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='title1' text='value: ".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".; width: 2; color: black' position='-0.8 1.1 0' rotation='0 0 48'></a-entity>\r\n");
                        }
                        fputs($fp, "<a-entity id='skills1' text='value: ".$acquired_skills1.".; width: 2; color: black' position='-0.7 1 0' rotation='0 0 48'></a-entity>\r\n");

                        fputs($fp, "<a-entity id='date_start2' text='value: ".$date_education_start2."; width: 2; color: black' position='0.47 2.63 0' rotation='0 0 49'></a-entity>\r\n");
                        if($current_education2 == "on"){
                            fputs($fp, "<a-entity id='title2' text='value: <?=_('Studying ')?>".$title2."<?=_(' in ')?>".$school_name2."<?=_(' of ')?>".$school_city2."<?=_(' in ')?>".$school_country2.".; width: 2; color: black' position='0.8 2.95 0' rotation='0 0 49' scale='0.9'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end2' text='value: ".$date_education_end2."; width: 2; color: black' position='0.57 2.53 0' rotation='0 0 49'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='title2' text='value: ".$title2."<?=_(' in ')?>".$school_name2."<?=_(' of ')?>".$school_city2."<?=_(' in ')?>".$school_country2.".; width: 2; color: black' position='0.8 2.95 0' rotation='0 0 49' scale='0.9'></a-entity>\r\n");
                        }
                        fputs($fp, "<a-entity id='skills2' text='value: ".$acquired_skills2.".; width: 2; color: black' position='0.95 2.9 0' rotation='0 0 49'></a-entity>\r\n");

                        if($have_license){
                            fputs($fp, "<a-entity id='licenses' text='value: <?=_('Licenses')?>:; width: 3.5; tabSize: 6; color: black' position='2 0.7 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='licenses_drive' text='value: ".$licenses.".; width: 2; color: black' position='1.85 0.7 0'></a-entity>\r\n");
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: black' position='1.65 0.35 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: black' position='0.92 0.2 0'></a-entity>\r\n");
                            }
                        }else{
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: black' position='2 0.7 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: black' position='1.27 0.55 0'></a-entity>\r\n");
                            }
                        }
                    }else if((!(empty($job1)))&&(!(empty($job2)))){
                        fputs($fp, "<a-entity id='works' text='value: <?=_('Work experience')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='-0.75 1.4 0' rotation='0 0 48'></a-entity>\r\n");
                        fputs($fp, "<a-entity id='date_start1' text='value: ".$date_job_start1."; width: 2; color: black' position='-1.12 0.74 0' rotation='0 0 48'></a-entity>\r\n");
                        if($current_job1 == "on"){
                            fputs($fp, "<a-entity id='title1' text='value: <?=_('Working from ')?>".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".; width: 2; color: black' position='-0.8 1.1 0' rotation='0 0 48'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end1' text='value: ".$date_job_end1."; width: 2; color: black' position='-1.03 0.64 0' rotation='0 0 48'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='title1' text='value: ".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".; width: 2; color: black' position='-0.8 1.1 0' rotation='0 0 48'></a-entity>\r\n");
                        }

                        fputs($fp, "<a-entity id='date_start2' text='value: ".$date_job_start2."; width: 2; color: black' position='0.47 2.63 0' rotation='0 0 49'></a-entity>\r\n");
                        if($current_job2 == "on"){
                            fputs($fp, "<a-entity id='title2' text='value: <?=_('Working from ')?>".$job2."<?=_(' in ')?>".$employer_name2."<?=_(' of ')?>".$employer_city2."<?=_(' in ')?>".$employer_country2.".; width: 2; color: black' position='0.8 2.95 0' rotation='0 0 49' scale='0.9'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end2' text='value: ".$date_job_end2."; width: 2; color: black' position='0.57 2.53 0' rotation='0 0 49'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='title2' text='value: ".$job2."<?=_(' in ')?>".$employer_name2."<?=_(' of ')?>".$employer_city2."<?=_(' in ')?>".$employer_country2.".; width: 2; color: black' position='0.8 2.95 0' rotation='0 0 49' scale='0.9'></a-entity>\r\n");
                        }
                        
                        if($have_license){
                            fputs($fp, "<a-entity id='licenses' text='value: <?=_('Licenses')?>:; width: 3.5; tabSize: 6; color: black' position='2 0.7 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='licenses_drive' text='value: ".$licenses.".; width: 2; color: black' position='1.85 0.7 0'></a-entity>\r\n");
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: black' position='1.65 0.35 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: black' position='0.92 0.2 0'></a-entity>\r\n");
                            }
                        }else{
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: black' position='2 0.7 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: black' position='1.27 0.55 0'></a-entity>\r\n");
                            }
                        }
                    }else if((!(empty($title1)))&&(!(empty($job1)))){
                        fputs($fp, "<a-entity id='studies' text='value: <?=_('Studies')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='-0.75 1.4 0' rotation='0 0 48'></a-entity>\r\n");
                        fputs($fp, "<a-entity id='date_start1' text='value: ".$date_education_start1."; width: 2; color: black' position='-1.12 0.74 0' rotation='0 0 48'></a-entity>\r\n");
                        if($current_education1 == "on"){
                            fputs($fp, "<a-entity id='title1' text='value: <?=_('Studying ')?>".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".; width: 2; color: black' position='-0.8 1.1 0' rotation='0 0 48'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end1' text='value: ".$date_education_end1."; width: 2; color: black' position='-1.03 0.64 0' rotation='0 0 48'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='title1' text='value: ".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".; width: 2; color: black' position='-0.8 1.1 0' rotation='0 0 48'></a-entity>\r\n");
                        }
                        fputs($fp, "<a-entity id='skills1' text='value: ".$acquired_skills1.".; width: 2; color: black' position='-0.7 1 0' rotation='0 0 48'></a-entity>\r\n");

                        fputs($fp, "<a-entity id='works' text='value: "._('Work experience').":; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.85 3.3 0' rotation='0 0 49'></a-entity>");
                        fputs($fp, "<a-entity id='date_start2' text='value: ".$date_job_start1."; width: 2; color: black' position='0.47 2.63 0' rotation='0 0 49'></a-entity>\r\n");
                        if($current_job1 == "on"){
                            fputs($fp, "<a-entity id='title2' text='value: <?=_('Working from ')?>".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".; width: 2; color: black' position='0.8 2.95 0' rotation='0 0 49' scale='0.9'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end2' text='value: ".$date_job_end1."; width: 2; color: black' position='0.57 2.53 0' rotation='0 0 49'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='title2' text='value: ".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".; width: 2; color: black' position='0.8 2.95 0' rotation='0 0 49' scale='0.9'></a-entity>\r\n");
                        }

                        if($have_license){
                            fputs($fp, "<a-entity id='licenses' text='value: <?=_('Licenses')?>:; width: 3.5; tabSize: 6; color: black' position='2 0.7 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='licenses_drive' text='value: ".$licenses.".; width: 2; color: black' position='1.85 0.7 0'></a-entity>\r\n");
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: black' position='1.65 0.35 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: black' position='0.92 0.2 0'></a-entity>\r\n");
                            }
                        }else{
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: black' position='2 0.7 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: black' position='1.27 0.55 0'></a-entity>\r\n");
                            }
                        }
                    }else if(!(empty($title1))){
                        fputs($fp, "<a-entity id='studies' text='value: <?=_('Studies')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.3 2.7 0' rotation='0 0 49'></a-entity>\r\n");
                        fputs($fp, "<a-entity id='date_start1' text='value: ".$date_education_start1."; width: 2; color: black' position='-0.09 2.05 0' rotation='0 0 49'></a-entity>\r\n");
                        if($current_education1 == "on"){
                            fputs($fp, "<a-entity id='title1' text='value: <?=_('Studying ')?>".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".; width: 2; color: black' position='0.3 2.4 0' rotation='0 0 49'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end1' text='value: ".$date_education_end1."; width: 2; color: black' position='0 1.95 0' rotation='0 0 49'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='title1' text='value: ".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".; width: 2; color: black' position='0.3 2.4 0' rotation='0 0 49'></a-entity>\r\n");
                        }
                        fputs($fp, "<a-entity id='skills1' text='value: ".$acquired_skills1.".; width: 2; color: black' position='0.4 2.3 0' rotation='0 0 49'></a-entity>\r\n");

                        if($have_license){
                            fputs($fp, "<a-entity id='licenses' text='value: <?=_('Licenses')?>:; width: 3.5; tabSize: 6; color: black' position='2 0.7 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='licenses_drive' text='value: ".$licenses.".; width: 2; color: black' position='1.85 0.7 0'></a-entity>\r\n");
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: black' position='1.65 0.35 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: black' position='0.92 0.2 0'></a-entity>\r\n");
                            }
                        }else{
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: black' position='2 0.7 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: black' position='1.27 0.55 0'></a-entity>\r\n");
                            }
                        }
                    }else if(!(empty($job1))){
                        fputs($fp, "<a-entity id='works' text='value: <?=_('Work experience')?>:; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.3 2.7 0' rotation='0 0 49'></a-entity>\r\n");
                        fputs($fp, "<a-entity id='date_start1' text='value: ".$date_job_start1."; width: 2; color: black' position='-0.09 2.05 0' rotation='0 0 49'></a-entity>\r\n");
                        if($current_job1 == "on"){
                            fputs($fp, "<a-entity id='title1' text='value: <?=_('Working from ')?>".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".; width: 2; color: black' position='0.3 2.4 0' rotation='0 0 49'></a-entity>\r\n");
                        }else{
                            fputs($fp, "<a-entity id='date_end1' text='value: ".$date_job_end1."; width: 2; color: black' position='0 1.95 0' rotation='0 0 49'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='title1' text='value: ".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".; width: 2; color: black' position='0.3 2.4 0' rotation='0 0 49'></a-entity>\r\n");
                        }

                        if($have_license){
                            fputs($fp, "<a-entity id='licenses' text='value: <?=_('Licenses')?>:; width: 3.5; tabSize: 6; color: black' position='2 0.7 0'></a-entity>\r\n");
                            fputs($fp, "<a-entity id='licenses_drive' text='value: ".$licenses.".; width: 2; color: black' position='1.85 0.7 0'></a-entity>\r\n");
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: black' position='1.65 0.35 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: black' position='0.92 0.2 0'></a-entity>\r\n");
                            }
                        }else{
                            if(!(empty($other_skills))){
                                fputs($fp, "<a-entity id='other_skills' text='value: <?=_('Other skills')?>:; width: 3.5; tabSize: 6; color: black' position='2 0.7 0'></a-entity>\r\n");
                                fputs($fp, "<a-entity id='skills3' text='value: ".$other_skills."; width: 2; color: black' position='1.27 0.55 0'></a-entity>\r\n");
                            }
                        }
                    }else{

                    }
                break;
                case "3":
                    fputs($fp, "<a-assets><img id='fondo' src='../img/example_3/muro.jpg'><img id='fondo_normal' src='../img/example_3/muro_normal.png'></a-assets>\r\n");
                    fputs($fp, "<a-scene>\r\n<a-entity position='0 0 2.6'><a-camera></a-camera></a-entity>\r\n");
                    fputs($fp, "<a-entity><a-plane position='0 0 -1' scale='15 15 1' material='src:#fondo; normal-map:#fondo_normal; repeat: 7 7 1; normal-texture-repeat: 7 7 1'></a-plane></a-entity>\r\n");
                    if($file_upload){
                        fputs($fp, "<a-image id='photo' position='-0.13 1.8 0' scale='0.55 0.55 1' src='".$path2."' height='1.2' width='1.1' material='' visible='' animation='property: scale; to: 1.25 1.4 1; dur: 2500'></a-image>\r\n");
                    }
                    fputs($fp, "<a-text id='user' rotation='0 0 30' value='".$first_name." ".$last_name."' position='-2.2 2.75 0' color='black' font='mozillavr' tabSize='6' width='6'></a-text>\r\n");
                    fputs($fp, "<a-text id='home' rotation='0 0 -13' value='".$home.", ".$postal_code."' position='-0.85 3.3 0' color='black'   font='mozillavr' tabSize='6' width='3'></a-text>\r\n");
                    fputs($fp, "<a-text id='country' rotation='0 0 -13' value='".$city.", ".$country."' position='-0.9 3.15 0' color='black'   font='mozillavr' tabSize='6' width='3'></a-text>\r\n");
                    fputs($fp, "<a-text id='phone' rotation='0 0 25' value='".$type_phone.": ".$number_phone."' position='0.35 3.15 0' color='black'  font='mozillavr' tabSize='6' width='3'></a-text>\r\n");
                    fputs($fp, "<a-text id='email' rotation='0 0 25' value='".$email."' position='0.55 3.05 0' color='black' font='mozillavr' tabSize='6' width='3'></a-text>\r\n");
                    
                    if ((!(empty($title1)))&&(!(empty($title2)))){
                        fputs($fp, "<a-text id='studies' rotation='0 0 30' value='<?=_('Studies')?>' position='-2.1 0 0' color='black'   font='mozillavr' tabSize='6' width='5.5'></a-text>\r\n");
                        fputs($fp, "<a-text id='date_start1' rotation='0 0 30' value='".$date_education_start1."' position='-2 -0.25 0' color='black' font='mozillavr' tabSize='6' width='2.5'></a-text>\r\n");
                        if($current_education1 == "on"){
                            fputs($fp, "<a-text id='title1' rotation='0 0 30' value='<?=_('Studying ')?>".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".' position='-1.4 0 0' color='black' font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        }else{
                            fputs($fp, "<a-text id='date_end1' rotation='0 0 30' value='".$date_education_end1."' position='-1.96 -0.35 0' color='black' font='mozillavr' tabSize='6' width='2.5'></a-text>\r\n");
                            fputs($fp, "<a-text id='title1' rotation='0 0 30' value='".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".' position='-1.4 0 0' color='black' font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        }
                        fputs($fp, "<a-text id='skills1' rotation='0 0 30' value='".$acquired_skills1.".' position='-1.3 -0.2 0' color='black' font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        fputs($fp, "<a-text id='date_start2' rotation='0 0 30' value='".$date_education_start2."' position='-0.2 -0.25 0' color='black'   font='mozillavr' tabSize='6' width='2.5'></a-text>\r\n");
                        if($current_education2 == "on"){
                            fputs($fp, "<a-text id='title2' rotation='0 0 30' value='<?=_('Studying ')?>".$title2."<?=_(' in ')?>".$school_name2."<?=_(' of ')?>".$school_city2."<?=_(' in ')?>".$school_country2.".' position='0.4 0 0' color='black'   font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        }else{
                            fputs($fp, "<a-text id='date_end2' rotation='0 0 30' value='".$date_education_end2."' position='-0.16 -0.35 0' color='black' font='mozillavr' tabSize='6' width='2.5'></a-text>\r\n");
                            fputs($fp, "<a-text id='title2' rotation='0 0 30' value='".$title2."<?=_(' in ')?>".$school_name2."<?=_(' of ')?>".$school_city2."<?=_(' in ')?>".$school_country2.".' position='0.4 0 0' color='black'   font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        }
                        fputs($fp, "<a-text id='skilss2' rotation='0 0 30' value='".$acquired_skills2."' position='0.5 -0.2 0' color='black'   font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        if($have_license){
                            fputs($fp, "<a-text id='licenses' rotation='0 0 35' value='<?=_('Licenses')?>' position='-2.1 1.9 0' color='black' font='mozillavr' tabSize='6' width='5.5'></a-text>\r\n");
                            fputs($fp, "<a-text id='licenses_drive' rotation='0 0 -13' value='".$licenses.".' position='-1.6 1.95 0' color='black'   font='mozillavr' tabSize='6' width='3'></a-text>\r\n");
                        }
                        if(!(empty($other_skills))){
                            fputs($fp, "<a-text id='other_skills' rotation='0 0 35' value='<?=_('Other skills')?>' position='0.55 2 0' color='black'   font='mozillavr' tabSize='6' width='5'></a-text>\r\n");
                            fputs($fp, "<a-text id='skils3' rotation='0 0 35' position='0.6 1.65 0' scale='0.75' value='".$other_skills.".' color='black'   font='mozillavr' tabSize='6' width='2.4'></a-text>\r\n");
                        }
                    }else if ((!(empty($job1)))&&(!(empty($job2)))){
                        fputs($fp, "<a-text id='works' rotation='0 0 30' value='<?=_('Work experience')?>' position='-2.1 0 0' color='black'   font='mozillavr' tabSize='6' width='5.5'></a-text>\r\n");
                        fputs($fp, "<a-text id='date_start1' rotation='0 0 30' value='".$date_job_start1."' position='-2 -0.25 0' color='black' font='mozillavr' tabSize='6' width='2.5'></a-text>\r\n");
                        if($current_job1 == "on"){
                            fputs($fp, "<a-text id='experience1' rotation='0 0 30' value='<?=_('Working from ')?>".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".' position='-1.4 0 0' color='black' font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        }else{
                            fputs($fp, "<a-text id='date_end1' rotation='0 0 30' value='".$date_job_end1."' position='-1.96 -0.35 0' color='black' font='mozillavr' tabSize='6' width='2.5'></a-text>\r\n");
                            fputs($fp, "<a-text id='experience1' rotation='0 0 30' value='".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".' position='-1.4 0 0' color='black' font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        }
                        fputs($fp, "<a-text id='date_start2' rotation='0 0 30' value='".$date_job_start2."' position='-0.2 -0.25 0' color='black'   font='mozillavr' tabSize='6' width='2.5'></a-text>\r\n");
                        if($current_job2 == "on"){
                            fputs($fp, "<a-text id='experience2' rotation='0 0 30' value='<?=_('Working from ')?>".$job2."<?=_(' in ')?>".$employer_name2."<?=_(' of ')?>".$employer_city2."<?=_(' in ')?>".$employer_country2.".' position='0.4 0 0' color='black'   font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        }else{
                            fputs($fp, "<a-text id='date_end2' rotation='0 0 30' value='".$date_job_end2."' position='-0.16 -0.35 0' color='black' font='mozillavr' tabSize='6' width='2.5'></a-text>\r\n");
                            fputs($fp, "<a-text id='experience2' rotation='0 0 30' value='".$job2."<?=_(' in ')?>".$employer_name2."<?=_(' of ')?>".$employer_city2."<?=_(' in ')?>".$employer_country2.".' position='0.4 0 0' color='black'   font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        }
                        if($have_license){
                            fputs($fp, "<a-text id='licenses' rotation='0 0 35' value='<?=_('Licenses')?>' position='-2.1 1.9 0' color='black' font='mozillavr' tabSize='6' width='5.5'></a-text>\r\n");
                            fputs($fp, "<a-text id='licenses_drive' rotation='0 0 -13' value='".$licenses.".' position='-1.6 1.95 0' color='black'   font='mozillavr' tabSize='6' width='3'></a-text>\r\n");
                        }
                        if(!(empty($other_skills))){
                            fputs($fp, "<a-text id='other_skills' rotation='0 0 35' value='<?=_('Other skills')?>' position='0.55 2 0' color='black'   font='mozillavr' tabSize='6' width='5'></a-text>\r\n");
                            fputs($fp, "<a-text id='skils3' rotation='0 0 35' position='0.6 1.65 0' scale='0.75' value='".$other_skills.".' color='black'   font='mozillavr' tabSize='6' width='2.4'></a-text>\r\n");
                        }
                    }else if ((!(empty($title1)))&&(!(empty($job1)))){
                        fputs($fp, "<a-text id='studies' rotation='0 0 30' value='<?=_('Studies')?>' position='-2.1 0 0' color='black'   font='mozillavr' tabSize='6' width='5.5'></a-text>\r\n");
                        fputs($fp, "<a-text id='date_start1' rotation='0 0 30' value='".$date_education_start1."' position='-2 -0.25 0' color='black' font='mozillavr' tabSize='6' width='2.5'></a-text>\r\n");
                        if($current_education1 == "on"){
                            fputs($fp, "<a-text id='title1' rotation='0 0 30' value='<?=_('Studying ')?>".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".' position='-1.4 0 0' color='black' font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        }else{
                            fputs($fp, "<a-text id='date_end1' rotation='0 0 30' value='".$date_education_end1."' position='-1.96 -0.35 0' color='black' font='mozillavr' tabSize='6' width='2.5'></a-text>\r\n");
                            fputs($fp, "<a-text id='title1' rotation='0 0 30' value='".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".' position='-1.4 0 0' color='black' font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        }
                        fputs($fp, "<a-text id='skills1' rotation='0 0 30' value='".$acquired_skills1.".' position='-1.3 -0.2 0' color='black' font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");

                        fputs($fp, "<a-text id='works' rotation='0 0 30' value='<?=('Work experience')?>' position='-0.3 0 0' color='black' font='mozillavr' tabSize='6' width='5.5'></a-text>\r\n");
                        fputs($fp, "<a-text id='date_start2' rotation='0 0 30' value='".$date_job_start1."' position='-0.2 -0.25 0' color='black'   font='mozillavr' tabSize='6' width='2.5'></a-text>\r\n");
                        if($current_job1 == "on"){
                            fputs($fp, "<a-text id='experience' rotation='0 0 30' value='<?=_('Working from ')?>".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".' position='0.4 0 0' color='black'   font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        }else{
                            fputs($fp, "<a-text id='date_end2' rotation='0 0 30' value='".$date_job_end1."' position='-0.16 -0.35 0' color='black' font='mozillavr' tabSize='6' width='2.5'></a-text>\r\n");
                            fputs($fp, "<a-text id='experience' rotation='0 0 30' value='".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".' position='0.4 0 0' color='black'   font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        }
                        if($have_license){
                            fputs($fp, "<a-text id='licenses' rotation='0 0 35' value='<?=_('Licenses')?>' position='-2.1 1.9 0' color='black' font='mozillavr' tabSize='6' width='5.5'></a-text>\r\n");
                            fputs($fp, "<a-text id='licenses_drive' rotation='0 0 -13' value='".$licenses.".' position='-1.6 1.95 0' color='black'   font='mozillavr' tabSize='6' width='3'></a-text>\r\n");
                        }
                        if(!(empty($other_skills))){
                            fputs($fp, "<a-text id='other_skills' rotation='0 0 35' value='<?=_('Other skills')?>' position='0.55 2 0' color='black'   font='mozillavr' tabSize='6' width='5'></a-text>\r\n");
                            fputs($fp, "<a-text id='skils3' rotation='0 0 35' position='0.6 1.65 0' scale='0.75' value='".$other_skills.".' color='black'   font='mozillavr' tabSize='6' width='2.4'></a-text>\r\n");
                        }
                    }else if (!(empty($title1))){
                        fputs($fp, "<a-text id='studies' rotation='0 0 30' value='<?=_('Studies')?>' position='-1.6 0 0' color='black'   font='mozillavr' tabSize='6' width='5.5'></a-text>\r\n");
                        fputs($fp, "<a-text id='date_start1' rotation='0 0 30' value='".$date_education_start1."' position='-1.4 -0.25 0' color='black' font='mozillavr' tabSize='6' width='2.5'></a-text>\r\n");
                        if($current_education1 == "on"){
                            fputs($fp, "<a-text id='title1' rotation='0 0 30' value='<?=_('Studying ')?>".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".' position='-0.8 0 0' color='black' font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        }else{
                            fputs($fp, "<a-text id='date_end1' rotation='0 0 30' value='".$date_education_end1."' position='-1.36 -0.35 0' color='black' font='mozillavr' tabSize='6' width='2.5'></a-text>\r\n");
                            fputs($fp, "<a-text id='title1' rotation='0 0 30' value='".$title1."<?=_(' in ')?>".$school_name1."<?=_(' of ')?>".$school_city1."<?=_(' in ')?>".$school_country1.".' position='-0.8 0 0' color='black' font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        }
                        fputs($fp, "<a-text id='skills1' rotation='0 0 30' value='".$acquired_skills1.".' position='-0.7 -0.2 0' color='black' font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        if($have_license){
                            fputs($fp, "<a-text id='licenses' rotation='0 0 35' value='<?=_('Licenses')?>' position='-2.1 1.9 0' color='black' font='mozillavr' tabSize='6' width='5.5'></a-text>\r\n");
                            fputs($fp, "<a-text id='licenses_drive' rotation='0 0 -13' value='".$licenses.".' position='-1.6 1.95 0' color='black'   font='mozillavr' tabSize='6' width='3'></a-text>\r\n");
                        }
                        if(!(empty($other_skills))){
                            fputs($fp, "<a-text id='other_skills' rotation='0 0 35' value='<?=_('Other skills')?>' position='0.55 2 0' color='black'   font='mozillavr' tabSize='6' width='5'></a-text>\r\n");
                            fputs($fp, "<a-text id='skils3' rotation='0 0 35' position='0.6 1.65 0' scale='0.75' value='".$other_skills.".' color='black'   font='mozillavr' tabSize='6' width='2.4'></a-text>\r\n");
                        }
                    }else if (!(empty($job1))){
                        fputs($fp, "<a-text id='works' rotation='0 0 30' value='<?=('Work experience')?>' position='-1.6 0 0' color='black' font='mozillavr' tabSize='6' width='5.5'></a-text>\r\n");
                        fputs($fp, "<a-text id='date_start2' rotation='0 0 30' value='".$date_job_start1."' position='-1.4 -0.25 0' color='black'   font='mozillavr' tabSize='6' width='2.5'></a-text>\r\n");
                        if($current_job1 == "on"){
                            fputs($fp, "<a-text id='experience' rotation='0 0 30' value='<?=_('Working from ')?>".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".' position='-0.8 0 0' color='black'   font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        }else{
                            fputs($fp, "<a-text id='date_end2' rotation='0 0 30' value='".$date_job_end1."' position='-1.36 -0.35 0' color='black' font='mozillavr' tabSize='6' width='2.5'></a-text>\r\n");
                            fputs($fp, "<a-text id='experience' rotation='0 0 30' value='".$job1."<?=_(' in ')?>".$employer_name1."<?=_(' of ')?>".$employer_city1."<?=_(' in ')?>".$employer_country1.".' position='-0.8 0 0' color='black'   font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>\r\n");
                        }
                        
                        if($have_license){
                            fputs($fp, "<a-text id='licenses' rotation='0 0 35' value='<?=_('Licenses')?>' position='-2.1 1.9 0' color='black' font='mozillavr' tabSize='6' width='5.5'></a-text>\r\n");
                            fputs($fp, "<a-text id='licenses_drive' rotation='0 0 -13' value='".$licenses.".' position='-1.6 1.95 0' color='black'   font='mozillavr' tabSize='6' width='3'></a-text>\r\n");
                        }
                        if(!(empty($other_skills))){
                            fputs($fp, "<a-text id='other_skills' rotation='0 0 35' value='<?=_('Other skills')?>' position='0.55 2 0' color='black'   font='mozillavr' tabSize='6' width='5'></a-text>\r\n");
                            fputs($fp, "<a-text id='skils3' rotation='0 0 35' position='0.6 1.65 0' scale='0.75' value='".$other_skills.".' color='black'   font='mozillavr' tabSize='6' width='2.4'></a-text>\r\n");
                        }
                    }else{

                    }
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
                        print "<input type='hidden' name='design' value=".$design.">";
                        print "<input type='hidden' name='picture' value=".$path1.">";
                        print "<div class='col-12'>";
                        print "<button type='submit' name='generate' class='btn btn-outline-dark m-5'>"._('Generate')."</button>";
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
}else{
    header('Location:../src/index.php');
}
?>
</body>
</html>