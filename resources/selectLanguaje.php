<?php
    $locale = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);
    $supported_locales = [
        "es",
        "fr"
    ];
    
    if(array_search($locale, $supported_locales) != false) {
        $domain = "default";

        putenv("LC_ALL=" . $locale);
        setlocale(LC_ALL, $locale);
        bindtextdomain($domain, "../locale");
        textdomain($domain);
    }
?>