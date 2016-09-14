$(document).ready(function(){
    $(".delete").click(function(){
        var element        = $(this);
        var del_id         = element.attr("id");
        var info           = 'id=' + del_id;
        var nombreCompleto = (element.parents("td").siblings(".nombre").html()).trim() + " " +
        (element.parents("td").siblings(".apellido").html()).trim();
        if(confirm("¿Está seguro de que desea borrar al cliente " + nombreCompleto + "?"))
        {
            $.ajax({
                type: "POST",
                url: "eliminarcontroller.php",
                data: info,
                success: function(){
                }
            });
            $(this).parents("tr").animate({ backgroundColor: "#003" }, "500")
            .animate({ opacity: "hide" }, "1000");

            $(".table-footer").before('<div class="alert alert-info" role="alert">' +
                                        '<strong>El cliente ' + nombreCompleto + ' ha sido eliminado</strong>' +
                                        '</div>');

        }

        return false;

    });

    $(".alert-danger button.close").click(function (e) {
        $(this).parent().hide('slow');
    });

    setTimeout(function() {
        $('.alert-info').hide('slow');
    }, 6000);

    $("table tbody").not(":has(td)").html("<tr><td colspan=60%>No se han cargado clientes</td></tr>");

});