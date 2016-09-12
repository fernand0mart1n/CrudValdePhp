$(function () {
    $("#clienteesTable").DataTable();
});

function eliminarCliente(cliente_id){

    if(!confirm("¿Está seguro que desea eliminar este cliente?"))
        return;

    $.ajax({
        url: "{{ url('clientes') }}/" + cliente_id,
        type: 'POST',
        data: {
            _token: "{{ csrf_token() }}",
            _method: 'DELETE'
        },
        success: function(response) {
            window.location.href = "{{ route('cliente.index') }}";
        }
    });
}       