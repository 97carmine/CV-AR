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
            $( ".alert" ).removeAttr( "style" );
        } else {
            navigator.geolocation.getCurrentPosition(  obtainData, getError );
        }
    } else {
        if ( detectLanguaje() === "es-ES" ) {
            $( ".text_error" ).text( "La geolocalización no está soportada por este navegador." );
        } else {
            $( ".text_error" ).text( "Geolocation is not supported by this browser." );
        }
        $( ".alert" ).removeAttr( "style" );
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
    $( ".alert" ).removeAttr( "style" );
}

function obtainData( position ) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    var URL = `https://nominatim.openstreetmap.org/reverse?format=xml&lat=${latitude}&lon=${longitude}&accept-language=<browser language string>`;

    $.ajax( { url: URL, method: "GET", dataType: "XML", success: function( result ) {
        $( result ).find( "addressparts" ).each( function() {
            if ( $( this ).find( "road" ).length > 0 ) {
                $( this ).find( "road" ).each( function() {
                    $( "input[name ='home']" ).val( $( this ).text() );
                } );
            }
            $( this ).find( "city" ).each( function() {
                 $( "input[name ='city']" ).val( $( this ).text() );
            } );
            $( this ).find( "country" ).each( function() {
                $( "input[name ='country']" ).val( $( this ).text() );
            } );
            $( this ).find( "postcode" ).each( function() {
                $( "input[name ='zip']" ).val( $( this ).text() );
            } );
        } );
        }
    } );
}
