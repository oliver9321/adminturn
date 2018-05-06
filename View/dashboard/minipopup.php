<!DOCTYPE html>
<head>
    <title></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="assets/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/animate.css/animate.min.css">

    <link rel="stylesheet" href="assets/waves/waves.min.css">



    <link rel="stylesheet" href="assets/jquery-wizard/libs/formvalidation/formValidation.min.css">

    <link href="assets/bootstrap4/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/toastr/toastr.min.css">


    <link rel="stylesheet" href="assets/core.css">
    <script type="text/javascript" src="assets/js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="assets/toastr/toastr.min.js"></script>


</head>

<script type="text/javascript">
    window.setTimeout("location=('Index.php?c=Dashboard&a=minipopup');",6000000);
</script>

<style>
    .BtnAcciones:hover{
        -webkit-box-shadow: 10px 10px 10px -14px rgba(0,0,0,0.75);
        -moz-box-shadow: 10px 10px 10px -14px rgba(0,0,0,0.75);
        box-shadow: 10px 10px 10px -14px rgba(0,0,0,0.75);  transition: 0.4s; }

    .row-no-gutter {
        margin-right: 0;
        margin-left: 0;
    }

    .row-no-gutter [class*="col-"] {
        padding-right: 0;
        padding-left: 0;
    }


    #card {
        background: #fff;
        position: relative;

        -webkit-box-shadow: 0px 1px 1px 0px rgba(207,207,207,1);
        -moz-box-shadow: 0px 1px 10px 0px rgba(207,207,207,1);
        box-shadow: 0px 1px 1px 0px rgba(207,207,207,1);

        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -ms-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .city-selected {
        position: relative;
        overflow: hidden;
        min-height: 200px;

    }

    .city span {
        color: #fff;
        font-size: 13px;
        font-weight: bold;

        text-transform: lowercase;
        text-align: left;
    }

    .temp {
        font-size: 50px;
        display: block;
        position: relative;
        font-weight: bold;
    }

    .wind span {
        font-size: 13px;
        text-transform: uppercase;
    }

    .city-selected:hover figure {
        opacity: 0.4;
    }


    .days .row [class*="col-"]:hover{
        background: #eaeaea;
    }

    .day {
        padding: 10px 0px;
        text-align: center;

    }

    .day h1 {
        font-size: 18px;
        text-transform: uppercase;
        color:#007ee5;
    }

</style>


    <div class="content-area py-1 box">
        <div class="container-fluid">

            <div class="col-md-6">
            <nav class="navbar navbar-white bg-blue navbar-bottom-line b-a mb-2 bg-white">

                <div class="collapse navbar-toggleable-sm " id="exCollapsingNavbar4">
                   <center> <a class="navbar-brand" href="#"><?=$_SESSION['DataUserOnline']['Usuario']->Puesto; ?> | SUCURSAL: <?=$_SESSION['DataUserOnline']['Usuario']->Sucursal; ?></a></center>
                    <button class=" btn btn-primary"  type="button" id="BtnIniciar" onclick="GenerarLlamadaTurno()">INICIAR LLAMADA</button>
               </div>

                <hr>
                <center>
                <button class="btn btn-danger BtnAcciones" data-action="A"  type="button" >ANULAR</button>
                <button class="btn btn-success BtnAcciones" data-action="L"  type="button" >RE-LLAMAR</button>
                <button class="btn btn-warning BtnAcciones" data-action="P"  type="button" >EN ATENCION</button>
                <button class="btn btn-primary BtnAcciones" data-action="F"  type="button" >FINALIZAR</button>
                </center>

            </nav>

                <center>
                    <div class="temp box bg-white" id="MostrarTurnoAtencion"></div>
                </center>

            </div>


        </div>

    </div>
</div>
</div>

<div class="modal animated flipInX small-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="mySmallModalLabel">Anulación de Turnos</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="Comentario"><b>Razón de analuación:</b></label>
                    <textarea name="Comentario" id="Comentario" placeholder="Ingrese la razón de anulación" class="form-control"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="EnviarComentario('A')">Anular</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<div hidden>
    PuestoID:<input type="text" value="<?= $_SESSION['DataUserOnline']['Usuario']->PuestoId ?>" name="PuestoID" id="PuestoID">
    Puesto:<input type="text" value="<?= $_SESSION['DataUserOnline']['Usuario']->Puesto ?>" name="Puesto" id="Puesto">
    Turno:<input type="text" id="TurnoEnAtencion" name="TurnoEnAtencion">
    TurnoID:<input type="text" id="TurnoIDEnAtencion" name="TurnoIDEnAtencion">
    Estado:<input type="text" id="EstadoTurnoAtencion" name="EstadoTurnoAtencion">
    SucursalID:<input type="text" id="SucursalID" name="SucursalID"  value="<?= $_SESSION['DataUserOnline']['Usuario']->SucursalID ?>"><br>
    ReLlamadas:<input type="text" id="CantReLlamadas" name="CantReLlamadas">
    ContadorTiempoEspera:<input type="text" id="ContadorTiempoEspera">

