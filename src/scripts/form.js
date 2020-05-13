import { compareDates } from "../components/compareDates.js";
import localization, { i18n } from "../components/localization.js";

localization();

if ( $( "input[name = 'design']" ).val() < 1 ||
    $( "input[name = 'design']" ).val() > 3 ) {
    location.href = "templates.php";
}

$( "input[name='home']" ).change( function() {
    $( this ).removeClass( "is-invalid" );
} );

$( "#start-geolocalization" ).click( function() {
    getLocation();
    window.setTimeout( function() {
        $( ".alert" ).fadeOut( "slow" );
    }, 3000 );
} );

$( ".custom-control-input" ).click( function() {
    setCurrent( "#current_job",  "input[name = 'date_job_end']" );
    setCurrent( "#current_education",  "input[name = 'date_education_end']" );
} );

$( ".check-end-date" ).change( function() {
    checkEndDate( "input[name = 'date_job_start']", "input[name = 'date_job_end']" );
    checkEndDate( "input[name = 'date_education_start']", "input[name = 'date_education_end']" );
} );

$( ".check-start-date" ).change( function() {
    checkStartDate( "input[name = 'date_job_start']", "input[name = 'date_job_end']" );
    checkStartDate( "input[name = 'date_education_start']", "input[name = 'date_education_end']" );
} );

function setCurrent( id, classChange ) {
    if ( $( id ).is( ":checked" ) ) {
        $( classChange ).val( "" );
        $( classChange ).attr( "readonly", true );
    } else {
        $( classChange ).removeAttr( "readonly" );
    }
}

function checkStartDate( startDate, endDate ) {
    if ( $( endDate ).val() !== "" && $( startDate ).val() !== "" &&
        compareDates( $( startDate ).val(), $( endDate ).val() ) === false ) {
        $( startDate ).addClass( "is-invalid" );
    } else {
        $( startDate ).removeClass( "is-invalid" );
    }
}

function checkEndDate( startDate, endDate ) {
    if ( $( endDate ).val() !== "" && $( startDate ).val() !== "" &&
        compareDates( $( startDate ).val(), $( endDate ).val() ) === false ) {
        $( endDate ).addClass( "is-invalid" );
    } else {
        $( endDate ).removeClass( "is-invalid" );
    }
}

function getLocation() {
    if ( navigator.geolocation ) {
        if ( window.location.protocol === "http:" ) {
            $( ".text_error" ).text( i18n.__( "You need HTTPS to access geolocation" ) );
            $( ".alert" ).show();
        } else {
            navigator.geolocation.getCurrentPosition(  obtainData, getError );
        }
    } else {
        $( ".text_error" ).text( i18n.__( "Geolocation is not supported by this browser" ) );
        $( ".alert" ).show();
    }
}

function getError( error ) {
    switch ( error.code ) {
        case error.PERMISSION_DENIED:
            $( ".text_error" ).text( i18n.__( "User denied the request for Geolocation" ) );
            break;
        case error.POSITION_UNAVAILABLE:
            $( ".text_error" ).text( i18n.__( "Location information is unavailable" ) );
            break;
        case error.TIMEOUT:
            $( ".text_error" ).text( i18n.__( "The request to get user location timed out" ) );
            break;
        case error.UNKNOWN_ERROR:
            $( ".text_error" ).text( i18n.__( "An unknown error occurred" ) );
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
            $( ".text_error" ).text( i18n.__( "There was an error getting the information from OpenStreetMaps" ) );
            $( ".alert" ).show();
        }
    } );
}
