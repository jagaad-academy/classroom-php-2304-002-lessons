$(document).ready(function(){

    // const text = $('.message-wrapper label').text();
    // console.log(text);

    // $('.message-wrapper label').text('Message new:');

    // console.log($('.message-wrapper label').text());
    // console.log($('.message-wrapper label').html());

    // $('#name').val('Hennadii');
    //
    // const name = $('#name').val();
    // console.log(name);

    // const pTag = $("<p>").text('Test!');
    // $('.message-wrapper').append(pTag);
    //
    // setTimeout(function(){
    //     $('.message-wrapper').empty();
    // }, 1500);

    // $('button').toggleClass('hide');

    // $("p").css("background-color", "yellow");
    //
    // console.log($('p').css('background-color'));

    // console.log($('.container').outerWidth(true));

    // $("#buttonHide").click(function(){
    //     $('form').fadeOut(300);
    // });
    //
    // $("#buttonShow").click(function(){
    //     $('form').fadeIn(300);
    // });

    // $('#buttonHide').click(function() {
    //     $('.container').animate({'opacity':0}, 500);
    // });

    $("#buttonSend").click(function(){
        const settings = {
            async: true,
            crossDomain: true,
            url: 'https://api-football-v1.p.rapidapi.com/v3/timezone',
            method: 'GET',
            // method: 'POST',
            headers: {
                'X-RapidAPI-Key': 'SIGN-UP-FOR-KEY',
                'X-RapidAPI-Host': 'api-football-v1.p.rapidapi.com'
            },
            // data: {
            //     name: 'Hennadii',
            //     email: 'henandii.shvedko@jagaad.com'
            // }
        };
        $.ajax(settings).done(function (response) {
            console.log(response);
        });
    });

});
