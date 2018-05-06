<link rel="stylesheet" href="assets/DataTables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/DataTables/Responsive/css/responsive.bootstrap4.min.css">

<a href="?c=mant_botones_departamento&a=Edit" class="btn btn-primary">Asignar Boton a Depto <i class="fa fa-plus" aria-hidden="true"></i></a>
<hr>
<table id="ListadoBotonesDepartamento" width="100%" class="table table-striped table-bordered dataTable">
    <thead>
    <tr>

        <th>#</th>
        <th>Boton</th>
        <th>Departamento</th>
        <th>Activo</th>
        <th></th>
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

    $('#ListadoBotonesDepartamento').DataTable({
        "responsive": true,
            "ajax": {
                "url": "Index.php?c=mant_botones_departamento&a=View",
            },
        columns:[
            {data: "Id"},
            {data: "Boton"},
            {data: "Departamento"},
            {data: "Activo"},
            {data: "BotonTurnoID"}
        ],"columnDefs": [ {
            "targets":4,
            "data": "Editar",
            "render": function ( data) {
                return '<a class="btn btn-warning" href="Index.php?c=mant_botones_departamento&a=Edit&BotonTurnoID='+data+'" aria-label="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>';
            }
        },{
                "targets": 3,
                "data": "Activo",
                "render": function (data) {
                    return (data) == 1 ? '<button type="button" class="btn btn-sm btn-success btn-circle waves-effect waves-light"> <i class="ti-check"></i> </button>': '<button type="button" class="btn btn-sm btn-danger btn-circle waves-effect waves-light"> <i class="ti-close"></i> </button>';
         }}]
    });

});
</script>
