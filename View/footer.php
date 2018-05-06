</div>


</div>
</div>



<footer class="fixed-footer footer">

    <div class="container-fluid">
        <div class="row text-xs-center">
            <div class="col-sm-4 text-sm-left mb-0-5 mb-sm-0">
                <?=date("Y") ?> © <?=NOMBRE_APLICATION.VERSION ?>
            </div>
            <div class="col-sm-8 text-sm-right">
                <ul class="nav nav-inline l-h-2">
                    <li class="nav-item"><a class="nav-link text-black" href="#">Ayuda</a></li>
                </ul>
            </div>
        </div>
    </div>

</footer>

        </div>


            <script type="text/javascript" src="assets/tether/js/tether.min.js"></script>
            <script type="text/javascript" src="assets/bootstrap4/js/bootstrap.min.js"></script>

            <script type="text/javascript" src="assets/detectmobilebrowser/detectmobilebrowser.js"></script>
            <script type="text/javascript" src="assets/jscrollpane/jquery.mousewheel.js"></script>
            <script type="text/javascript" src="assets/jscrollpane/mwheelIntent.js"></script>
            <script type="text/javascript" src="assets/jscrollpane/jquery.jscrollpane.min.js"></script>
            <script type="text/javascript" src="assets/jquery-fullscreen-plugin/jquery.fullscreen-min.js"></script>

            <script type="text/javascript" src="assets/dropify/dist/js/dropify.min.js"></script>

            <script type="text/javascript" src="assets/sweetalert2/sweetalert2.min.js"></script>
            <script type="text/javascript" src="assets/js/ui-notifications.js"></script>
            <script type="text/javascript" src="assets/js/moment.js"></script>
            <script type="text/javascript" src="assets/js/moment-with-locales.js"></script>
            <script src="assets/js/jquery.anexsoft-validator.js"></script>
            <script src="assets/bootstrap4/js/bootstrap-toggle.min.js"></script>

            <!--FORMULARIOS-->
           <!-- <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
            <script type="text/javascript" src="assets/autoNumeric/autoNumeric-min.js"></script>
            <script type="text/javascript" src="assets/js/forms-masks.js"></script>
            <script type="text/javascript" src="assets/js/forms-upload.js"></script>-->
            <script type="text/javascript" src="assets/switchery/dist/switchery.min.js"></script>
            <script src="assets/js/bootstrap-session-timeout.js"></script>
            <script type="text/javascript" src="assets/toastr/toastr.min.js"></script>

            <script type="text/javascript" src="assets/js/app.js"></script>



    </body>
</html>



<script>
    $.sessionTimeout({
        title: 'Alerta de Sistema',
        message: 'Tu sesión está apunto de finalizar',
        keepAliveButton: 'Haz click para quedarte',
        logoutButton: 'Cerrar Sesión',
        logoutUrl: "Index.php?c=login&a=Logout",
        redirUrl: "Index.php?c=login&a=Logout",
        warnAfter: 150000,
        redirAfter: 180000,
        countdownMessage: 'La sesión se cerrará en {timer} .'
    });
</script>

<script type="text/javascript">

   // CHAT - FIREBASE
   var config = {
       apiKey: "AIzaSyDlbrQJwEOcBugzhUqQDfx-ZMFaFNdqM3g",
       authDomain: "onetime-831a9.firebaseapp.com",
       databaseURL: "https://onetime-831a9.firebaseio.com",
       projectId: "onetime-831a9",
       storageBucket: "onetime-831a9.appspot.com",
       messagingSenderId: "555250185022"
   };

   firebase.initializeApp(config);


   $(function()
   {
       $('.scroll-pane').jScrollPane();
   });

   var ModoPlayListYoutube2 = "";
   var PlayListYoutube2 = "";

   /* window.onload = function(e){
    $('body').addClass('compact-sidebar');
    }*/

</script>


