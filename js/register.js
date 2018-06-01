$(document).ready(function () {
    $('#btnsubmit').click(function () {
        $('#mensagem').html('SALVANDOOO....');
        $('#mensagem').fadeIn();
        acao = "save";
        $.ajax({
            type: "POST",
            url: 'php/pdo_register.php?act=' + acao,
            data: {
                firstname: $("#firstname").val(),
                username: $("#lastname").val(),
                lastname: $("#username").val(),
                password: $("#password").val()
            },
            success: function (data) {
                if (data == 'SIM') {
                    $('#mensagem').html('REGISTRO INSERIDO COM SUCESSO!');
                } else {
                    $('#mensagem').html(data);
                }
                $('#mensagem').delay(2000).fadeOut();
            },
            error: function (erro) {
                $('#mensagem').html('CONEXÃO COM SERVIDOR FALHOU...' + erro.responseText);
            },
        });
        //window.location.replace('index.php');
        //$('#mensagem').html('');
    });
});

