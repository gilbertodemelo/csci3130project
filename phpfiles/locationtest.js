var currPosition;

navigator.geolocation.getCurrentPosition(function(position){
    updatePosition(position);
    setInterval(function(){
       var latitude = currPosition.coords.latitude;
       var longitude = currPosition.coords.longitude;
        $.ajax({
            type: "POST",
            url: "location.php",
            data: 'x='+latitude+'&y='+longitude,
            cache: false
        });
    }, 1000);
}, errorCallback);

var watchID = navigator.geolocation.watchPosition(function(position) {
    updatePosition(position);

});

function updatePosition(position){
    currPosition = position;
}

function errorCallback(error){
    var msg = "Can't get your location. Error = ";
    if(error.code == 1)
        msg += "PERMISSION_DENIED";
    else if(error.code == 2)
        msg += "POSITION_UNAVAILABLE";
    else if(error.code == 3)
        msg += "TIMEOUT";
    msg += ", msg = "+error.message;

    alert(msg);
}