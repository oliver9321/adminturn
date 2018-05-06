<link rel="stylesheet" href="assets/DataTables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/DataTables/Responsive/css/responsive.bootstrap4.min.css">

<a href="?c=mant_usuarios&a=Edit" class="btn btn-primary">Crear Usuario <i class="fa fa-plus" aria-hidden="true"></i></a>
<hr>
<table id="ListadoUsuarios" width="100%" class="table table-striped table-bordered dataTable">
    <thead>
    <tr>

        <th>#</th>
        <th>Imagen</th>
        <th>Perfil</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Usuario</th>
        <th>Email</th>
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

    $('#ListadoUsuarios').DataTable({
        "responsive": true,
            "ajax": {
                "url": "Index.php?c=mant_usuarios&a=View",
            },
        columns:[
            {data: "Id"},
            {data: "Imagen"},
            {data: "Perfil"},
            {data: "Nombre"},
            {data: "Apellido"},
            {data: "Usuario"},
            {data: "Email"},
            {data: "Activo"},
            {data: "Id"}
        ],"columnDefs": [ {
            "targets":8,
            "data": "Editar",
            "render": function ( data) {
                return '<a class="btn btn-warning" href="Index.php?c=mant_usuarios&a=Edit&Id='+data+'" aria-label="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>';
            }
        },{
            "targets": 1,
            "data": "Imagen",
            "render": function (data) {
                return (data) != null ? '<img src="uploads/'+data+'" style="height:50px;" />' : 'No Image';
            }},{
                "targets": 7,
                "data": "Activo",
                "render": function (data) {
                    return (data) == 1 ? '<button type="button" class="btn btn-sm btn-success btn-circle waves-effect waves-light"> <i class="ti-check"></i> </button>': '<button type="button" class="btn btn-sm btn-danger btn-circle waves-effect waves-light"> <i class="ti-close"></i> </button>';
         }}]
    });

});
</script>
