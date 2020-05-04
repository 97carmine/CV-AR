import { checkHTTPS } from "./checkHTTPS.js";

export function getLocation() {
    if ( navigator.geolocation ) {
        if ( checkHTTPS() === "http:" ) {
            $( ".text_error" ).text( "You need HTTPS to access geolocation" );
            $( ".alert" ).show();
        } else {
            navigator.geolocation.getCurrentPosition(  obtainData, getError );
        }
    } else {
        $( ".text_error" ).text( "Geolocation is not supported by this browser" );
        $( ".alert" ).show();
    }
}

function getError( error ) {
    switch ( error.code ) {
        case error.PERMISSION_DENIED:
            $( ".text_error" ).text( "User denied the request for Geolocation" );
            break;
        case error.POSITION_UNAVAILABLE:
            $( ".text_error" ).text( "Location information is unavailable" );
            break;
        case error.TIMEOUT:
            $( ".text_error" ).text( "The request to get user location timed out" );
            break;
        case error.UNKNOWN_ERROR:
            $( ".text_error" ).text( "An unknown error occurred" );
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
            $( "input[name='home']" ).addClass( "is-invalid" );
        }
        $( "input[name = 'city']" ).val( file.address.city );
        $( "input[name = 'country']" ).val( file.address.country );
        $( "input[name = 'postal_code']" ).val( file.address.postcode );
        }, error: function( error ) {
            console.log( error.responseText );
                $( ".text_error" ).text(
                    "There was an error getting the information from OpenStreetMaps" );
            $( ".alert" ).show();
        }
    } );
}
