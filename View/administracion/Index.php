<!-- Content -->
<link rel="stylesheet" href="assets/select2/select2.min.css">
<link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">

<div class="content-area py-1">
	<div class="container-fluid">

		<div class="float-xs-right">
			<button class="btn btn-link btn-sm text-muted" title="Refrescar Dashboard" type="button" onclick="GetTotalTurnosByUsers()">Refrescar Dashboard <i class="ti-reload"></i></button>
		</div>
			<div class="form-group">
				<label for="cmbDepartamento"><b>Departamentos:</b></label>
				<select id="DepartamentoID" name="DepartamentoID" class="form-control select2" style="width: 100%">
					<option value="" selected>Seleccione un departamento para cargar la informacion</option>
					<?php foreach($Departamentos as $a): ?>
						<option value="<?php echo $a->Id; ?>"><?php echo $a->Nombre; ?></option>
					<?php endforeach; ?>
				</select>
			</div>

		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="box box-block bg-white tile tile-4 mb-2">
					<div class="t-icon left bg-warning"><i class="fa fa-users"></i></div>
					<div class="t-content text-xs-right">
						<h6 class="text-uppercase">Total Turnos (Hoy)</h6>
						<h1 class="mb-0" id="TotalTurnos">0</h1>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="box box-block bg-white tile tile-4 mb-2">
					<div class="t-icon left bg-danger"><i class="fa fa-hourglass-start"></i></div>
					<div class="t-content text-xs-right">
						<h6 class="text-uppercase">Total en Espera (Hoy)</h6>
						<h1 class="mb-0" id="TotalTurnosEspera">0</h1>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="box box-block bg-white tile tile-4 mb-2">
					<div class="t-icon left bg-primary"><i class="ti-receipt"></i></div>
					<div class="t-content text-xs-right">
						<h6 class="text-uppercase">Total en Puesto</h6>
						<h1 class="mb-0" id="TotalTurnosEnPuesto">0</h1>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="box box-block bg-white tile tile-4 mb-2">
					<div class="t-icon left bg-success"><i class="fa fa-check"></i></div>
					<div class="t-content text-xs-right">
						<h6 class="text-uppercase">Total Finalizados</h6>
						<h1 class="mb-0" id="TotalTurnosFinalizados">0</h1>
					</div>
				</div>
			</div>
		</div>

		<!--<div class="row row-md mb-2">
			<div class="col-md-3">
				<div class="box box-block bg-white">
					<div class="clearfix mb-1">
						<h5 class="float-xs-left">PROYECCION</h5>
						<div class="float-xs-right">
							<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-angle-down"></i></button>
							<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-reload"></i></button>
							<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-close"></i></button>
						</div>
					</div>
					<div class="text-xs-center">
						<div class="btn-group mb-1">
							<button type="button" class="btn btn-secondary btn-sm active waves-effect waves-light">Complete</button>
							<button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Open</button>
						</div>
					</div>
					<div class="chart-container" style="height: 250px;">
						<div id="chart-1" class="chart-placeholder"></div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-block bg-white">
					<div class="clearfix mb-1">
						<h5 class="float-xs-left">Tasks</h5>
					</div>

					<div class="chart-container" style="height: 250px;">
						<div id="chart-2" class="chart-placeholder"></div>
					</div>
				</div>
			</div>


			<div class="col-md-3">
				<div class="box box-block bg-white">
					<div class="clearfix mb-1">
						<h5 class="float-xs-left">Sales</h5>
						<div class="float-xs-right">
							<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-angle-down"></i></button>
							<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-reload"></i></button>
							<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-close"></i></button>
						</div>
					</div>
					<div class="chart-container" style="height: 250px;">
						<div id="chart-3" class="chart-placeholder"></div>
					</div>
				</div>
			</div>
		</div>-->


		<div class="row row-md mb-2">
			<div class="col-md-6">
				<div class="box box-block bg-white">
					<h5 class="mb-2">CANTIDAD TURNOS ATENDIDOS POR USUARIO</h5>
					<div id="ListadoCantidadTurnosUsuarios" style="height: 250px; overflow-y:auto;"></div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="box bg-white">
					<div class="box-block clearfix">
						<h5 class="float-xs-left">REPORTES DIARIOS</h5>
					</div>
					<div  style="height: 250px; overflow-y:auto;">
					<table class="table mb-md-0">
						<tbody>

						<tr>
							<th scope="row">1</th>
							<td>Listado de turnos atendidos</td>

							<td>
								<span class="tag tag-success">Ver</span>
							</td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>
								<a class="text-primary" href="#"><span class="underline">Cantidad por tipo servicio</span></a>
							</td>

							<td>
								<span class="tag tag-success">Ver</span>
							</td>
						</tr>

						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>

			<!--<div class="row row-md mb-2">
			<div class="col-md-6">
				<div class="card">
					<div class="card-block b-b clearfix">
						<h5 class="float-xs-left">Messages</h5>
						<div class="float-xs-right">
							<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-angle-down"></i></button>
							<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-reload"></i></button>
							<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-close"></i></button>
						</div>
					</div>
					<div class="items-list">
						<div class="il-item">
							<a class="text-black" href="#">
								<div class="media">
									<div class="media-left">
										<div class="avatar box-48">
											<img class="b-a-radius-circle" src="img/avatars/1.jpg" alt="">
											<i class="status bg-success bottom right"></i>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading">John Doe</h6>
										<span class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</span>
									</div>
								</div>
								<div class="il-icon"><i class="fa fa-angle-right"></i></div>
							</a>
						</div>
						<div class="il-item">
							<a class="text-black" href="#">
								<div class="media">
									<div class="media-left">
										<div class="avatar box-48">
											<img class="b-a-radius-circle" src="img/avatars/2.jpg" alt="">
											<i class="status bg-danger bottom right"></i>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading">John Doe</h6>
										<span class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</span>
									</div>
								</div>
								<div class="il-icon"><i class="fa fa-angle-right"></i></div>
							</a>
						</div>
						<div class="il-item">
							<a class="text-black" href="#">
								<div class="media">
									<div class="media-left">
										<div class="avatar box-48">
											<img class="b-a-radius-circle" src="img/avatars/3.jpg" alt="">
											<i class="status bg-secondary bottom right"></i>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading">John Doe</h6>
										<span class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</span>
									</div>
								</div>
								<div class="il-icon"><i class="fa fa-angle-right"></i></div>
							</a>
						</div>
					</div>
					<div class="card-block">
						<button type="submit" class="btn btn-primary btn-block">Open chat app</button>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-block bg-white">
					<h5 class="mb-2">CPU load</h5>
					<div class="chart-container" style="height: 340px;">
						<div id="realtime" class="chart-placeholder"></div>
					</div>
				</div>
			</div>
		</div>-->

	</div>
