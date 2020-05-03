import { getLocation } from "../components/setGeolocalization.js";
import { obtainNum } from "../components/obtainNumDesign.js";
import { compareDates } from "../components/compareDates.js";

if ( obtainNum() >= 1 && obtainNum() <= 3 ) {
    $( "input[name='design']" ).val( obtainNum() );
} else {
    location.href = "templates.html";
}

$( "#start-geolocalization" ).click( function() {
    getLocation();
    window.setTimeout( function() {
        $( ".alert" ).fadeOut( "slow" );
    }, 3000 );
} );

$( ".custom-control-input" ).click( function() {
    setCurrent( "#current_job",  "input[name='date_job_end']" );
    setCurrent( "#current_education",  "input[name='date_education_end']" );
} );

$( ".check-end-date" ).change( function() {
    checkEndDate( "input[name='date_job_start']", "input[name='date_job_end']" );
    checkEndDate( "input[name='date_education_start']", "input[name='date_education_end']" );
} );

$( ".check-start-date" ).change( function() {
    checkStartDate( "input[name='date_job_start']", "input[name='date_job_end']" );
    checkStartDate( "input[name='date_education_start']", "input[name='date_education_end']" );
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
