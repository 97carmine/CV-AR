function obtainURL() {
    var protocol = window.location.protocol;
    var hostname = window.location.hostname;

    var url = protocol + "//" + hostname + "/";
    return url;
}

$( "#link_example_1" ).attr( "href", obtainURL() + "examples/example_1.html" );
$( "#link_example_2" ).attr( "href", obtainURL() + "examples/example_2.html" );
$( "#link_example_3" ).attr( "href", obtainURL() + "examples/example_3.html" );