</div>

<script type="text/javascript" src="assets/jquery/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="assets/js/mostrarTurno.js"></script>


<script type="text/javascript" src="assets/bootstrap4/js/bootstrap.min.js"></script>

<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/demo.js"></script>

<script type="text/javascript" src="assets/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript" src="assets/js/ui-notifications.js"></script>
<script src="assets/js/jquery.anexsoft-validator.js"></script>
<script src="assets/bootstrap4/js/bootstrap-toggle.min.js"></script>


<script type="text/javascript">
    window.onload = function(e){
        $('body').addClass('compact-sidebar');
    }
</script>

<script>
//Actualizar el estado de los turnos

$(".BtnAcciones").on("click",function(){

var Estado = this.getAttribute("data-action");

if($("#TurnoIDEnAtencion").val() != "") {

switch (Estado) {

case 'A':

if($("#EstadoTurnoAtencion").val() == "L"){
$(".flipInX").modal("show");
}else{
swal("Información del Sistema", "Para anular un turno debe estar en Llamada", "warning");
}

break;

case 'L':

if($("#EstadoTurnoAtencion").val() == "L") {

if ($("#CantReLlamadas").val() < 4) {

ActualizarTurno(Estado);
toastr.options = {positionClass: 'toast-top-right'};
toastr.success('Llamada!');

} else {
swal("Información del Sistema", "Límite excedido de llamadas", "warning");
}

}else{
swal("Información del Sistema", "Opción inválida en estos momentos", "warning");
}

break;

case 'P':

if ($("#EstadoTurnoAtencion").val() == "L"){

ActualizarTurno(Estado);
toastr.options = {positionClass: 'toast-top-right'};
toastr.warning('En Puesto');

}else if($("#EstadoTurnoAtencion").val() == "P") {

swal("Información del Sistema", "El turno ya se encuentra en Puesto", "warning");

}else{

swal("Información del Sistema", "Opción inválida en estos momentos", "warning");
}

break;

case 'F':

if($("#EstadoTurnoAtencion").val() == "P") {

ActualizarTurno(Estado);
var OpcionAutollamar;
toastr.options = {positionClass: 'toast-top-right'};
toastr.info('Finalizado!');
OpcionAutollamar = setTimeout(function(){GenerarLlamadaTurno(); }, 10000);

swal({
title: 'Turno Finalizado',
text: "Autollamar el próximo en 10s ",
type: 'success',
timer: 10000,
showConfirmButton: true,
confirmButtonColor: '#3085d6',
confirmButtonClass: 'btn btn-primary btn-lg mr-1',
confirmButtonText: 'No, Manual!'
}).then(function (isConfirm) {
if (isConfirm === true) {
swal({
title: 'Modo Manual',
text: 'Activado',
type: 'success',
confirmButtonClass: 'btn btn-primary btn-lg',
buttonsStyling: false
});
clearTimeout(OpcionAutollamar);
$("#MostrarTurnoAtencion").html();

var n = 0;
function update() {
// ["+ n +"]
$("#ContadorTurnoEspera").html(" | EN ESPERA PARA CONTINUAR");
$("#ContadorTiempoEspera").val(n);
n++;
}

setInterval(update, 1000);
setTimeout(function () {
swal("Información del Sistema", "Ha excedido el límite de tiempo. Se autollamara el siguiente.", "error");
}, 600000);

$("#BtnIniciar").show(1000)
}
});


}else{
swal("Información del Sistema", "Opción inválida en estos momentos", "warning");
}
break;

default:
swal("Información del Sistema", "Opción inválida en estos momentos", "warning");
break;
}

}else{
swal("Información del Sistema", "Opción inválida en estos momentos", "warning");
}

});


function EnviarComentario(Estado){
if($("#Comentario").val() != ''){
$(".flipInX").modal("hide");
ActualizarTurno(Estado);
toastr.options = {positionClass: 'toast-top-right'};
toastr.danger('Turno Anulado!');
$("#Comentario").val("");

}else{
toastr.warning('Debe indicar un comentario');
}
}

