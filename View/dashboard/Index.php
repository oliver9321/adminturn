<link rel="stylesheet" href="assets/DataTables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/DataTables/Responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="assets/DataTables/Buttons/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="assets/DataTables/Buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="assets/select2/select2.min.css">

<link rel="stylesheet" href="assets/toastr/toastr.min.css">
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

<div>

				<div class="content-area py-1">
					<div class="container-fluid">

						<div class="row row-md">

							<div class="box bg-white">
								<nav class="nav nav-1">
									<div class="row no-gutter">

										<div class="col-md-3 BtnAcciones btn-outline-danger" data-action="A" onMouseOver="this.style.cursor='pointer'">
											<a class="nav-link" href="#"><span>	<i class="ti-close"></i></span><br><h4 class="text-danger">ANULAR</h4></a>
										</div>

										<div class="col-md-3 BtnAcciones btn-outline-success" data-action="L" onMouseOver="this.style.cursor='pointer'">
											<a class="nav-link" href="#"><span> <i class="ti-microphone"></i></span><br><h4 class="text-success">RE-LLAMAR</h4></a>
										</div>

										<div class="col-md-3 BtnAcciones btn-outline-warning" data-action="P" onMouseOver="this.style.cursor='pointer'">
											<a class="nav-link" href="#"><span><i class="ti-user"></i></span><br><h4 class="text-warning">EN PUESTO</h4></a>
										</div>

										<div class="col-md-3 BtnAcciones btn-outline-primary" data-action="F" onMouseOver="this.style.cursor='pointer'">
											<a class="nav-link b-r-0" href="#"><span>  <i class="ti-check-box"></i></span><br><h4 class="text-primary">FINALIZAR</h4></a>
										</div>
									</div>
								</nav>
							</div>
						</div>



<!--
						<div class="row row-md">

							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 " >
								<div class="box box-block bg-white tile tile-4 mb-2 BtnAcciones" data-action="A" onMouseOver="this.style.cursor='pointer'">
									<div class="t-icon left bg-danger">
										<i class="ti-close"></i>
									</div>
									<div class="t-content text-xs-right">
										<h6 class="text-uppercase"><b>TURNO</b></h6>
										<h2 class="mb-0 text-primary">ANULAR</h2>
									</div>
								</div>
							</div>


							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 " >
									<div class="box box-block bg-white tile tile-4 mb-2 BtnAcciones" data-action="L" onMouseOver="this.style.cursor='pointer'">
										<div class="t-icon left bg-info">
                                            <i class="ti-microphone"></i>
                                        </div>
										<div class="t-content text-xs-right">
											<h6 class="text-uppercase"><b>TURNO</b></h6>
											<h2 class="mb-0 text-primary">RE-LLAMAR</h2>
										</div>
									</div>
								</div>


                	           <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" >
									<div class="box box-block bg-white tile tile-4 mb-2 BtnAcciones" data-action="P" onMouseOver="this.style.cursor='pointer'">
										<div class="t-icon left bg-warning">
                                            <i class="ti-user"></i>
                                        </div>
										<div class="t-content text-xs-right">
											<h6 class="text-uppercase"><b>TURNO</b></h6>
											<h2 class="mb-0 text-primary">EN ATENCION</h2>
										</div>
									</div>
								</div>

                            	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" >
									<div class="box box-block bg-white tile tile-4 mb-2 BtnAcciones" data-action="F" onMouseOver="this.style.cursor='pointer'">
										<div class="t-icon left bg-primary">
                                            <i class="ti-check-box"></i>
                                        </div>
										<div class="t-content text-xs-right">
											<h6 class="text-uppercase"><b>TURNO</b></h6>
											<h2 class="mb-0 text-primary">FINALIZAR</h2>
										</div>
									</div>
								</div>

						</div>

