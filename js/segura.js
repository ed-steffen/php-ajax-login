$(document).ready(function () {
    $('#btncript').click(function () {
        $('#mensagem').html('TESTE....');
        $('#mensagem').fadeIn();
        $.ajax({
            type: "POST",
            url: 'php/segura.php?act=c',
            data: {
                texto: $("#txtcripto").val()
            },
            success: function (data) {
                $('#mensagem').html(data);
            },
            error: function(erro) {
                $('#mensagem').html('CONEXÃO COM SERVIDOR FALHOU...' + erro.responseText);
            },
        });
        //window.location.replace('index.php');
        //$('#mensagem').html('');
    });

    $('#btndecri').click(function () {
        $('#mensagem').html('TESTE....');
        $('#mensagem').fadeIn();
        $.ajax({
            type: "POST",
            url: 'php/segura.php?act=d',
            data: {
                texto: $("#txtdecrip").val()
            },
            success: function (data) {
                $('#mensagem').html(data);
            },
            error: function(erro) {
                $('#mensagem').html('CONEXÃO COM SERVIDOR FALHOU...' + erro.responseText);
            },
        });
        //window.location.replace('index.php');
        //$('#mensagem').html('');
    });
    
});