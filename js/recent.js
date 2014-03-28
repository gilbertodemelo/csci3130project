$(document).ready(function() {
    var uid = localStorage.getItem('uid');
    $.ajax({
        type: 'POST',
        url:  '../mySQL2.php',
        data: {
            func: 'get_event_list',
            uid : uid
        },
        dataType: 'json',
        success: function(response) {
            info = eval(response);
            $('#picture').html('<img src=\'../images/characters/' + info[0].head + '\' id =\'photo\'/>');
            $('#name').text(info[0].name);
            $('#points').text(info[0].points);
            for (var i in info[1]) {
                var d;
                if (info[1][i].direction == '1')
                    d = '+';
                else 
                    d = '-';
                $('#container').append('<p><span class = \'attr\'>' +  
                    d + info[1][i].value + ': </span>' + info[1][i].event + '</p>');
            }
            $('#container').append('<br/><br/><br/>')
        }
    });
});