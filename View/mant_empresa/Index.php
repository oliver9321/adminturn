<link rel="stylesheet" href="assets/DataTables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/DataTables/Responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="assets/DataTables/Buttons/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="assets/DataTables/Buttons/css/buttons.bootstrap4.min.css">

<a href="?c=mant_empresa&a=Edit" class="btn btn-primary">Crear Empresa <i class="fa fa-plus" aria-hidden="true"></i></a>
<hr>
<table id="ListadoEmpresas" width="100%" class="table table-striped table-bordered dataTable">
    <thead>
    <tr>

        <th>#</th>
        <th>Logo</th>
        <th>Codigo</th>
        <th>Rnc</th>
        <th>Empresa</th>
        <th>Telefono</th>
        <th>Descripcion</th>
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
<script type="text/javascript" src="assets/DataTables/Buttons/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="assets/DataTables/Buttons/js/buttons.bootstrap4.min.js"></script>


<script>
$(document).ready(function() {

    $('#ListadoEmpresas').DataTable({
        "responsive": true,
            "ajax": {
                "url": "Index.php?c=mant_empresa&a=GetListEmpresas",
            },
        columns:[
            {data: "Id"},
            {data: "LogoPeq"},
            {data:"Codigo"},
            {data: "Rnc"},
            {data: "Nombre"},
            {data: "Telefono"},
            {data: "Descripcion"},
            {data: "Activo"},
            {data: "Id"}
        ],"columnDefs": [ {
            "targets":8,
            "data": "Editar",
            "render": function ( data) {
                return '<a class="btn btn-warning" href="Index.php?c=mant_empresa&a=Edit&Id='+data+'" aria-label="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>';
            }
        },{
            "targets": 1,
            "data": "Logo",
            "render": function (data) {
            return (data) != null ? '<img src="uploads/'+data+'" style="width:50px;" />' : 'No Image';
            }},
            {
                "targets": 7,
                "data": "Activo",
                "render": function (data) {
                    return (data) == 1 ? '<button type="button" class="btn btn-sm btn-success btn-circle waves-effect waves-light"> <i class="ti-check"></i> </button>': '<button type="button" class="btn btn-sm btn-danger btn-circle waves-effect waves-light"> <i class="ti-close"></i> </button>';
         }}]
    });

});
</script>

<!--   <a class="btn btn-danger" href="Index.php?c=mant_empresa&a=Delete&Id='+data+'" aria-label="Delete"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>-->
