import { checkHTTPS } from "./checkHTTPS.js";
import { detectLanguaje } from "./detectLanguaje.js";

export function getLocation() {
    if ( navigator.geolocation ) {
        if ( checkHTTPS() === "http:" ) {
            if ( detectLanguaje() === "es-ES" ) {
                $( ".text_error" ).text( "Necesita HTTPS para acceder a la geolocalización." );
            } else {
                $( ".text_error" ).text( "You need HTTPS to access geolocation." );
            }
            $( ".alert" ).removeAttr( "hidden" );
        } else {
            navigator.geolocation.getCurrentPosition(  obtainData, getError );
        }
    } else {
        if ( detectLanguaje() === "es-ES" ) {
            $( ".text_error" ).text( "La geolocalización no está soportada por este navegador." );
        } else {
            $( ".text_error" ).text( "Geolocation is not supported by this browser." );
        }
        $( ".alert" ).removeAttr( "hidden" );
    }
}

function getError( error ) {
    switch ( error.code ) {
        case error.PERMISSION_DENIED:
            if ( detectLanguaje() === "es-ES" ) {
                $( ".text_error" ).text( "Ha denegado la consulta para la geolocalización." );
            } else {
                $( ".text_error" ).text( "User denied the request for Geolocation." );
            }
            break;
        case error.POSITION_UNAVAILABLE:
            if ( detectLanguaje() === "es-ES" ) {
                $( ".text_error" ).text( "La información de ubicación no está disponible." );
            } else {
                $( ".text_error" ).text( "Location information is unavailable." );
            }
            break;
        case error.TIMEOUT:
            if ( detectLanguaje() === "es-ES" ) {
                $( ".text_error" ).text(
                    "Se agotó el tiempo de espera de la solicitud para obtener la ubicación."
                    );
            } else {
                $( ".text_error" ).text( "The request to get user location timed out." );
            }
            break;
        case error.UNKNOWN_ERROR:
            if ( detectLanguaje() === "es-ES" ) {
                $( ".text_error" ).text( "Un error desconocido ocurrió." );
            } else {
                $( ".text_error" ).text( "An unknown error occurred." );
            }
            break;
    }
    $( ".alert" ).removeAttr( "hidden" );
}


function obtainData( position ) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    var URL = `https://nominatim.openstreetmap.org/reverse?format=xml&lat=${latitude}&lon=${longitude}&accept-language=<browser language string>`;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if ( this.readyState === 4 && this.status === 200 ) {
            writeForm( this );
        }
    };
    xhttp.open( "GET", URL, true );
    xhttp.send();
}

function writeForm( xml ) {
    var xmlDoc = xml.responseXML;
    var xmlData = xmlDoc.getElementsByTagName( "addressparts" );
    for ( var i = 0; i < xmlData.length; i++ ) {
        if ( xmlData[ i ].getElementsByTagName( "road" ).length > 0 ) {
            $( "input[name ='home']" ).val(
                xmlData[ i ].getElementsByTagName( "road" )[ 0 ].childNodes[ 0 ].nodeValue
                );
        }
        $( "input[name ='city']" ).val(
            xmlData[ i ].getElementsByTagName( "city" )[ 0 ].childNodes[ 0 ].nodeValue
            );
        $( "input[name ='country']" ).val(
            xmlData[ i ].getElementsByTagName( "country" )[ 0 ].childNodes[ 0 ].nodeValue
            );
        $( "input[name ='zip']" ).val(
            xmlData[ i ].getElementsByTagName( "postcode" )[ 0 ].childNodes[ 0 ].nodeValue
            );
    }
}
