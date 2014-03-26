/**
 * Created by gilbertodemelo on 2014-03-22.
 */

window.onload = function(){
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(sendPosition, showError);
    }
}

function sendPosition(pos){
    ajax_post();
}

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


function ajax_post(){

    //Create the XMLHttpRequest object
    var request = new XMLHttpRequest("POST", "Location.php?latitude="+pos.coords.latitude+"&longitude="+pos.coords.longitude, true);
    var page = "location.php";
    request.open();
    request.send();

}