
<!DOCTYPE html>
<html lang="es">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>Pantalla | OnTime</title>

		<link rel="stylesheet" href="assets/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/animate.css/animate.min.css">
		<link rel="stylesheet" href="assets/jscrollpane/jquery.jscrollpane.css">
        <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="assets/tv.css">
    <script type="text/javascript" src="assets/js/moment.js"></script>
    <script type="text/javascript" src="assets/js/moment-with-locales.js"></script>


</head>
	<body class="fixed-header fixed-footer skin-7 content-appear">
		<div class="wrapper">

			<!-- Preloader -->
			<div class="preloader"></div>

			<!-- Header -->
            <div class="site-header">
				<nav class="navbar navbar-light">
					<div class="navbar-left">
						<a class="navbar-brand" href="#">
							<h2 style="color:white"><?=NOMBRE_APLICATION.VERSION ?></h2>
						</a>

					</div>

					<div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">

						<ul class="nav navbar-nav float-md-right">

							<li class="nav-item dropdown">
								<a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
                                    <p><h1 id="DateTime">00:00</h1></p>
								</a>
							</li>
						</ul>
						<ul class="nav navbar-nav float-md-left">
							<br><li><h2><?=$_SESSION['DataUserOnline']['Usuario']->Departamento; ?> -  <?=$_SESSION['DataUserOnline']['Usuario']->Sucursal; ?></h2></li>
						</ul>

                    </div>
				</nav>
			</div>

			<div class="site-content">
				<!-- Content -->
				<div class="content-area py-2">
					<div class="container-fluid">
						<div class="row row-md mb-1">

                            <div class="col-md-5" style="background-color: black">
								<div class="box bg-white user-1" style="background-color: black !important; height:640px; overflow: hidden; ">
								<div id="player" width="100%"></div>
								</div>
							</div>


                            <div class="col-md-7">

                                <div class="box box-block bg-white" style="height:650px; overflow: hidden;">

                                    <div class="row row-md">

									<div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                                        <div class="box box-block tile tile-2 bg-black mb-2">
                                            <div class="t-content">
                                                <h1 class="mb-1">TURNO</h1>
                                            </div>
                                        </div>
                                    </div>

								   <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
										<div class="box box-block tile tile-2 bg-black mb-2">
											<div class="t-content">
												<h1 class="mb-1">PUESTO</h1>
											</div>
										</div>
									</div>

									<div id="ListadoTurnosAtencion"></div>

						          </div>
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
                                </button>

                            </div>
                            <div class="modal-body">
                                <center>
                              <b style="font-size:5em" class="text-primary" id="TurnoMostrar"></b>
                                <p><h1>A</h1></p>
                              <b style="font-size:5em" id="PuestoMostrar"></b>
                                </center>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>

				<!-- Footer -->
				<footer class="footer">
					<div class="container-fluid">
							<div class="col-sm-12 text-sm-left mb-0-1">
                                <marquee><p style="font-family: Impact; font-size: 32pt" loop="5" id="Marquesina"></p></marquee>
							</div>
					</div>
				</footer>
			</div>

		</div>
		<div id="audio" hidden></div>

	    <input type="hidden" id="TurnoEnPuesto">
		<input type="hidden" id="RutaArchivoSucursal" value="<?php echo $_SESSION['$RutaTurnos_File'] ?>">

	</body>

<?php

// Canal de Youtube: Lista de videos a reproducir.

$PlayListYoutube = "";
$ModoPlayListYoutube = "";
$LlamadaPorVoz = true;
$ModoDebug = false;

foreach ($_SESSION['DataUserOnline']['System'] as $key => $value ){

    if($value->Campo == "PlayListYoutube"){
        $PlayListYoutube = $value->Valor;
        $ModoPlayListYoutube = $value->Descripcion;
    }

    if($value->Campo == "PantallaLlamadaPorVoz"){
        $LlamadaPorVoz = $value->Valor;
    }

    if($value->Campo == "Debug"){
        $ModoDebug = $value->Valor;
    }
}

?>


</html>

        <script>
            function update() {
				$('#DateTime').html(moment().format('LT'));
            }
            setInterval(update, 1000);

        </script>


        <!-- Vendor JS -->
		<script type="text/javascript" src="assets/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="assets/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="assets/bootstrap4/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/detectmobilebrowser/detectmobilebrowser.js"></script>
		<script type="text/javascript" src="assets/jscrollpane/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="assets/jscrollpane/mwheelIntent.js"></script>
		<script type="text/javascript" src="assets/jscrollpane/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" src="assets/jquery-fullscreen-plugin/jquery.fullscreen-min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
        <script type="text/javascript" src="assets/js/ui-modal.js"></script>
		<script src="assets/js/responsivevoice.js"></script>


