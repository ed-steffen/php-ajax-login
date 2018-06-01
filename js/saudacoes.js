$(document).ready(function () {
    $('#btnteste').click(function () {
        $('#mensagem').html(darBomDia());
    });
});

function darBomDia() {
    var teste = Texto("Edinei");
    var t1 = Texto("Maria");
    console.log(teste);
    console.log(t1);
    return teste;
}