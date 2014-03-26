/**
 * Created by gilbertodemelo on 2014-03-22.
 */

/** Determine support for geolocation */
window.onload = function(){
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showError);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}


//Send JSON object using XMLHttp
var request = new XMLHttpRequest("POST", "Location.php?latitude="+pos.coords.latitude+"&longitude="+pos.coords.longitude, true);

function showError(error){
    switch(error.code){
        case error.PERMISSION_DENIED:
            alert("User denised the request for Geolocation");
            break;
        case error.POSITION_UNAVAILABLE:
            alert("Location information is unavailable.");
            break;
        case error.TIMEOUT:
            alert("The request to get user location timed out.");
            break;
        case error.UNKNOWN_ERR:
            alert("An unknown error occurred.");
            break;
    }
}