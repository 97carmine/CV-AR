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
            $( ".alert" ).show();
        } else {
            navigator.geolocation.getCurrentPosition(  obtainData, getError );
        }
    } else {
        if ( detectLanguaje() === "es-ES" ) {
            $( ".text_error" ).text( "La geolocalización no está soportada por este navegador." );
        } else {
            $( ".text_error" ).text( "Geolocation is not supported by this browser." );
        }
        $( ".alert" ).show();
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
    $( ".alert" ).show();
}

function obtainData( position ) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    var URL = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latitude}&lon=${longitude}&accept-language=<browser language string>`;

    $.ajax( { url: URL, method: "GET", dataType: "json", success: function( file ) {
        if ( $( file.address ).find( "road" ).length > 0 ) {
            $( "input[name='home']" ).val( file.address.road );
        } else {
            if ( detectLanguaje() === "es-ES" ) {
                $( ".text_error" ).text(
                    "Ha habido un error al obtener la información de la calle." );
            } else {
                $( ".text_error" ).text(
                    "There was an error obtaining the street information." );
            }
            $( ".alert" ).show();
        }
        $( "input[name = 'city']" ).val( file.address.city );
        $( "input[name = 'country']" ).val( file.address.country );
        $( "input[name = 'zip']" ).val( file.address.postcode );
        }, error: function( error ) {
            console.log( error.responseText );
            if ( detectLanguaje() === "es-ES" ) {
                $( ".text_error" ).text(
                    "Ha habido un error al obtener la información de OpenStreetMaps." );
            } else {
                $( ".text_error" ).text(
                    "There was an error getting the information from OpenStreetMaps." );
            }
            $( ".alert" ).show();
        }
    } );
}
