function detectLanguaje() {
    var idioma = navigator.language;
    return idioma;
}

// eslint-disable-next-line no-unused-vars
function redirect( idioma ) {
    if ( detectLanguaje() === "es-ES" ) {
        location.href = "es/index.html";
    } else {
        location.href = "en/index.html";
    }
}