<script>


    var PlayListYoutube = "<?php echo $PlayListYoutube ?>";
    var ModoPlayListYoutube = "<?php echo $ModoPlayListYoutube ?>";
    var ModoDebug = "<?php echo $ModoDebug ?>";
    var LlamadaPorVoz = "<?php echo $LlamadaPorVoz ?>";

	var tag = document.createElement('script');
	tag.src = "http://www.youtube.com/player_api";
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	var player;
	function onYouTubePlayerAPIReady() {

	    if(ModoPlayListYoutube == 'Listado'){

            player = new YT.Player('player',
                {
                    height: '600',
                    width: '600',
                    playerVars: {listType:'playlist', list: PlayListYoutube, vq:'hd720', loop:1, controls: 0, showinfo: 0, theme: 'white', rel: 0},
                    events: {
				      'onReady': onPlayerReady
				    }
                });

        }else{

            player = new YT.Player('player', {
                height: '600',
                width: '600',
                videoId: PlayListYoutube,
			     playerVars: {
			        playlist: PlayListYoutube,
			        loop: 1,'vq':'hd720', controls: 0,showinfo: 0,theme: 'white',rel: 0
			      },events: {
				      'onReady': onPlayerReady
				    }
           
            });

        }

        function onPlayerReady(event) {
		  event.target.setVolume(20);

		}
	}


	    var DepartamentoID = "<?php echo $_SESSION['DataUserOnline']['Usuario']->DepartamentoID ?>";

		function getContent(timestamp) {

			var queryString = {'timestamp' : timestamp, 'RutaArchivo':$("#RutaArchivoSucursal").val()};

		$.ajax(
		{
		type: 'GET',
		url: 'Controller/control_turnos.php',
		data: queryString,
		success: function(data){

		    if(ModoDebug == 'true'){
                console.log(data);
            }

		     var json = jQuery.parseJSON(data);

			if(json.Turno != 0 && json.Turno != null) {

				if(json.DepartamentoID == DepartamentoID){

				if (json.Estado == "L") {

					$("#TurnoMostrar").html(json.Turno);
					$("#PuestoMostrar").html(json.Puesto);
					setTimeout(function () {
						StopVideo();
					},2000);

					$("#audio").html('<audio src="assets/audio/tonoturno.mp3" type="audio/x-mp3" controls autoplay="autoplay"> <source src="assets/audio/tonoturno.mp3"/> </audio>');

					setTimeout(function () {

						$('.flipInX').modal('show');

                        if(LlamadaPorVoz == 'true'){
                            responsiveVoice.speak(json.Turno+". A "+json.Puesto, "Spanish Female");
                        }

					}, 2500);

					setTimeout(function () {
						$('.flipInX').modal('hide');
						PlayVideo();
					}, 5000);

				} else if (json.Estado == "P") {

					$("#ListadoTurnosAtencion").append('<div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ' + json.Turno + '"><div class="box box-block tile tile-2 bg-primary mb-2"> <div class="t-content"><h1 class="mb-1">' + json.Turno + '</h1></div> </div> </div> <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ' + json.Turno + '"> <div class="box box-block tile tile-2 bg-primary mb-2"> <div class="t-content"><h1 class="mb-1">' + json.Puesto + '</h1></div></div></div>');
					$("#TurnoEnPuesto").val(json.Turno);

				} else if (json.Estado == "F") {
					$("."+json.Turno).remove();

				}
				}
			}
				getContent(json.timestamp);

		}

		});
		}

		// Funcion que lee el archivo por dept. y sucursal donse se encuentran los turnos
	$(document).ready(function () {

		getContent();

		setTimeout(function () {
			PlayVideo();
		}, 5000);

	});

    
	function StopVideo() {
		player.pauseVideo();
	}

	function PlayVideo() {
		player.playVideo();
	}

</script>

		<!--Funcion para cerrar la session-->
		<script>

			var ctrlPressed = false;
			// Alt + o para cerrar session
			$(document).keydown(function(e){

				if (e.keyCode == 18)
					ctrlPressed = true;

				if (ctrlPressed && (e.keyCode == 79))
					window.location.href = 'Index.php?c=login&a=Logout';
			});

		</script>
		<!--MARQUESINA PARA MOSTRAR INFORMACION-->
		<script>

			function GetListMarquesina(HoraActual){

				$.ajax({
					url: "Index.php?c=mant_marquesina&a=GetListMarquesina",
					type: "POST",
					data: {Action: "GetListMarquesina", Hora: HoraActual},
					success: function (data) {

                        if(ModoDebug == true){
                            console.log(data);
                        }

						if(data != '0'){

							var Json = JSON.parse(data);
							$.each(Json, function( key, value ) {
								$('#Marquesina').html(value);
							});
						}

					}
				});
			}

			function ShowMarquesina() {
				GetListMarquesina(moment().format('hh:mm'))
			}
			setInterval(ShowMarquesina, 300000);

        </script>

