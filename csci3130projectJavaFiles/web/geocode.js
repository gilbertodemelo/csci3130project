/**Determine support for geolocation */
window.onload = function(){
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
};

function showPosition(pos){
    document.write("Latitude: "+pos.coords.latitude+"\n Longitude: "+pos.coords.longitude);
}

function showError(error){
    switch(error.code){
        case error.PERMISSION_DENIED:
            alert("User denied the request for Geolocation.");
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

//JSON object to send to JSP
var JSONObject = {
    "latitude":pos.coords.latitude,
    "longitude":post.coords.longitude
};

//Send JSON object using the XMLHttp object
var request = new XMLHttpRequest("POST", "locationfinder.jsp", true);