</div>

<!-- Footer -->
<script type="text/javascript" src="assets/jquery/jquery-1.12.3.min.js"></script>

<script type="text/javascript" src="assets/js/select2.full.min.js"></script>

<script type="text/javascript" src="assets/switchery/dist/switchery.min.js"></script>
<!--<script type="text/javascript" src="assets/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="assets/flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="assets/flot/jquery.flot.stack.js"></script>
<script type="text/javascript" src="assets/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="assets/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script type="text/javascript" src="assets/CurvedLines/curvedLines.js"></script>-->
<script type="text/javascript" src="assets/TinyColor/tinycolor.js"></script>
<script type="text/javascript" src="assets/sparkline/jquery.sparkline.min.js"></script>
<!--<script type="text/javascript" src="assets/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script type="text/javascript" src="assets/jvectormap/jquery-jvectormap-world-mill.js"></script>

<script type="text/javascript" src="assets/js/index3.js"></script>-->

<script type="text/javascript">
	$('.select2').select2();
</script>

<script type="text/javascript">

	function HideModal(){
		$('.flipInX').modal('hide');
	}
</script>


<script>

		$("#DepartamentoID").on("change", function(){
			GetTotalTurnosByUsers();
		});

		function GetTotalTurnosByUsers(){

		var DepartamentID = $(".select2 option:selected").val();

		if(DepartamentID != ''){

			var formData = {DepartamentID: DepartamentID}; //Array

			$.ajax({
				url : "Index.php?c=administracion&a=GetTotalTurnosByUsers",
				type: "POST",
				data : formData,
				success: function(data) {

					toastr.options = {positionClass: 'toast-top-right'};
					toastr.success('Información Actualizada!');

					var JsonData = JSON.parse(data);

					$('#ListadoCantidadTurnosUsuarios').html("");

					$("#TotalTurnos").html(JsonData.TotalTurnosDepartamento);
					$("#TotalTurnosEspera").html(JsonData.TotalTurnosEspera);
					$("#TotalTurnosEnPuesto").html(JsonData.TotalTurnosEnPuesto);
					$("#TotalTurnosFinalizados").html(JsonData.TotalTurnosFinalizados);

					$.each(JsonData['TurnosUsuarios'], function( key, value ) {

						if (value.Usuario != null) {
							$('#ListadoCantidadTurnosUsuarios').append('<p class="mb-0-5">' + value.Usuario + '<span class="float-xs-right">' + value.Total + '</span></p><progress class="progress progress-success progress-sm" value="' + value.Total + '" max="100">100%</progress>');
						}

					});


				}
			});


		}else{
			swal("Informacion de Sistema", "Seleccione un departamento", "error")
		}
			}




</script>



<script type="text/javascript" src="assets/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript" src="assets/toastr/toastr.min.js"></script>