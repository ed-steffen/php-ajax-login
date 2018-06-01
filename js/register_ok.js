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
            error: function(erro) {
                $('#mensagem').html('CONEXÃO COM SERVIDOR FALHOU...' + erro.responseText);
            },
        });
        //window.location.replace('index.php');
        //$('#mensagem').html('');
    });
    
    $('body').load(buscarUsuarios());

    function buscarUsuarios() {
        $.ajax({
            type: "GET",
            dataType: 'JSON',
            url: "php/pdo_register.php?act=sel",
            success: function(data){
    
                var len = data.length;
                console.log(data);
                console.log(data.length);
    
                for(var i=0; i<len; i++){
                    var id = data[i].id;
                    var firstname = data[i].firstname;
                    var lastname = data[i].lastname;
                    var username = data[i].username;
                    var password = data[i].password;
    
                    var tr_str = tr_str + "<tr>" +
                        "<td>" + id + "</td>" +
                        "<td>" + firstname + "</td>" +
                        "<td>" + lastname + "</td>" +
                        "<td>" + username + "</td>" +
                        "<td>" + password + "</td>" +
                        "<td> # | X </td>" +
                        "</tr>";
                }
    
                $('tbody').html(tr_str);
            },
            error: function(erro) {
                $('#mensagem').html('CONEXÃO COM SERVIDOR FALHOU...' + erro.responseText);
            },
        });
      }
    
});



