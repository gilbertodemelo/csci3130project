$(document).ready(function() {
    // var uname = localStorage.getItem('uname');
    var pid = localStorage.getItem('pid');
    var uid = localStorage.getItem('uid');

    $.ajax({
        type: 'POST',
        url:  '../mySQL.php',
        data: {
            func: 'get_user_info',
            uid: uid,
            pid: pid
        },
        dataType: 'text',
        success: function(response) {
            $('#container').html(response);
        }
    });
    
    load_page();
});