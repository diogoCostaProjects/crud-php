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

    $('#addBtn').on('click', function () {

        var coresSelecionadas = []; 
        
        $('input[name="cores[]"]:checked').each(function() { 
            coresSelecionadas.push($(this).val()); 
        });
        
        $.ajax({
            type: "POST",
            url: "/crud/cadastro/adicionar",
            data: {
                nome:  $('#nomeAdd').val(),
                email: $('#emailAdd').val(),
                cores: coresSelecionadas
            },
            success: function (response) {
                if (response) {
                    alert("Usuário "+$('#nomeAdd').val()+ " adicionado com sucesso !");
                    location.reload();
                }
            }
        });
    })

    $('.removeBtn').on('click', function () {

        btn = $(this);
        var id =  $(btn).data('id');
        
        if (confirm("Tem certeza que deseja excluir o usuário ID "+ id + "?") == true) {

            $.ajax({
                type: "POST",
                url: "/crud/cadastro/remover",
                data: {
                    id: id
                },
                success: function (response) {
                    if (response) {
                        alert("Usuário removido com sucesso !");
                        location.reload();
                    }
                }
            });
        } else {
            alert ('Operação Cancelada!');
        }
    })
})


