$(document).ready(function () {

    var id = '';
    var nome = '';
    var email = '';

    $('.edit').hide();

    $('.btnEdit').on('click', function () {

        btn = $(this);

        id = $(btn).data('id');
        nome = $(btn).data('nome');
        email = $(btn).data('email');

        $('#nomeEdit').val(nome);
        $('#emailEdit').val(email);
        $('#userName').text(nome)
        $('.edit').show();
    })

    $('#cancel').on('click', function () {
        $('#nomeEdit').val('');
        $('#emailEdit').val('');
        $('#userName').text('')
        $('.edit').hide();
    })

    $('#save').on('click', function () {

        $.ajax({
            type: "POST",
            url: "/crud/cadastro/editar",
            data: {
                id: id,
                nome:  $('#nomeEdit').val(),
                email: $('#emailEdit').val()
            },
            success: function (response) {
                if (response) {
                    alert("Usuário editado com sucesso!");
                    location.reload();
                }
            }
        });
    })
})


