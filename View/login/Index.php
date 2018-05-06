<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="Oliver Fermin">

    <title>OneTime</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/select2/select2.min.css">
    <!-- Neptune CSS -->
    <link rel="stylesheet" href="assets/core.css">

</head>
<body class="auth-bg" id="loginModule">

<div class="auth">
    <div class="auth-header">
        <!--<div class="mb-2"><img src="img/logo.png" title=""></div>-->
    <h1>OneTime v3</h1>
        <h5>SISTEMA PARA LA ADMINISTRACION Y GESTION DE TURNOS</h5>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form id="frm-login" action="?c=login&a=ValidateUser" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="Usuario" name="Usuario" placeholder="Usuario" >
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" class="form-control" id="Password"  name="Password" placeholder="Password">
                            <div class="input-group-addon"><i class="ti-key"></i></div>
                        </div>
                    </div>

                    <div class="form-group" id="FormPuestoID" style="display:none">
                        <select id="PuestoID" name="PuestoID" class="form-control select2" style="width: 100%" required></select>
                    </div>

                    <div class="form-group clearfix">
                        <div class="float-xs-right">
                            <a class="text-white font-90" href="#">Olvidaste tu contraseña?</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" onclick="GetListPuestosByUser()" class="btn btn-primary btn-block" id="BtnValidarPuestos">Verificar Sesion</button>
                        <button type="submit" class="btn btn-success btn-block" style="display:none" id="BtnIniciarSesion">Iniciar Sesion</button>
                    </div>
                </form>

                <div class="form-group clearfix">
                    <center>
                        <br><a class="text-white font-90" href="#">Contactar Administrador</a>
                    </center>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Vendor JS -->
<script type="text/javascript" src="assets/jquery/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="assets/tether/js/tether.min.js"></script>
<script type="text/javascript" src="assets/bootstrap4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/select2.full.min.js"></script>
<script type="text/javascript" src="assets/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>


<script>

    $('.select2').select2();

    $(document).ready(function(){
        $("#frm-login").submit(function(){
            return $(this).validate();
        });
    });

    var body = document.querySelector('body');

    body.onkeydown = function (e) {
        if (!e.metaKey) {

            if(e.keyCode == 13){
                GetListPuestosByUser();
            }
        }
    };
</script>

<script>

    function GetListPuestosByUser(){

    $.ajax({
        url: "Index.php?c=login&a=GetListPuestosByUser",
        type: "POST",
        data: {Action: "GetListPuestosByUser", Usuario: $("#Usuario").val()},
        success: function (data) {

                   if(data != '0'){

                       var Json = JSON.parse(data);
                       $("#FormPuestoID").show(1000);
                       $("#BtnValidarPuestos").hide();
                       $("#BtnIniciarSesion").show();

                       $.each(Json, function( key, value ) {
                           $('#PuestoID').append('<option value="'+value.PuestoID+'">'+value.PuestoConcatenado+'</option>');
                       });

               }else{
                     alert("Usuario Invalido o Sin permisos");
                       $("#FormPuestoID").hide(1000);
               }

        }
    });
    }

</script>