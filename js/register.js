$(document).ready(function () {
    $('#btnsubmit').click(function () {
        $('#mensagem').html('SALVANDOOO....');
        $('#mensagem').fadeIn();
        $.ajax({
            type: "POST",
            url: 'php/register.php',
            data: {
                firstname: $("#firstname").val(),
                username: $("#lastname").val(),
                lastname: $("#username").val(),
                password: $("#password").val()
            },
            success: function (data) {
                if (data == 'sim') {
                    $('#mensagem').html('REGISTRO INSERIDO COM SUCESSO!');
                } else {
                    $('#mensagem').html(data);
                }
                $('#mensagem').fadeOut();
            }
        });
        //window.location.replace('index.php');
        //$('#mensagem').html('');
    });
    
});