<script type="text/javascript">

    $(document).ready(function(){

        $("#ActivarLlamadaPorOrdenLlegada").change(function () {

            var Opcion = "DESACTIVAR";

            if(this.checked  == true){
                Opcion = "ACTIVAR";
            }

            $.ajax({
                url: "Index.php?c=dashboard&a=CambiarModoLlamadaPuesto",
                type: "POST",
                data: {Action: "CambiarModoLlamadaPuesto", Opcion: Opcion, PuestoID : $("#PuestoID").val(), Departamento: $("#Departamento").val()},
                success: function (data) {

                    if(Opcion == "ACTIVAR"){
                        toastr.success('Modo de llamada por hora de llegada');
                    }else{
                        toastr.info('Modo de llamada por prioridad');
                    }

                    guardar("MODO LLAMADA POR ORDEN LLEGADA", Opcion);

                }
            });

        });

        $("#ActivarLlamadaVoz").change(function () {

            var Opcion = "false";

            if(this.checked  == true){
                Opcion = "true";
            }

            firebase.database().ref('Configuracion_modo_llamada_tv').set({
                'ActivarLlamadaVoz': Opcion
            });

            if(Opcion == "true"){
                toastr.success('Modo de llamada por voz en pantalla');
            }else{
                toastr.info('Modo de llamada por voz desactivado');
            }

            guardar("MODO LLAMADA POR VOZ PANTALLA", Opcion);


        });

        $("#ActivarModoDesarrollador").change(function () {

            var Opcion = "false";

            if(this.checked  == true){
                Opcion = "true";
            }

            $.ajax({
                url: "Index.php?c=dashboard&a=ActivarModoDesarrollador",
                type: "POST",
                data: {Action: "ActivarModoDesarrollador", Opcion: Opcion},
                success: function (data) {

                    if(Opcion == "true"){
                        toastr.success('Modo developer activador');
                    }else{
                        toastr.info('Modo developer desactivado');
                    }

                    guardar("MODO DEVELOPER", Opcion);

                }
            });

        });

        $("#TransferirTurnoAPuesto").change(function () {

            if($("#TurnoEnAtencion").val() != ''){

            if(this.checked  == true){
                $(".ModalTransferirTurno").modal('show');
            }else{
                $(".ModalTransferirTurno").modal("hide");
            }

            $("#TurnoATransferir").html("[ "+$("#TurnoEnAtencion").val()+" ]");

            }else{
                toastr.error('Debe llamar un turno');
            }

        });


        $("#BtnActualizarPlayListYoutube").click(function () {

            var PlayListYoutube = $("#PlayListYoutubeHeader").val();
            var Opcion = "Listado";


            if(PlayListYoutube.indexOf('list=') < 0) {
                Opcion = "Video";
                PlayListYoutube = PlayListYoutube.replace('v=','')
            }else{
                PlayListYoutube = PlayListYoutube.replace('list=','');
            }


            firebase.database().ref('Configuracion_sistema').set({
                'PlayListYoutube': PlayListYoutube,
                'Opcion': Opcion
            });

            toastr.success('PlayList Youtube actualizado!');


        });


        if (window.sessionStorage && window.localStorage) {

            var storage = localStorage;

            function guardar(clave, valor) {

                storage.setItem(clave, valor);
            //  console.log('Valor guardado ' + clave + '=' + valor);
            }

            function verTodos() {

                for (var i = 0; i < storage.length; i++) {

                    var clave = storage.key(i);
                    var valor = storage.getItem(clave);

                   // console.log('Valor obtenido ' + clave + '=' + valor);
                }

                var Skin = storage.getItem("skin");
                var ModoLlamada = storage.getItem("MODO LLAMADA POR ORDEN LLEGADA");

               // console.log("ModoLllamada: "+ModoLlamada);

                if(Skin != ""){

                    $("body").addClass(Skin);
                    $("#"+Skin).attr("checked", true);

                    if(Skin == "skin-5" || Skin == "skin-1" || Skin == "skin-4"){
                        $(".FontWhite").css('color', 'white');
                    }else{
                        $(".FontWhite").css('color', 'black');
                    }

                }else{
                    //Skin por d
                    guardar("skin", "skin-default");
                    $("body").addClass("skin-default");
                    location.reload();
                }

            }

            verTodos();


        } else {
            alert('Lo siento, pero tu navegador no acepta almacenamiento local');
        }


        $(".skin").on("click", function(){

            guardar("skin", $(this).val());

            if($(this).val() == "skin-5" || $(this).val() == "skin-1" || $(this).val() == "skin-4"){
                $(".FontWhite").css('color', 'white');
            }else{
                $(".FontWhite").css('color', 'black');
            }

        });


    });

    firebase.database().ref('Configuracion_sistema').on('value', function (snapshot) {

        snapshot.forEach(function (e) {

            var config = e.val();

            if (e.key == 'Opcion') {
                ModoPlayListYoutube2 = config;
            }

            if (e.key == 'PlayListYoutube') {
                PlayListYoutube2 = config;
            }

        });

        $("#PlayListYoutubeHeader").val(PlayListYoutube2);
    });


</script>

