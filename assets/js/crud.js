function eliminar(cliente_id){
    
    var info = 'id=' + cliente_id;

    $("#myModal").modal("show");
    
    $("#btnDel").click(function () {
        $.ajax({
            type: "POST",
            url: "eliminarcontroller.php",
            data: info,
            success: function(){
                window.location.href = 'homecontroller.php';
            }
        });
    });

    return false;

}

$(document).ready(function(){

    $(".alert-danger button.close").click(function (e) {
        $(this).parent().hide('slow');
    });

    setTimeout(function() {
        $('.alert-info').hide('slow');
    }, 6000);

    $("table tbody").not(":has(td)").html("<tr><td colspan=60%>No se han cargado clientes</td></tr>");

});
