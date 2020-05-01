import { getLocation } from "../components/setGeolocalization.js";
import { obtainNum } from "../components/obtainNumDesign.js";

if ( obtainNum() >= 1 && obtainNum() <= 3 ) {
    $( "input[name ='design']" ).val( obtainNum() );
} else {
    location.href = "templates.html";
}

$( "#start-geolocalization" ).click( function() {
    getLocation();
    window.setTimeout( function() {
        $( ".alert" ).fadeOut( "slow" );
    }, 3000 );
} );
