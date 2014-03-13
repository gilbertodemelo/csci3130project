$(document).ready(function() { 
    $.ajax({
        type: 'POST',
        url:  '../mySQL2.php',
        data: {
            func:  'get_delete_list',
            uid:   localStorage.getItem('uid')
        },
        dataType: 'json',
        success: function(response) {
            var list = eval(response);
            for (var i in list) {
                 $('#friend_list').append('<div class = \'friend\'>' + list[i] + 
                      '<button type=\'button\' class=\'delete\' data-icon=\'p\'></button>' + 
                      '</div>');
            }

            $('.delete').click(function() {
                var friend = $(this).parent();
                var fname = friend.text();
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
                        friend.remove();
                        $('#result').html(fname + " removed successful");
                    }
                });
            });
        }
    });
});