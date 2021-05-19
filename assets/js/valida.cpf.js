$('#txtCPF').hide();
$('#validaCPF').change(function(event) {

    var cpf = $(this).val();

    $.ajax({
            url: '../helpers/valida-cpf.php',
            type: 'POST',
            dataType: 'html',
            data: { cpf: cpf },
        })
        .done(function(e) {
            console.log(e)
            if (e != 'true') {
                $('#validaCPF').val('');
                $('#txtCPF').show();
            } else {
                $('#txtCPF').hide();
            }
        });
});