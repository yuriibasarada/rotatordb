$(function(){
    $('.rows :button[value=down]').on('click', function ddd() {

        $(this).closest('.row').insertAfter($(this).closest('.row').next()).hide().show("slow");


        //alert(sId);
        var sId = $(this).attr('id'); // id статьи в базе данных
        $.ajax({
            url: '/rotator/models/ajax/down.php', // путь к обработчику
            type: 'POST', // метод передачи данных
            dataType: 'json', // формат данных ожидаемых в ответе
            data: {id: sId}, // передаваемые данные {ключ1 : значение1, ключ2 : значение2}
            success: function (data){ // в случае удачного завершения запроса к серверу
                // в переменной data - ответ сервера
                if(data['id']) {
                    max = Number(data['id1'])+1
                    if (data['id'] !== max) {
                        //alert(data['id1']);
                        var int = Number(data['id']);
                        var int1 = int - 1;
                        var int2 = 1000;

                        $('button[id=' + int + ']').attr('id', int2);
                        $('div[id=' + int + ']').html(int2).attr('id', int2);

                        $('button[id=' + int1 + ']').attr('id', data['id']);
                        $('div[id=' + int1 + ']').html(data['id']).attr('id', data['id']);

                        $('button[id=' + int2 + ']').attr('id', int1);
                        $('div[id=' + int2 + ']').html(int1).attr('id', int1);
                    }
                }
            }
        });
    });
    $('.rows :button[value=up]').on('click', function() {
        $(this).closest('.row').insertBefore($(this).closest('.row').prev()).hide().show("slow");

        var sId = $(this).attr('id'); // id статьи в базе данных
        $.ajax({
            url: '/rotator/models/ajax/up.php', // путь к обработчику
            type: 'POST', // метод передачи данных
            dataType: 'json', // формат данных ожидаемых в ответе
            data: {id: sId}, // передаваемые данные {ключ1 : значение1, ключ2 : значение2}
            success: function(data){ // в случае удачного завершения запроса к серверу
                // в переменной data - ответ сервера
                if(data){
                    if(data !== '0'){
                        var int = Number(data);
                        var int1 = int +1;
                        var int2 = 1000;
                        //var int2 = int -1;
                        $('button[id=' + int + ']').attr('id', int2);
                        $('div[id=' + int + ']').html(int2).attr('id', int2);

                        $('button[id=' + int1 + ']').attr('id', data);
                        $('div[id=' + int1 + ']').html(data).attr('id', data);

                        $('button[id=' + int2 + ']').attr('id', int1);
                        $('div[id=' + int2 + ']').html(int1).attr('id', int1);
                    }
                }
            }
        })

    });
});