-->


                        <nav class="navbar navbar-white bg-blue navbar-bottom-line b-a mb-2">
							<button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar4" aria-controls="exCollapsingNavbar4" aria-expanded="false" aria-label="Toggle navigation"></button>
							<div class="collapse navbar-toggleable-sm" id="exCollapsingNavbar4">
								<a class="navbar-brand" href="#"><?=$_SESSION['DataUserOnline']['Usuario']->Puesto; ?> | <?=$_SESSION['DataUserOnline']['Usuario']->Departamento; ?> | <?=$_SESSION['DataUserOnline']['Usuario']->Sucursal; ?> | <span id="DateTime"></span><span id="ContadorTurnoEspera" class="text-danger"></span></a>
								<ul class="nav navbar-nav float-md-right">
									<li class="nav-item nav-estado-anulado">
										<a class="nav-link" href="#">ANULADO</a>
									</li>

									<li class="nav-item nav-estado-rellamar active">
										<a class="nav-link" href="#">RE-LLAMAR</a>
									</li>

									<li class="nav-item nav-estado-atencion">
										<a class="nav-link" href="#">EN PUESTO</a>
									</li>

									<li class="nav-item nav-estado-finalizar">
										<a class="nav-link" href="#">FINALIZAR</a>
									</li>

								</ul>
							</div>
						</nav>

					<div class="box box-block bg-white">
							<h5>ADMINISTRACION DE TURNOS</h5>
							<p class="font-90 text-muted mb-1"><?=NOMBRE_APLICATION.VERSION ?></p>
							<div class="row">

                                <div class="col-md-12">
									<ul class="nav nav-tabs mb-0-5" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#Atencion" role="tab">EN ATENCION</a>
										</li>
										<li class="nav-item" id="TabTurnosEspera">
											<a class="nav-link" data-toggle="tab" href="#Espera" role="tab">EN ESPERA</a>
										</li>

                                        <li class="nav-item" id="TabTurnosAnulados">
                                            <a class="nav-link" data-toggle="tab" href="#Anulados" role="tab">ANULADOS</a>
                                        </li>

									</ul>

										<div class="tab-content">
										<div class="tab-pane active" id="Atencion" role="tabpanel">

										<article>
											<div class="row">
												<div class="col-sm-12">
													<div id="card" class="weater">
														<div class="city-selected">
															<br></br>
															<center>
																<div class="temp" id="MostrarTurnoAtencion"></div>
															</center>
														</div>

														<div class="days" id="BloqueBtnIniciar">
															<div class="row row-no-gutter">

																<div class="col-md-12" id="BtnIniciar">
																	<div class="day" onMouseOver="this.style.cursor='pointer'">
																		<h1>INICIAR</h1>
																	</div>
																</div>

															</div>
														</div>
													</div>
												</div>
											</div>

										</article>
											<!--CANTIDAD DE TURNOS TRABAJOS O EN ESPERA -->
<!--
                                          <div class="box box-block bg-white">

                                            <div class="row">
                                                <div class="col-xs-2">
                                                    <div class="chart-easy" id="chart-easy-4" data-percent="2"><span>2%</span></div>
                                                </div>

                                                <div class="col-xs-2">
                                                    <div class="chart-easy" id="chart-easy-5" data-percent="1"><span>1%</span></div>
                                                </div>

                                                 <div class="col-xs-2">
                                                    <div class="chart-easy" id="chart-easy-6" data-percent="0"><span>0%</span></div>
                                                </div>

                                                <div class="col-xs-2">
                                                    <div class="chart-easy" id="chart-easy-7" data-percent="1"><span>1%</span></div>
                                                </div>

                                                   <div class="col-xs-2">
                                                    <div class="chart-easy" id="chart-easy-10" data-percent="0"><span>0%</span></div>
                                                </div>

                                                 <div class="col-xs-2">
                                                    <div class="chart-easy" id="chart-easy-9" data-percent="0"><span>0%%</span></div>
                                                </div>

                                            </div>
                                        </div>
-->
                                            <!--CANTIDAD DE TURNOS TRABAJOS -->

										</div>
										<div class="tab-pane" id="Espera" role="tabpanel">

											<table id="ListadoTurnosEspera" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%">
												<thead>
												<tr>
													<th>Turno</th>
													<th>Estado</th>
													<th>Estatus</th>
													<th>Fecha/Hora Selección</th>
												</thead>
											</table>
										</div>
                                        <div class="tab-pane" id="Anulados" role="tabpanel">

                                                <table id="ListadoTurnosAnulados" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>

                                                        <th></th>
                                                        <th>Id</th>
                                                        <th>Turno</th>
                                                        <th>Estado</th>
                                                        <th>Estatus</th>
                                                        <th>Puesto</th>
                                                        <th>Fecha Hora Anulacion</th>
                                                    </thead>
                                                </table>
                                         </div>

									</div>
								</div>

							</div>
						</div>


					</div>
				</div>
        </div>


	<div class="modal animated flipInX small-modal ModalAnularTurno" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title" id="mySmallModalLabel">Anulación de Turno</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="Comentario"><b>Razón de anulación:</b></label>
						<textarea name="ComentarioAnulacion" id="ComentarioAnulacion" placeholder="Ingrese la razón de anulación" class="form-control"></textarea>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" onclick="EnviarComentario('A')">Anular</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