function ActualizarTurno(Estado){

var formData = {
"Action": 		"ActualizarEstadoTurno",
"Estado": 		Estado,
TurnoID: 	    $("#TurnoIDEnAtencion").val(),
"PuestoID": 	$("#PuestoID").val(),
"SucursalID": 	$("#SucursalID").val(),
"Turno": 		$("#TurnoEnAtencion").val(),
"Puesto": 		$("#Puesto").val(),
"Comentario": 	$("textarea#Comentario").val()
}; //Array

$.ajax({
url: "Index.php?c=Dashboard&a=ActualizarEstadoTurnoController",
type: "POST",
data: formData,
success: function (data, textStatus) {

if (textStatus == "success") {

var JsonData = JSON.parse(data);

$("#BtnIniciar").hide();
$("#TurnoIDEnAtencion").val(JsonData[0].TurnoID);
$("#EstadoTurnoAtencion").val(JsonData[0].Estado);
$("#CantReLlamadas").val(JsonData[0].CantReLlamadas);


MarcarEstadoNav(JsonData[0].Estado);
}

}
});

}


function MarcarEstadoNav(Estado){

$(".nav-item").removeClass("active");

if(Estado == "L"){
$(".nav-estado-rellamar").addClass("active");
}else if(Estado == "P"){
$(".nav-estado-atencion").addClass("active");
}else if(Estado == "A"){
$(".nav-estado-anulado").addClass("active");
swal("Información del Sistema", "Turno Anulado. Se autollamara el próximo en 5 seg.", "success");
setTimeout(function(){ GenerarLlamadaTurno(); }, 5000);
}else if(Estado == "F"){
$(".nav-estado-finalizar").addClass("active");
//swal("Turno Finalizado", "", "success");

}else if(Estado== "T"){
$(".nav-estado-transferir").addClass("active");
}


}
//Obtiene el ultimo turno en antencion en el puesto
function ObtenerTurnoAtencionPuesto(){

var formData = {"Action":"GetLastTurno", "PuestoID": $("#PuestoID").val()}; //Array

$.ajax({
url : "Index.php?c=Dashboard&a=GetLastTurnByPuestoController",
type: "POST",
data : formData,
success: function(data, textStatus, jqXHR)
{
if (textStatus == "success") {

var JsonData = JSON.parse(data);

if(JsonData.data.length > 0){

$("#BtnIniciar").hide();
$("#TurnoIDEnAtencion").val(JsonData.data[0].TurnoID);
$("#TurnoEnAtencion").val(JsonData.data[0].Turno);
$("#EstadoTurnoAtencion").val(JsonData.data[0].Estado);
$("#CantReLlamadas").val(JsonData.data[0].CantReLlamadas);
$("#MostrarTurnoAtencion").html(JsonData.data[0].Turno);
MarcarEstadoNav(JsonData.data[0].Estado);

}else{

$("#BtnIniciar").show(1000);
$("#MostrarTurnoAtencion").html("<h5 class='text-danger'>NO HAY TURNOS EN ESPERA</h5>");
MarcarEstadoNav("");

}
}
},
error: function (jqXHR, textStatus)
{
if ( console && console.log ) {
console.log( "La solicitud a fallado: " +  textStatus);
}
}
});

}
ObtenerTurnoAtencionPuesto();




function GenerarLlamadaTurno(){

var formData = {"Action":"GenerarLlamadaTurno", "PuestoID": $("#PuestoID").val(), "Puesto": $("#Puesto").val()}; //Array

$.ajax({
url : "Index.php?c=Dashboard&a=GenerarLlamadaTurnoController",
type: "POST",
data : formData,
success: function(data)
{
//console.log(data);

var JsonData = JSON.parse(data);

if(JsonData[0].Turno != '0'){

$("#MostrarTurnoAtencion").html(JsonData[0].Turno);
$("#TurnoEnAtencion").val(JsonData[0].Turno);
$("#TurnoIDEnAtencion").val(JsonData[0].TurnoID);
$("#BtnIniciar").hide(1000);
$("#ContadorTurnoEspera").html("") // OLIVER;
$("#EstadoTurnoAtencion").val("L");
MarcarEstadoNav("L");
///	SendTurnoPantalla();

}else{
$("#BtnIniciar").show(1000);
$("#MostrarTurnoAtencion").html("NO HAY TURNOS EN ESPERA");
swal("Informacion del Sistema", "No hay turnos en espera.", "warning");
}

},
error: function (jqXHR, textStatus, errorThrown)
{
if ( console && console.log ) {
console.log( "La solicitud a fallado: " +  textStatus);
}
}
});

}


</script>

</script>

