function detect_languaje() {
    var idioma = navigator.language;
    return idioma;
}

function redirect( idioma ) {
    if ( detect_languaje() === "es-ES" ) {
        location.href = "es/index.html";
    } else {
        location.href = "en/index.html";
    }
}