<div class="modal animated flipInX small-modal ModalTransferirTurno" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="mySmallModalLabel">Transferencia de turno <b id="TurnoATransferir"></b> </h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="cmbPuestos"><b>Puestos:</b></label>
                    <select id="PuestoIDTransferir" name="PuestoIDTransferir" class="form-control select2" style="width: 100%">
                        <option value="" selected>Seleccione el puesto a transferir</option>
                        <?php foreach($Puestos as $a): ?>
                            <option value="<?php echo $a->Id; ?>"><?php echo $a->Nombre; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ComentarioTransferencia"><b>Razón de transferencia:</b></label>
                    <textarea name="ComentarioTransferencia" id="ComentarioTransferencia" placeholder="Ingrese la razón de la transferencia" class="form-control"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="TransferirTurnoPuesto()">Transferir</button>
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
Departamento:<input type="text" value="<?= $_SESSION['DataUserOnline']['Usuario']->Departamento ?>" name="Departamento" id="Departamento">
SucursalID:<input type="text" id="SucursalID" name="SucursalID"  value="<?= $_SESSION['DataUserOnline']['Usuario']->SucursalID ?>"><br>
ReLlamadas:<input type="text" id="CantReLlamadas" name="CantReLlamadas">
ContadorTiempoEspera:<input type="text" id="ContadorTiempoEspera">
</div>

<script type="text/javascript" src="assets/jquery/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="assets/js/moment.js"></script>
<script type="text/javascript" src="assets/js/moment-with-locales.js"></script>
<script type="text/javascript" src="assets/js/mostrarTurno.js"></script>
<script type="text/javascript" src="assets/js/select2.full.min.js"></script>

<script>

    $(function() {
        $('.select2').select2();
    });
</script>

