
function buscarUsuarios() {
    $('#mensagem').html('Buscandoooooo....');
    $('#mensagem').fadeIn();
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




