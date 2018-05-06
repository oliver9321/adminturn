<link rel="stylesheet" href="assets/DataTables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/DataTables/Responsive/css/responsive.bootstrap4.min.css">

<a href="?c=mant_sucursales&a=Edit" class="btn btn-primary">Crear Sucursal <i class="fa fa-plus" aria-hidden="true"></i></a>
<hr>
<table id="ListadoSucursales" width="100%" class="table table-striped table-bordered dataTable">
    <thead>
    <tr>

        <th>#</th>
        <th>Código</th>
        <th>Sucursal</th>
        <th>Descripción</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Empresa</th>
        <th>Activo</th>
        <th>Modificar</th>
    </tr>
    </thead>

</table>

<script type="text/javascript" src="assets/jquery/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="assets/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/DataTables/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="assets/DataTables/Responsive/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="assets/DataTables/Responsive/js/responsive.bootstrap4.min.js"></script>

<script>

$(document).ready(function() {

    $('#ListadoSucursales').DataTable({
        "responsive": true,
        "ajax": {
                "url": "Index.php?c=mant_sucursales&a=View",
            },
        columns:[
            {data: "Id"},
            {data: "Codigo"},
            {data: "Nombre"},
            {data: "Descripcion"},
            {data: "Telefono"},
            {data: "Direccion"},
            {data: "Empresa"},
            {data: "Activo"},
            {data: "Id"}
        ],"columnDefs": [ {
            "targets":8,
            "data": "Editar",
            "render": function ( data) {
                return '<a class="btn btn-warning" href="Index.php?c=mant_sucursales&a=Edit&Id='+data+'" aria-label="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>';
            }
        },{
            "targets": 7,
            "data": "Activo",
            "render": function (data) {
                    return (data) == 1 ? '<button type="button" class="btn btn-sm btn-success btn-circle waves-effect waves-light"> <i class="ti-check"></i> </button>': '<button type="button" class="btn btn-sm btn-danger btn-circle waves-effect waves-light"> <i class="ti-close"></i> </button>';
         }}]
    });

});
</script>
