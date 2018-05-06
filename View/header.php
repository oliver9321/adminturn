<!DOCTYPE html>
<html lang="es">
	<head>
		 <title><?=NOMBRE_APLICATION.VERSION ?></title>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta name="description" content="">
            <meta name="author" content="Oliver Fermin">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="assets/bootstrap4/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/animate.css/animate.min.css">
        <link rel="stylesheet" href="assets/jscrollpane/jquery.jscrollpane.css">
        <link rel="stylesheet" href="assets/waves/waves.min.css">
        <link rel="stylesheet" href="assets/switchery/dist/switchery.min.css">
        <link rel="stylesheet" href="assets/morris/morris.css">
        <link rel="stylesheet" href="assets/jvectormap/jquery-jvectormap-2.0.3.css">
        <link href="assets/bootstrap4/css/bootstrap-toggle.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">
        <link rel="stylesheet" href="assets/switchery/dist/switchery.min.css">
        <link rel="stylesheet" href="assets/jquery-wizard/libs/formvalidation/formValidation.min.css">

        <link rel="stylesheet" href="assets/toastr/toastr.min.css">
        <link rel="stylesheet" href="assets/dropify/dist/css/dropify.min.css">
        <!-- Neptune CSS -->
        <link rel="stylesheet" href="assets/core.css">
        <script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js"></script>
        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->

    <style>
        .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
        .toggle.ios .toggle-handle { border-radius: 20px; }


        .col-md-2, .col-md-10{
            padding:0;
        }
        .panel{
            margin-bottom: 0px;
        }

        .chat-window > div > .panel{
            border-radius: 5px 5px 0 0;
        }
        .icon_minim{
            padding:2px 10px;
        }
        .msg_container_base{
            background: #e5e5e5;
            margin: 0;
            padding: 0 10px 10px;
            height:500px;
            max-height:520px;
            overflow-x:hidden;
        }
        .top-bar {
            background: white;
            color: black;
            padding: 10px;
            position: relative;
            overflow: hidden;
        }
        .msg_receive{
            padding-left:0;
            margin-left:0;
        }
        .msg_sent{
            padding-bottom:20px !important;
            margin-right:0;
        }
        .messages {
            background: white;
            padding: 10px;
            border-radius: 2px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            max-width:100%;
        }
        .messages > p {
            font-size: 13px;
            margin: 0 0 0.2rem 0;
        }
        .messages > time {
            font-size: 11px;
            color: #ccc;
        }
        .msg_container {
            padding: 10px;
            overflow: hidden;
            display: flex;
        }
        .chatimg {
            display: block;
            width: 100%;
        }
        .avatar {
            position: relative;
        }
        .base_receive > .avatar:after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 0;
            height: 0;
            border: 5px solid #FFF;
            border-left-color: rgba(0, 0, 0, 0);
            border-bottom-color: rgba(0, 0, 0, 0);
        }

        .base_sent {
            justify-content: flex-end;
            align-items: flex-end;
        }
        .base_sent > .avatar:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 0;
            border: 5px solid white;
            border-right-color: transparent;
            border-top-color: transparent;
        }

        .msg_sent > time{
            float: right;
        }



        .msg_container_base::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        .msg_container_base::-webkit-scrollbar
        {
            width: 12px;
            background-color: #F5F5F5;
        }

        .msg_container_base::-webkit-scrollbar-thumb
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }

        .btn-group.dropup{
            position:fixed;
            left:0px;
            bottom:0;
        }

        .panel-footer {
            padding: 10px 15px;
            background-color: #C0C0C0;
            border-top: 1px solid #ddd;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }
    </style>


    </head>

        <!--<body class="fixed-sidebar fixed-header content-appear">-->
    <body class="fixed-sidebar fixed-header content-appear skin-default">
        <div class="wrapper">

            <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Sidebar -->
        <div class="site-overlay"></div>
        <div class="site-sidebar">
            <div class="custom-scroll custom-scroll-light scroll-pane" style="overflow-y: auto">
                <ul class="sidebar-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="?c=Dashboard&a=minipopup" class="waves-effect  waves-light">
                            <span class="s-icon"><i class="ti-layout-tab"></i></span>
                            <span class="s-text">Minipopup</span>
                        </a>
                    </li>

                    <li>
                        <a href="?c=Dashboard&a=Index" class="waves-effect  waves-light">
                            <span class="s-icon"><i class="ti-layout-tab"></i></span>
                            <span class="s-text">Dashboard</span>
                        </a>
                    </li>


                    <li>
                        <a href="?c=ponche&a=Index" class="waves-effect  waves-light">
                            <span class="s-icon"><i class="ti-layout-tab"></i></span>
                            <span class="s-text">Pantalla de Ponche</span>
                        </a>
                    </li>

                    <li>
                        <a href="?c=Pantalla&a=Index" class="waves-effect  waves-light">
                            <span class="s-icon"><i class="ti-desktop "></i></span>
                            <span class="s-text">Pantalla de Turnos</span>
                        </a>
                    </li>

            <?php if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {?>

                    <li class="menu-title">Mantenimientos</li>

                    <li class="with-sub">
                        <!--EMPRESAS-->
                        <a href="#" class="waves-effect  waves-light">
                            <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                            <span class="s-icon"><i class="ti-pencil-alt"></i></span>
                            <span class="s-text">Empresas</span>
                        </a>
                        <ul>
                            <li><a href="?c=mant_empresa&a=Edit">Nueva Empresa</a></li>
                            <li><a href="?c=mant_empresa&a=Index">Ver Listado</a></li>

                        </ul>
                    </li>

                        <!--SUCURSALES-->
                    <li class="with-sub">
                        <a href="#" class="waves-effect  waves-light">
                            <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                            <span class="s-icon"><i class="ti-pencil-alt"></i></span>
                            <span class="s-text">Sucursales</span>
                        </a>
                        <ul>
                            <li><a href="?c=mant_sucursales&a=Edit">Nueva Sucursal</a></li>
                            <li><a href="?c=mant_sucursales&a=Index">Ver Listado</a></li>

                        </ul>
                    </li>

                        <!--DEPARTAMENTOS-->
                    <li class="with-sub">
                        <a href="#" class="waves-effect  waves-light">
                            <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                            <span class="s-icon"><i class="ti-pencil-alt"></i></span>
                            <span class="s-text">Departamentos</span>
                        </a>
                        <ul>
                            <li><a href="?c=mant_departamentos&a=Edit">Nuevo Departamento</a></li>
                            <li><a href="?c=mant_departamentos&a=Index">Ver Listado</a></li>

                        </ul>
                    </li>

                    <!--PUESTOS-->
                    <li class="with-sub">
                        <a href="#" class="waves-effect  waves-light">
                            <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                            <span class="s-icon"><i class="ti-pencil-alt"></i></span>
                            <span class="s-text">Puestos</span>
                        </a>
                        <ul>
                            <li><a href="?c=mant_puestos&a=Edit">Nuevo Puesto</a></li>
                            <li><a href="?c=mant_puestos&a=Index">Ver Listado</a></li>

                        </ul>
                    </li>

                    <!--PERFILES DE USUARIOS-->
                    <li class="with-sub">
                        <a href="#" class="waves-effect  waves-light">
                            <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                            <span class="s-icon"><i class="ti-pencil-alt"></i></span>
                            <span class="s-text">Perfiles</span>
                        </a>
                        <ul>
                            <li><a href="?c=mant_perfiles_usuarios&a=Edit">Nuevo Perfil</a></li>
                            <li><a href="?c=mant_perfiles_usuarios&a=Index">Ver Listado</a></li>

                        </ul>
                    </li>

                    <!--MODULOS-->
                    <li class="with-sub">
                        <a href="#" class="waves-effect  waves-light">
                            <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                            <span class="s-icon"><i class="ti-pencil-alt"></i></span>
                            <span class="s-text">Modulos</span>
                        </a>
                        <ul>
                            <li><a href="?c=mant_modulos&a=Edit">Crear Modulo</a></li>
                            <li><a href="?c=mant_modulos&a=Index">Ver Listado</a></li>
                        </ul>
                    </li>

                    <!--MANT DE MARQUESINA-->
                    <li class="with-sub">
                        <a href="#" class="waves-effect  waves-light">
                            <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                            <span class="s-icon"><i class="ti-pencil-alt"></i></span>
                            <span class="s-text">Marquesinas</span>
                        </a>
                        <ul>
                            <li><a href="?c=mant_marquesina&a=Edit">Nuevo Marquesina</a></li>
                            <li><a href="?c=mant_marquesina&a=Index">Ver Listado</a></li>

                        </ul>
                    </li>

                    <!--MANT DE USUARIOS-->
                    <li class="with-sub">
                        <a href="#" class="waves-effect  waves-light">
                            <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                            <span class="s-icon"><i class="ti-user"></i></span>
                            <span class="s-text">Usuarios</span>
                        </a>
                        <ul>
                            <li><a href="?c=mant_usuarios&a=Edit">Nuevo Usuario</a></li>
                            <li><a href="?c=mant_usuarios&a=Index">Ver Listado</a></li>

                        </ul>
                    </li>


                    <li class="menu-title">Administracion Turnos</li>

                    <li class="with-sub compact-hide">
                                          <a href="javascript: void(0);" class="waves-effect  waves-light">
                                              <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                                              <span class="s-icon"><i class="ti-menu"></i></span>
                                              <span class="s-text">Turnos</span>
                                          </a>
                                          <ul>

                                              <li class="with-sub">
                                                  <a href="javascript: void(0);">
                                                      <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                                                      <span class="s-text">Botones</span>
                                                  </a>
                                                  <ul>
                                                      <li><a href="?c=mant_botones_turnos&a=Edit">Nuevo Boton</a></li>
                                                      <li><a href="?c=mant_botones_turnos&a=Index">Ver Listado</a></li>
                                                  </ul>
                                              </li>

                                              <li class="with-sub">
                                                  <a href="javascript: void(0);">
                                                      <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                                                      <span class="s-text">Botones por Dept.</span>
                                                  </a>
                                                  <ul>
                                                      <li><a href="?c=mant_botones_departamento&a=Edit">Asignar a Dept.</a></li>
                                                      <li><a href="?c=mant_botones_departamento&a=Index">Ver Listado</a></li>
                                                  </ul>
                                              </li>


                                              <li class="with-sub">
                                                  <a href="javascript: void(0);">
                                                      <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                                                      <span class="s-text">Prioridades Turnos</span>
                                                  </a>
                                                  <ul>
                                                      <li><a href="?c=mant_prioridad_turnos&a=Edit">Crear Prioridad</a></li>
                                                      <li><a href="?c=mant_prioridad_turnos&a=Index">Ver Listado</a></li>
                                                  </ul>
                                              </li>

                                              <li class="with-sub">
                                                  <a href="javascript: void(0);">
                                                      <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                                                      <span class="s-text">Prioridades Puestos</span>
                                                  </a>
                                                  <ul>
                                                      <li><a href="?c=mant_prioridad_turnos_puestos&a=Edit">Asignar Prioridad</a></li>
                                                      <li><a href="?c=mant_prioridad_turnos_puestos&a=Index">Ver Listado</a></li>
                                                  </ul>
                                              </li>

                                              <li class="with-sub">
                                                  <a href="javascript: void(0);">
                                                      <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                                                      <span class="s-text">Estados</span>
                                                  </a>
                                                  <ul>
                                                      <li><a href="?c=mant_estados_turnos&a=Edit">Nuevo Estado</a></li>
                                                      <li><a href="?c=mant_estados_turnos&a=Index">Ver Listado</a></li>
                                                  </ul>
                                              </li>

                                              <li class="with-sub">
                                                  <a href="javascript: void(0);">
                                                      <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                                                      <span class="s-text">Status</span>
                                                  </a>
                                                  <ul>
                                                      <li><a href="?c=mant_estatus_turnos&a=Edit">Nuevo Status</a></li>
                                                      <li><a href="?c=mant_estatus_turnos&a=Index">Ver Listado</a></li>
                                                  </ul>
                                              </li>

                                          </ul>


                                     </ul>
                                  </li>
                              <?php }?>
                             </ul>
                              <hr/>
                         </div>
                </div>

        <!-- Sidebar second -->
        <div class="site-sidebar-second custom-scroll custom-scroll-dark">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab-chat" role="tab">Chat</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab">Configuración</a>
                </li>
            </ul>
            <div class="tab-content">

                <div class="tab-pane active" id="tab-chat" role="tabpanel">

                    <div  id="chatbox">
                        <div class="row chat-window " id="chat_window_1">
                            <div class="col-xs-12 col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading top-bar">
                                        <div class="col-md-8 col-xs-8">
                                            <h8 class="panel-title"><i class="fa fa-comments"></i> <?= $_SESSION['DataUserOnline']['Usuario']->Departamento ?></h8>
                                        </div>
                                        <div class="col-md-4 col-xs-4" style="text-align: right;">
                                            <!-- <a href="#"><span id="minim_chat_window" class=" fa fa-minus icon_minim panel-collapsed fa fa-plus"></span></a>
                                             <a href="#"><span class="fa fa-remove icon_close" data-id="chat_window_1"></span></a>-->
                                        </div>
                                    </div>


                                    <div id="messagebody" class="panel-body msg_container_base" >

                                        <!-- mensajes aqui-->

                                    </div>

                                </div>
                                <div class="panel-footer">

                                    <div class="input-group">
                                        <input class="form-control  input-sm chat_input" id="btn-input" placeholder="Escribir mensaje...">
                                        <span class="input-group-btn">
							<button type="button" class="btn btn-primary" id="btn-chat">Enviar</button>
					</span>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>



                </div>

                <!-- CHAT-->

                <div class="tab-pane" id="tab-4" role="tabpanel">
                    <div class="sidebar-settings animated fadeIn">
                        <div class="sidebar-group">
                            <h6><b>Administración de Puesto</b></h6>
                            <hr>
                            <div class="ss-item">
                                <div class="text-truncate">Llamada por orden de llegada</div>
                                <div class="ss-checkbox">  <input name="material-design" id="ActivarLlamadaPorOrdenLlegada" type="checkbox" class="js-switch" data-size="small" data-color="#20b9ae"></div>
                            </div>

                            <div class="ss-item">
                                <div class="text-truncate">Transferir turno a otro puesto</div>
                                <div class="ss-checkbox">  <input name="material-design" id="TransferirTurnoAPuesto" type="checkbox" class="js-switch" data-size="small" data-color="#20b9ae"></div>
                            </div>
                        </div>


                        <?php if($_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {?>
                        <div class="sidebar-group">
                            <hr>
                            <h6><b>SISTEMA</b></h6>
                            </hr>

                            <!--<div class="ss-item">
                                <div class="text-truncate">Activar sombra</div>
                                <div class="ss-checkbox"> <input name="material-design" type="checkbox" class="js-switch" data-size="small" data-color="#20b9ae"></div>
                            </div>-->

                            <div class="ss-item">
                                <div class="text-truncate">Pantalla TV Sistema: Modo Voz</div>
                                <div class="ss-checkbox"> <input id="ActivarLlamadaVoz" type="checkbox" class="js-switch systemConfig" data-size="small" data-color="#20b9ae"></div>
                            </div>

                                <div class="form-inline mb-1">
                                    <label>PlayList o VideoID Youtube</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="PlayListYoutubeHeader" placeholder="list=RDMMWtE011iVx1Q">
                                    </div>
                                    <button type="button" class="btn btn-primary"   id="BtnActualizarPlayListYoutube">Actualizar</button>
                                </div>

                        </div>


                        <div class="sidebar-group">
                            <h6><b>SEGURIDAD<b></h6>
                            <hr>
                            <div class="ss-item">
                                <div class="text-truncate">Activar Modo Desarrollador</div>
                                <div class="ss-checkbox"><input id="ActivarModoDesarrollador" type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" checked></div>
                            </div>
                        </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Template options -->
        <div class="template-options">
            <div class="to-toggle"><i class="fa fa-bars"></i></div>
            <div class="custom-scroll custom-scroll-dark">
                <div class="to-content">

                    <div class="row mb-2 text-xs-center">

                    </div>

                    <h6>Diseños</h6>
                    <div class="row">

                        <div class="col-xs-3 mb-2">
                            <label>
                                <input name="skin" value="skin-default" class="skin" id="skin-default" type="radio">
                                <div class="to-icon"><i class="ti-check"></i></div>
                                <div class="to-skin">
                                    <span class="skin-first bg-white"></span>
                                    <span class="skin-second skin-dark-blue"></span>
                                    <span class="skin-third bg-info"></span>
                                </div>
                            </label>
                        </div>

                        <div class="col-xs-3 mb-2">
                            <label>
                                <input name="skin" value="skin-1" class="skin" id="skin-1" type="radio">
                                <div class="to-icon"><i class="ti-check"></i></div>
                                <div class="to-skin">
                                    <span class="skin-first skin-dark-blue-2"></span>
                                    <span class="skin-second bg-white"></span>
                                    <span class="skin-third bg-danger"></span>
                                </div>
                            </label>
                        </div>

                        <div class="col-xs-3 mb-2">
                            <label>
                                <input name="skin" value="skin-2" class="skin" id="skin-2" type="radio">
                                <div class="to-icon"><i class="ti-check"></i></div>
                                <div class="to-skin">
                                    <span class="skin-first bg-white"></span>
                                    <span class="skin-second bg-black"></span>
                                    <span class="skin-third bg-success"></span>
                                </div>
                            </label>
                        </div>

                        <div class="col-xs-3 mb-2">
                            <label>
                                <input name="skin" value="skin-3" class="skin" id="skin-3" type="radio">
                                <div class="to-icon"><i class="ti-check"></i></div>
                                <div class="to-skin">
                                    <span class="skin-first bg-white"></span>
                                    <span class="skin-second skin-grey"></span>
                                    <span class="skin-third bg-purple"></span>
                                </div>
                            </label>
                        </div>

                        <div class="col-xs-3 mb-2">
                            <label>
                                <input name="skin" value="skin-4" class="skin" id="skin-4"  type="radio">
                                <div class="to-icon"><i class="ti-check"></i></div>
                                <div class="to-skin">
                                    <span class="skin-first skin-dark-blue"></span>
                                    <span class="skin-second skin-dark-blue-2"></span>
                                    <span class="skin-third bg-warning"></span>
                                </div>
                            </label>
                        </div>

                        <div class="col-xs-3 mb-2">
                            <label>
                                <input name="skin" value="skin-5" class="skin" id="skin-5" type="radio">
                                <div class="to-icon"><i class="ti-check"></i></div>
                                <div class="to-skin">
                                    <span class="skin-first bg-primary"></span>
                                    <span class="skin-second bg-white"></span>
                                    <span class="skin-third bg-primary"></span>
                                </div>
                            </label>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Header -->
        <div class="site-header">
            <nav class="navbar navbar-light">
                <div class="navbar-left">
                    <a class="navbar-brand" href="Index.html">
                        <div><!--LOGO--></div>
                    </a>
                    <div class="toggle-button dark sidebar-toggle-first float-xs-left hidden-md-up">
                        <span class="hamburger"></span>
                    </div>
                    <div class="toggle-button-second dark float-xs-right hidden-md-up">
                        <i class="ti-arrow-left"></i>
                    </div>
                    <div class="toggle-button dark float-xs-right hidden-md-up" data-toggle="collapse" data-target="#collapse-1">
                        <span class="more"></span>
                    </div>
                </div>
                <div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">
                    <div class="toggle-button light sidebar-toggle-second float-xs-left hidden-sm-down">
                        <span class="hamburger"></span>
                    </div>
                    <div class="toggle-button-second light float-xs-right hidden-sm-down">
                        <i class="ti-arrow-left"></i>
                    </div>

                    <ul class="nav navbar-nav float-md-right">
                        <!--  <li class="nav-item dropdown">
                              <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
                                  <i class="ti-flag-alt"></i>
                                  <span class="hidden-md-up ml-1">Tasks</span>
                                  <span class="tag tag-success top">3</span>
                              </a>
                              <div class="dropdown-tasks dropdown-menu dropdown-menu-right animated fadeInUp">
                                  <div class="t-item">
                                      <div class="mb-0-5">
                                          <a class="text-black" href="#">First Task</a>
                                          <span class="float-xs-right text-muted">75%</span>
                                      </div>
                                      <progress class="progress progress-danger progress-sm" value="75" max="100">100%</progress>
                                          <span class="avatar box-32">
                                              <img src="img/avatars/2.jpg" alt="">
                                          </span>
                                      <a class="text-black" href="#">John Doe</a>, <span class="text-muted">5 min ago</span>
                                  </div>


                                  <a class="dropdown-more" href="#">
                                      <strong>View all tasks</strong>
                                  </a>
                              </div>
                          </li>
                         <li class="nav-item dropdown">
                              <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
                                  <i class="ti-email"></i>
                                  <span class="hidden-md-up ml-1">Notifications</span>
                                  <span class="tag tag-danger top">12</span>
                              </a>
                              <div class="dropdown-messages dropdown-tasks dropdown-menu dropdown-menu-right animated fadeInUp">
                                  <div class="m-item">
                                      <div class="mi-icon bg-info"><i class="ti-comment"></i></div>
                                      <div class="mi-text"><a class="text-black" href="#">John Doe</a> <span class="text-muted">commented post</span> <a class="text-black" href="#">Lorem ipsum dolor</a></div>
                                      <div class="mi-time">5 min ago</div>
                                  </div>

                                  <a class="dropdown-more" href="#">
                                      <strong>View all notifications</strong>
                                  </a>
                              </div>
                          </li>-->
                        <li class="nav-item dropdown hidden-sm-down">
                            <a href="#" data-toggle="dropdown" aria-expanded="false">
									<span class="avatar box-32">
										<img height="40" src="uploads/<?=$_SESSION['DataUserOnline']['Usuario']->Imagen;?>">
									</span>
                               <b style="" class="FontWhite"> <?=$_SESSION['DataUserOnline']['Usuario']->Usuario; ?></b>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated fadeInUp">
                                <!--<a class="dropdown-item" href="#">
                                    <i class="ti-email mr-0-5"></i> Inbox
                                </a>

                                <div class="dropdown-divider"></div>-->
                                <a class="dropdown-item" href="Index.php?c=login&a=Logout"><i class="ti-power-off mr-0-5"></i> Salir</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="nav-item hidden-sm-down">
                            <a class="nav-link toggle-fullscreen" href="#">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </li>
                     <!--   <li class="nav-item dropdown hidden-sm-down">
                            <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
                                <i class="ti-layout-grid3"></i>
                            </a>
                            <div class="dropdown-apps dropdown-menu animated fadeInUp">
                                <div class="a-grid">
                                    <div class="row row-sm">
                                        <div class="col-xs-4">
                                            <div class="a-item">
                                                <a href="#">
                                                    <div class="ai-icon"><img class="img-fluid" src="img/brands/dropbox.png" alt=""></div>
                                                    <div class="ai-title">Dropbox</div>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <a class="dropdown-more" href="#">
                                    <strong>View all apps</strong>
                                </a>
                            </div>
                        </li>-->
                        <li class="nav-item hidden-sm-down">
                            <a class="nav-link  href="#">
                               <b class="FontWhite"> <?=NOMBRE_APLICATION.VERSION ?> - <?=$_SESSION['DataUserOnline']['Usuario']->Empresa; ?></b>
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>
        </div>


        <div class="site-content">
            <div class="content-area py-1">
                <div class="container-fluid">

                    <div class="box box-block bg-white b-t-0 mb-2">
