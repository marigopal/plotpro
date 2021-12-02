
function location_autocomplete(){

    if (navigator.geolocation) {

        try {
            
            navigator.geolocation.getCurrentPosition(showPosition);
            locateMap();
        }
        catch {
            locateMap();
        }
    }
    else {
        alert("Sorry! your browser is not supporting")
    }
}


function showPosition(position) {
    $('#land_latitude').val(position.coords.latitude);
    $('#land_longitude').val(position.coords.longitude);
    //locateMap();
}

function locateMap() {
    land_location
    var input = document.getElementById('land_location');
    var autocomplete = new google.maps.places.Autocomplete(input);
    
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            return;
        } 
        $('#land_latitude').val(place.geometry.location.lat());
        $('#land_longitude').val(place.geometry.location.lng());
        $('#land_location').val(place.formatted_address);
 

    });
     
 
 

}