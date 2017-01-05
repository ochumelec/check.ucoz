/**
 * Created by stalk on 27.12.2016.
 */
    $('.sample1').click(function () {

        $.ajax({
            url: 'functions.php?action=showChecked',
            success: function (data) {
                $('.results').html(data);
            }
        });

    });

$('.sample2').click(function () {

    $.ajax({
        type: 'POST',
        url: 'response.php?action=sample2',
        data: 'name=Andrew&nickname=Aramis',
        success: function (data) {
            $('.results').html(data);
        }
    });

});

$('.sample3').click(function () {

    $.ajax({
        dataType: 'script',
        url: 'response.php?action=sample3',
    });

});

$('.sample4').click(function () {

    $.ajax({
        dataType: 'xml',
        url: 'response.php?action=sample4',
        success: function (xmldata) {
            $('.results').html('');
            $(xmldata).find('item').each(function () {
                $('<li></li>').html($(this).text()).appendTo('.results');
            });
        }
    });

});

$('.sample5').click(function () {

    $.ajax({
        dataType: 'json',
        url: 'response.php?action=sample5',
        success: function (jsondata) {
            $('.results').html('Name = ' + jsondata.name + ', Nickname = ' + jsondata.nickname);
        }
    });

});