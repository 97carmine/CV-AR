export function obtainNum() {
    var URL = window.location.search.substring( 1 );
    var parms = URL.split( "#" );
    var qsParm = [];
    for ( var i = 0; i < parms.length; i++ ) {
        var pos = parms[ i ].indexOf( "=" );
        if ( pos > 0 ) {
            var key = parms[ i ].substring( 0, pos );
            var value = parms[ i ].substring( pos + 1 );
            qsParm[ key ] = value;
        }
    }
    return value;
}
