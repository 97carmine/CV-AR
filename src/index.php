<?php
$lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);

if ($lang == "es"){
    header('Location: es/index.html');
} else { 
    header('Location: en/index.html');
}
?>