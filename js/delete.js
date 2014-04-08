$(document).ready(function() {
    var fname = localStorage.getItem('fid');

    $('#name').html(fname);
    /**
     * display profile and character information of your friend
     * @param  {json} response) {                       info = eval(response);              $('#photo').html('<img src = '../images/characters/' + info[1].head + '' />');            $('#points').text(info[0].points);            $('#character_name').text(info[1].name);            $('#position').text(info[0].position);            $('#picture').html('<img src = '../images/characters/' + info[1].img + '' />');            $('#description').text(info[1].intro);            $('#recent_event').text(info[0].event);            $('#delete_button').click(function() {                delete_friend(fname);            });        }    } [description]
     * @return 
     */
    $.ajax({
        type: 'POST',
        url:  '../mySQL2.php',
        data: {
            func: 'get_profile2',
            uname : fname
        },
        dataType: 'json',
        success: function(response) {
            info = eval(response);
            // display information
            $('#photo').html('<img src = \'../images/characters/' + info[1].head + '\' />');
            $('#points').text(info[0].points);
            $('#character_name').text(info[1].name);
            $('#position').text(info[0].position);
            $('#picture').html('<img src = \'../images/characters/' + info[1].img + '\' />');
            $('#description').text(info[1].intro);
            $('#recent_event').text(info[0].event);
            // delete friends
            $('#delete_button').click(function() {
                delete_friend(fname);
            });
        }
    });
    /**
     * delete the current friend
     * @param  {text} fname name of the current display friend
     * @return 
     */
    function delete_friend(fname) {
        $.ajax({
            type: 'POST',
            url:  '../mySQL2.php',
            data: {
                func: 'delete_friend',
                uid: localStorage.getItem('uid'),
                fname: fname
            },
            dataType: 'text',
            success: function(response) {
                // back to the social page
                location.href= '../pages/friend.html';
            }
        });
    }

});