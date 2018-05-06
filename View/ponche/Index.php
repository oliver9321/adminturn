<?php
$time = $_SERVER['REQUEST_TIME'];
/*
 * por un tiempo de espera de 30 minutos, especificado en segundos
 */
$timeout_duration = 1800 ;

if ( isset ($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration ) {
    session_unset ();
    session_destroy ();
    session_start ();

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Pantalla de Ponche | OneTime</title>
		<link rel="stylesheet" href="assets/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/animate.css/animate.min.css">
		<!--<link rel="stylesheet" href="assets/jscrollpane/jquery.jscrollpane.css">-->
		<link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">

			<script type="text/javascript" src="assets/angular.js"></script>
			<link rel="stylesheet" href="assets/core.css">


	<style>
		.BtnTipoTurno:hover{
			-webkit-box-shadow: 10px 10px 69px -14px rgba(0,0,0,0.75);
			-moz-box-shadow: 10px 10px 69px -14px rgba(0,0,0,0.75);
			box-shadow: 10px 10px 69px -14px rgba(0,0,0,0.75);
			transition: 0.4s;
		}

		#Imprime{
			visibility: hidden;
		}

        .col-md-4{
            float:right !important;
        }
	</style>


</head>
	<body class="skin-default">

	<div class="wrapper" ng-app="appBotonesPantallaModule" ng-controller="CtrlBotonesPantallaController">

			<div class="preloader"></div>

				<div class="container-fluid">

					<center>
						<div class="mb-1">

							<img class="img-responsive" src="uploads/<?=$_SESSION['DataUserOnline']['Usuario']->EmpresaLogo;?>"  height="120">
							<!--<h3 class="text-center"><?=$_SESSION['DataUserOnline']['Usuario']->EmpresaDescripcion;?></h3>-->
							<h4><?php echo $_SESSION['DataUserOnline']['Usuario']->Departamento." - ".$_SESSION['DataUserOnline']['Usuario']->Sucursal; ?></h4>


						</div>
					</center>


						<div class="row row-sm">

							<div ng-repeat="b in ListadoBotones">

							<div class="col-md-4" ng-if="b.TipoBoton == 'BloqueA'">
								<div class="box box-block bg-white BtnTipoTurno" data-valorBoton="{{b.ValorBoton}}" data-BotonID="{{b.BotonTurnoID}}" ng-click="GenerarTicketTurno($event)">
									<div class="row">
										<div class="col-md-4 col-sm-4 text-center">
											<img class="img-fluid b-a-radius-circle" src="uploads/{{b.Logo}}" alt="" width="100" height="100">
										</div>
										<div class="col-md-8 col-sm-8">
											<br>
											<p><h2>{{b.TextoPeqMostrar}}</h2><h2 class="text-{{b.Color}}">{{b.TextoGraMostrar}}</h2></p>
                                            <b><h5>Presione para imprimir turno</h5></b>
										</div>
									</div>
								</div>
							</div>
						</div>

						</div>

					<div class="row row-sm">
						<div ng-repeat="b in ListadoBotones">

							<!--TIPO DE BOTON BLOQUE 2 -->
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 " ng-if="b.TipoBoton == 'BloqueB'">
								<div class="box box-block tile tile-2 bg-{{b.Color}} mb-2 BtnTipoTurno"  data-valorBoton="{{b.ValorBoton}}" data-BotonID="{{b.BotonTurnoID}}" ng-click="GenerarTicketTurno($event)">
									<div class="t-icon right"><i class="{{b.Icono}}"></i></div>
									<div class="t-content">
										<h1 class="mb-1">{{b.TextoGraMostrar}}</h1>
										<h6 class="text-uppercase"><b>{{b.TextoPeqMostrar}}</b></h6>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="row row-sm">
						<div ng-repeat="b in ListadoBotones">

							<!--TIPO DE BOTON BLOQUE 3 -->

							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" ng-if="b.TipoBoton == 'BloqueC'">
								<div class="box box-block bg-white  tile tile-3 mb-2 BtnTipoTurno"   data-valorBoton="{{b.ValorBoton}}" data-BotonID="{{b.BotonTurnoID}}" ng-click="GenerarTicketTurno($event)">
									<div class="t-icon right"><i class="{{b.Icono}}"></i></div>
									<div class="t-content">
										<h6 class="text-uppercase"><b>{{b.TextoPeqMostrar}}</b></h6>
										<h1 class="mb-0 text-{{b.Color}}">{{b.TextoGraMostrar}}</h1>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="row row-sm">

						<div ng-repeat="b in ListadoBotones">

							<!--TIPO DE BOTON BLOQUE 4 -->

							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" ng-if="b.TipoBoton == 'BloqueD'">
								<div class="box box-block bg-white tile tile-4 mb-2 BtnTipoTurno"  data-valorBoton="{{b.ValorBoton}}" data-BotonID="{{b.BotonTurnoID}}"  ng-click="GenerarTicketTurno($event)">
									<div class="t-icon left bg-info"><i class="{{b.Icono}}"></i></div>
									<div class="t-content text-xs-right">
										<h6 class="text-uppercase"><b>{{b.TextoPeqMostrar}}</b></h6>
										<h1 class="mb-0 text-{{b.Color}}">{{b.TextoGraMostrar}}</h1>
									</div>
								</div>
							</div>

						</div>
					</div>

					</div>

					 <div id="Imprime"></div>


		<!-- Vendor JS -->
		<script type="text/javascript" src="assets/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="assets/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="assets/bootstrap4/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/js/moment.js"></script>
		<script type="text/javascript" src="assets/js/moment-with-locales.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>


		<script>
			moment.locale('es');
		</script>

		<script>

			var app = angular.module('appBotonesPantallaModule', []);

			app.controller('CtrlBotonesPantallaController', function($scope, $http) {

				$scope.sucursal = '<?= $_SESSION['DataUserOnline']['Usuario']->Sucursal?>';
				$scope.sucursalID = '<?= $_SESSION['DataUserOnline']['Usuario']->SucursalID?>';
				$scope.empresa = '<?= $_SESSION['DataUserOnline']['Usuario']->Empresa?>';
				$scope.empresaLogo = '<?= $_SESSION['DataUserOnline']['Usuario']->EmpresaLogo?>';
                $scope.departamento = '<?= $_SESSION['DataUserOnline']['Usuario']->Departamento?>';

				$http.post("Index.php?c=ponche&a=ListadoBotones", {Sucursal:$scope.sucursalOnline}).then(function (response) {

					if(response.status == 200){

						if(response.data){
							$scope.ListadoBotones = response.data;
						}else{
							$scope.ListadoBotones = [{'TextoGraMostrar': 'No hay Turnos', 'TextoPeqMostrar':'Error al cargar los Turnos' ,'Color': 'danger', 'Icono':'fa fa-user', 'TipoBoton': 'BloqueA'}];
						}

					}else{
						$scope.ListadoBotones = [{'TextoGraMostrar': 'No hay Turnos', 'TextoPeqMostrar':'Error al cargar los Turnos' ,'Color': 'danger', 'Icono':'fa fa-user', 'TipoBoton': 'BloqueA'}];
					}

				}, function() {
					$scope.ListadoBotones = [{'TextoGraMostrar': 'No hay Turnos', 'TextoPeqMostrar':'Error al cargar los Turnos' ,'Color': 'danger', 'Icono':'fa fa-user', 'TipoBoton': 'BloqueA'}];
				});


				$scope.GenerarTicketTurno = function(BtnSeleccionado){

					$scope.ValorTurnoBoton = BtnSeleccionado.currentTarget.getAttribute("data-valorBoton");
					$scope.BotonID = BtnSeleccionado.currentTarget.getAttribute("data-BotonID");

					$http.post("index.php?c=ponche&a=GenerarTurno", {Action: "GenerarTurno",BotonID: $scope.BotonID,  SucursalID: $scope.sucursalID}).then(function (response) {

						if(response.data[0]){

							$scope.NuevoTurno = response.data[0].Contador;

	$scope.MaquetaPrint = "<html><body style='font-family:Calibri; margin-top:-100px; '><center><img src='uploads/"+$scope.empresaLogo+"' width='150' height='100' '><br><b style='font-family:Calibri;font-size:0.8em;'> "+$scope.empresa+"</b><b style='font-family:Calibri;font-size:0.8em;'><br>"+$scope.sucursal+"-"+$scope.departamento+"</b><br> ____________________<br><b style='font-family:Calibri;'>TURNO</b></div><br><div style='font-family:Calibri;font-size:2em;'>"+$scope.ValorTurnoBoton+"-"+$scope.NuevoTurno+"</div><div style='font-family:Calibri;'> ____________________</div><p>"+moment().format('DD/MM/YYYY, h:mm:ss A');+"</p></center></body></html>";

							/*$scope.MaquetaPrint ="<html><center><div style='font-family:arial;'>"+$scope.empresa+"<br>"+$scope.sucursal+" <br> ____________________<br>TURNO</div><br><div style='font-family:arial;font-size:2em;'>"+$scope.ValorTurnoBoton+"-"+$scope.NuevoTurno+"</div><div style='font-family:arial;'> ____________________</div><p>"+moment().format('DD/MM/YYYY, h:mm:ss A');+"</p></center></html>";*/

	/*
	$.post("View/ponche/printer.php",{Empresa: $scope.empresa,  Sucursal: $scope.sucursal, Turno:$scope.ValorTurnoBoton, NuevoTurno: $scope.NuevoTurno, FechaHora: moment().format('DD/MM/YYYY, h:mm:ss A') }, function(data){
							      console.log(data);
	});
	*/
						 document.getElementById('Imprime').innerHTML = $scope.MaquetaPrint;  
					    ImprimirVar();


							/*swal({
								title: "",
								text: $scope.MaquetaPrint,
								timer: 2000
							}).then(
								function () {
									//Funcion que se ejecutara cuando se quite el cuadro
								}
							)*/
						}
					}, function (error) {
						console.log('an error occurred', error.data);
					});


				};

			});

			function ImprimirVar()  {
			  var objeto=document.getElementById('Imprime');  //obtenemos el objeto a imprimir
			  var ventana=window.open('ImprimirVar',  'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=400,height=400');  //abrimos una ventana vacía nueva
			  ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
			   ventana.print(); 
			 ventana.document.close();  //cerramos el documento
			 ventana.close();  //cerramos la ventana
			return false;
			}

		</script>

		<script>

			var ctrlPressed = false;
			// Alt + o para cerrar session
			$(document).keydown(function(e){

				if (e.keyCode == 18)
					ctrlPressed = true;

				if (ctrlPressed && (e.keyCode == 79))
					window.location.href = 'Index.php?c=Login&a=Logout';
			});

		</script>


		<script type="text/javascript" src="assets/detectmobilebrowser/detectmobilebrowser.js"></script>
		<script type="text/javascript" src="assets/jquery-fullscreen-plugin/jquery.fullscreen-min.js"></script>
		<script type="text/javascript" src="assets/sweetalert2/sweetalert2.min.js"></script>
		<script type="text/javascript" src="assets/js/ui-notifications.js"></script>
		


	</body>
</html>