<script>

    var refreshIntervalId = "";

    //Actualizar el estado de los turnos

				$(".BtnAcciones").on("click",function(){

					var Estado = this.getAttribute("data-action");

						if($("#TurnoIDEnAtencion").val() != "") {

					switch (Estado) {

							case 'A':

								if($("#EstadoTurnoAtencion").val() == "L"){
									$(".ModalAnularTurno").modal("show");
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
											toastr.success('Modo Manual Activado');

											clearTimeout(OpcionAutollamar);
											$("#MostrarTurnoAtencion").html();

											var n = 0;
											function update() {
												// ["+ n +"]
												$("#ContadorTurnoEspera").html(" | "+ n + ' | ');
												$("#MostrarTurnoAtencion").html("<b class='text-danger'>EN ESPERA PARA CONTINUAR</b>");
												$("#ContadorTiempoEspera").val(n);
												n++;
											}
                                             refreshIntervalId = setInterval(update, 1000);

											setTimeout(function () {
											//	swal("Información del Sistema", "Ha excedido el límite de tiempo.", "error");
                                                $("#ContadorTiempoEspera").val('');
                                                $("#MostrarTurnoAtencion").html("");
                                              //  GenerarLlamadaTurno();
                                                clearInterval(refreshIntervalId);
                                                $("#ContadorTiempoEspera").val("");
                                                $("#ContadorTurnoEspera").html('');

                                            }, 90000);

											$("#BloqueBtnIniciar").show(1000);
                                          //  $("#BtnIniciar").html("Continuar");
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
					if($("#ComentarioAnulacion").val() != ''){
					$(".ModalAnularTurno").modal("hide");
					ActualizarTurno(Estado);
					//toastr.options = {positionClass: 'toast-top-right'};
					toastr.error('Turno Anulado!');

					$("#ComentarioAnulacion").val("");

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
						"Comentario": 	$("#ComentarioAnulacion").val()
					}; //Array

					$.ajax({
						url: "Index.php?c=dashboard&a=ActualizarEstadoTurnoController",
						type: "POST",
						data: formData,
						success: function (data, textStatus) {

						    console.log(data);

							if (textStatus == "success") {

								var JsonData = JSON.parse(data);

								$("#BloqueBtnIniciar").hide();
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
						swal({ title: "Turno anulado", text: "Se autollamara el próximo en 10 seg.", timer: 10000, showConfirmButton: false, type: "success" });
						setTimeout(function(){ GenerarLlamadaTurno(); }, 10000);
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
						url : "Index.php?c=dashboard&a=GetLastTurnByPuestoController",
						type: "POST",
						data : formData,
						success: function(data, textStatus, jqXHR)
						{
							if (textStatus == "success") {

								var JsonData = JSON.parse(data);

								if(JsonData.data.length > 0){

									$("#BloqueBtnIniciar").hide();
									$("#TurnoIDEnAtencion").val(JsonData.data[0].TurnoID);
									$("#TurnoEnAtencion").val(JsonData.data[0].Turno);
									$("#EstadoTurnoAtencion").val(JsonData.data[0].Estado);
									$("#CantReLlamadas").val(JsonData.data[0].CantReLlamadas);
									$("#MostrarTurnoAtencion").html(JsonData.data[0].Turno);
									MarcarEstadoNav(JsonData.data[0].Estado);

									}else{

									$("#BloqueBtnIniciar").show(1000);
									$("#MostrarTurnoAtencion").html("<b class='text-danger'>NO HAY TURNOS EN ESPERA</b>");
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
                $("#ContadorTiempoEspera").val("");

				$.ajax({
					url : "Index.php?c=dashboard&a=GenerarLlamadaTurnoController",
					type: "POST",
					data : formData,
					success: function(data)
					{
						var JsonData = JSON.parse(data);

							if(JsonData[0].Turno != null && JsonData[0].TurnoID != '0'){

								$("#MostrarTurnoAtencion").html(JsonData[0].Turno);
								$("#TurnoEnAtencion").val(JsonData[0].Turno);
								$("#TurnoIDEnAtencion").val(JsonData[0].TurnoID);
								$("#BloqueBtnIniciar").hide(1000);
								$("#ContadorTurnoEspera").html(""); // OLIVER;
								$("#EstadoTurnoAtencion").val("L");
								MarcarEstadoNav("L");
                                toastr.success('Nuevo turno!');
							///	SendTurnoPantalla();

							}else{
								$("#BloqueBtnIniciar").show(1000);
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

<script>
function update() {
    $('#DateTime').html(moment().format('LTS'));
}
setInterval(update, 1000);


$("#BtnIniciar").on('click', function () {
    $("#ContadorTiempoEspera").val('');
    $("#MostrarTurnoAtencion").html("");
    //  GenerarLlamadaTurno();
    clearInterval(refreshIntervalId);
    $("#ContadorTiempoEspera").val("");
    $("#ContadorTurnoEspera").html('')
    GenerarLlamadaTurno();
});


$("#TabTurnosEspera").on('click', function(){
	MostrarListadoTurnosEspera();
});

$("#TabTurnosAnulados").on('click', function(){

    MostrarListadoTurnosAnulados();
});


function MostrarListadoTurnosEspera(){

	$('#ListadoTurnosEspera').DataTable({
		"responsive": true,
		destroy: true,
		"ajax": {
			"url": "Index.php?c=dashboard&a=GetListTurnosBySucursal",
		},
		columns:[
			{data: "TurnoConcatenado"},
			{data: "Estado"},
			{data: "Estatus"},
			{data: "FechaHoraSeleccion"}
		]
	});
}

function MostrarListadoTurnosAnulados(){

       $('#ListadoTurnosAnulados').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        "bDestroy": true,
        "ajax": "Index.php?c=dashboard&a=GetListTurnosAnulados",
        "columns": [
            {
                targets: 1, data: null,
                defaultContent: '<button type="button" id="btnActivarTurno"  onclick="ShowModalActivarTurno(this)"  title="Activar turno" data-toggle="tooltip" class="btn btn-success"><i class="	fa fa-check-square" aria-hidden="true"></i></button>'
            },
            { "data": "Id" },
            { "data": "TurnoConcatenado" },
            { "data": "Estado" },
            { "data": "Estatus" },
            { "data": "Puesto" },
            { "data": "FechaHoraAnulacion" }
        ]

    });

}

function ShowModalActivarTurno(e) {

    var TurnoID = $(e).parents('tr').find('td:eq(1)').html();

    $.ajax({
        url : "Index.php?c=dashboard&a=ActivarTurnoAnulado",
        type: "POST",
        data : {'Action': 'ActivarTurnoAnulado', 'TurnoID': TurnoID},
        success: function(data) {

            if(data){
                toastr.success('Turno Reactivado!');
            }
        }
    });

    $('#ListadoTurnosAnulados').DataTable().ajax.reload();
}

function TransferirTurnoPuesto(){

    var PuestoIDTransferir = $("#PuestoIDTransferir").val();
    var ComentarioTransferir = $("#ComentarioTransferencia").val();
    var TurnoID= $("#TurnoIDEnAtencion").val();

    if(PuestoIDTransferir != '' && ComentarioTransferir != ''){

        $.ajax({
            url: "Index.php?c=dashboard&a=TransferirTurnoPuesto",
            type: "POST",
            data: {Action: "TransferirTurnoPuesto", PuestoIDTransferir: PuestoIDTransferir,ComentarioTransferir: ComentarioTransferir, TurnoID:TurnoID },
            success:function(data){

                if(data){
                    toastr.success('Turno transferido!');
                    GenerarLlamadaTurno();
                }else{
                    toastr.error('Ha ocurrido un error');
                }

                $(".ModalTransferirTurno").modal("hide");

            }
        });

    }else{
        toastr.error('Debe completar todos los campos!');
    }


}


</script>





<script type="text/javascript" src="assets/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/DataTables/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="assets/DataTables/Responsive/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="assets/DataTables/Responsive/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="assets/toastr/toastr.min.js"></script>