<script>

    $(document).on('click', '.panel-heading span.icon_minim', function (e) {

        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.removeClass('fa fa-minus').addClass('fa fa-plus');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.removeClass('fa fa-plus').addClass('fa fa-minus');
        }
    });

    $(document).on('focus', '.panel-footer input.chat_input', function (e) {

        var $this = $(this);
        if ($('#minim_chat_window').hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideDown();
            $('#minim_chat_window').removeClass('panel-collapsed');
            $('#minim_chat_window').removeClass('fa fa-plus').addClass('fa fa-minus');
        }
    });

    $(document).on('click', '#new_chat', function (e) {
        var size = $( ".chat-window:last-child" ).css("margin-left");
        size_total = parseInt(size) + 400;
        alert(size_total);
        var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
        clone.css("margin-left", size_total);
    });

    $(document).on('click', '.icon_close', function (e) {
        //$(this).parent().parent().parent().parent().remove();
        $( "#chatbox" ).hide();
    });


    $('#btn-input').keypress(function (e) {
        if (e.which == 13) {
            EnviarMensajeChat();
        }
    });



</script>

<script>

    /* CHAT */

    var fecha = new Date();
    var Usuario = '<?=$_SESSION['DataUserOnline']['Usuario']->Usuario ?>';
    var departamento = '<?=$_SESSION['DataUserOnline']['Usuario']->DepartamentoID ?>';
    var FechaMensaje =  fecha.getDate() + "/" + (fecha.getMonth() +1) + "/" + fecha.getFullYear();
    var FotoUsuario = '<?=$_SESSION['DataUserOnline']['Usuario']->Imagen;?>';

    function EnviarMensajeChat(){

        var Mensaje =  $("#btn-input").val();
        var HoraMensaje = $('#DateTime').html();
        $("#btn-input").val("");

        if(Mensaje != ""){

            firebase.database().ref('Chat').push({

                'usuario': Usuario,
                'mensaje': Mensaje,
                'fecha_mensaje':FechaMensaje,
                'hora_mensaje':  HoraMensaje,
                'departamento_id': departamento,
                'foto_usuario': FotoUsuario

            });
        }

    }


    $( "#btn-chat" ).click(function() {
        EnviarMensajeChat();
    });

    firebase.database().ref('Chat').on('value', function(snapshot){

        var html= "";
        var LastUsuario = "";
        var LastMessage = "";
        var MostrarUltimoMensaje = false;

        snapshot.forEach(function(e){

            var element = e.val();
            var departamentoID = element.departamento_id;


            if(departamentoID != ""){
                MostrarUltimoMensaje = true;
            }

            if(departamento == departamentoID && FechaMensaje == element.fecha_mensaje){


                if(Usuario == element.usuario){

                    html += "<div class='row msg_container base_sent'> " +
                        "<div class='col-md-10 col-xs-10' > " +
                        "<div class='messages msg_sent'  style='background-color: royalblue; color:white'> " +
                        "<p><b>"+element.mensaje+"</b></p><time datetime='"+element.fecha_mensaje+"'>"+element.usuario+" • "+element.hora_mensaje+"</time></div> " +
                        "</div> " +
                        "<div class='col-md-2 col-xs-2 avatar'> " +
                        "<img  height='43px' width='55px' src='uploads/"+element.foto_usuario+"' class='chatimg img-responsive '> " +
                        "</div> " +
                        "</div>";

                }else{

                    html += "<div class='row msg_container base_receive'> <div class='col-md-2 col-xs-2 avatar'> " +
                        "<img height='43px' width='55px' src='uploads/"+element.foto_usuario+"'  class='chatimg img-responsive '> " +
                        "</div> " +
                        "<div class='col-xs-10 col-md-10'> <div class='messages msg_receive'> " +
                        "<p>"+element.mensaje+"</p> " +
                        "<time datetime='"+element.fecha_mensaje+"'>"+element.usuario+" • "+element.hora_mensaje+"</time>" +
                        "</div> " +
                        "</div> " +
                        "</div>";

                }

            }
            LastUsuario =element.usuario;
            LastMessage = element.hora_mensaje;

        });


        if(MostrarUltimoMensaje == true && Usuario != LastUsuario){
            toastr.info("<b>"+LastUsuario+"</b> ha dejado un mensaje a las "+LastMessage);
            $("#messagebody").show(1000);
        }

       // console.log(html);

        $("#messagebody").html(html);

      //  $(html).html("#messagebody");
        $('#btn-input').val('');
        $("#messagebody").animate({ scrollTop: $("#messagebody")[0].scrollHeight}, 'slow');

    });

</script>


