$(document).ready(function() {

    var uid = localStorage.getItem('uid');
    var friends;
    /**
     * display part of the user profile
     * @param  {text} response) {                     info = eval(response);          $('#header').html('<img src='../images/characters/' + info[1].head + '' id ='photo'/>' +                             '<p id ='name'>SOCIAL</p>');        }    } [description]
     * @return
     */
     $.ajax({
        type: 'POST',
        url:  '../mySQL2.php',
        data: {
            func: 'get_profile',
            uid : uid
        },
        dataType: 'json',
        success: function(response) {
          info = eval(response);
          $('#header').html('<img src=\'../images/characters/' + info[1].head + '\' id =\'photo\'/>' + 
                            '<p id =\'name\'>SOCIAL</p>');
        }
    });
     /**
      * display all friends and their head portrait
      * @param  {text} response) {                       friends = eval(response);            $('#header').append('<p id = 'at'>friends <span id = 'position'>' + friends.length + '</span></p>');            for (var i in friends) {                $('#container').append('<p><img src = '../images/characters/' + friends[i].head + '' class = 'friend_head'/>' +                   '<span class = 'attr'>' + friends[i].name + '</span>' +                   '<span class = 'icon' data-icon = 'A'/></p>');            }            $('#container').append('<br/><br/><br/>');            $('#search_button').click(function() {              var friend_name = $('#friend').val().toUpperCase();              search_add(friend_name);              append_friend(friend_name);            });            $("#container p").click(function() {               localStorage.setItem('fid', $(this).text() [description]
      * @return 
      */
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
            // display friend information
            $('#header').append('<p id = \'at\'>friends <span id = \'position\'>' + friends.length + '</span></p>');
            for (var i in friends) {
                $('#container').append('<p><img src = \'../images/characters/' + friends[i].head + '\' class = \'friend_head\'/>' + 
                  '<span class = \'attr\'>' + friends[i].name + '</span>' + 
                  '<span class = \'icon\' data-icon = \'A\'/></p>');
            }
            $('#container').append('<br/><br/><br/>');
            // search a friend 
            $('#search_button').click(function() {
              var friend_name = $('#friend').val().toUpperCase();
              search_add(friend_name); // search a friend and add if availavle
            });
            $("#container p").click(function() {
               localStorage.setItem('fid', $(this).text());
               window.location = '../pages/friend_info.html';
            });
        }
    });
    /**
     * search a friend and add him if available
     * @param  {text} friend_name name of the friend the user want to search
     * @return 
     */
    function search_add (friend_name) {
       $.ajax({
            type: 'POST',
            url:  '../mySQL2.php',
            data: {
                func:  'search_friend',
                uid:   localStorage.getItem('uid'),
                fname: friend_name
            },
            dataType: 'text',
            success: function(response) {
                $('#result').html(response);
                if (response == "added successful") {
                    location.reload();
                }
            }
        });
    }
});