<?php
    $locale = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,5);
    putenv("LC_ALL=$locale");
    setlocale(LC_ALL, $locale);
    bindtextdomain("default", "../locale");
    textdomain("default");
?>