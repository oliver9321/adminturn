<link rel="stylesheet" href="assets/DataTables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/DataTables/Responsive/css/responsive.bootstrap4.min.css">

<a href="?c=mant_modulos&a=Edit" class="btn btn-primary">Crear Modulo <i class="fa fa-plus" aria-hidden="true"></i></a>
<hr>
<table id="ListadoModulos" width="100%" class="table table-striped table-bordered dataTable">
    <thead>
    <tr>
        <th>#</th>
        <th>Código</th>
        <th>Nombre</th>
        <th>Descripción</th>
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

    $('#ListadoModulos').DataTable({
        "responsive": true,
        "ajax": {
                "url": "Index.php?c=mant_modulos&a=View",
            },
        columns:[
            {data: "Id"},
            {data: "Codigo"},
            {data: "Nombre"},
            {data: "Descripcion"},
            {data: "Activo"},
            {data: "Id"}
        ],"columnDefs": [ {
            "targets":5,
            "data": "Editar",
            "render": function ( data) {
                return '<a class="btn btn-warning" href="Index.php?c=mant_modulos&a=Edit&Id='+data+'" aria-label="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>';
            }
        },{
            "targets": 4,
            "data": "Activo",
            "render": function (data) {
                    return (data) == 1 ? '<button type="button" class="btn btn-sm btn-success btn-circle waves-effect waves-light"> <i class="ti-check"></i> </button>': '<button type="button" class="btn btn-sm btn-danger btn-circle waves-effect waves-light"> <i class="ti-close"></i> </button>';
         }}]
    });

});
</script>
