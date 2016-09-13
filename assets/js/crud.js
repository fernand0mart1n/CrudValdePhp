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
            .animate({ opacity: "hide" }, "500");
        }
        return false;
    });
});