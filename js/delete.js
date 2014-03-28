$(document).ready(function() {
    var fname = localStorage.getItem('fid');

    $('#name').html(fname);

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
            // display_profile();
            $('#points').text(info[0].points);
            $('#character_name').text(info[1].name);
            $('#position').text(info[0].position);
            $('#picture').html('<img src = \'../images/' + info[1].head + '\' />');
            $('#description').text(info[1].intro);
            $('#recent_event').text(info[0].event);

            $('#delete_button').click(function() {
                delete_friend(fname);
            });
        }
    });

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
                location.href= '../pages/friend.html';
            }
        });
    }

});