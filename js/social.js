$(document).ready(function() {

    var uid = localStorage.getItem('uid');
    var friends;
    $.ajax({
        type: 'POST',
        url:  '../mySQL2.php',
        data: {
            func: 'get_friend_list',
            uid : uid
        },
        dataType: 'json',
        success: function(response) {
            friends = eval(response);

            for (var i in friends) {
                $('#list').append('<div><h3>'+friends[i].name+'</h3>' + 
                                  '<div class = \'content\'>' + 
                                  '<div>character name:<p>'+friends[i].character+'</p></div>'+
                                  '<div>points:<p>'+friends[i].points+'</p></div>'+
                                  '<div>current position<p>'+friends[i].position+'</p></div>'+
                                  '<img src=\'../img/characters/' + friends[i].img +'\'/>' + 
                                  '<div class = \'long\'><p>'+friends[i].intro+'</p></div>'+
                                  '</br></br></div></div>');

            }

            $("#list").collapse({
                query: "div h3"
            });
        }
    });
});