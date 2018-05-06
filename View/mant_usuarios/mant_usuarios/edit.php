<link rel="stylesheet" href="assets/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="assets/select2/multi-select.css">


<ul class="breadcrumb no-bg mb-1">
    <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="#">Usuarios</a></li>
    <li  class="breadcrumb-item"><i class="fa fa-list-ul"></i> <a href="?c=mant_usuarios&a=Index">Listado de Usuarios</a></li>
    <li class="breadcrumb-item active"><?php echo  ($Usuario->Id != null)  ? "Modificar Registro" : "Nuevo Registro" ?></li>
</ul>

<div class="box box-block bg-white">

    <h4 class="text-primary">Mantenimiento de Usuarios</h4>
    <p class="font-90 text-muted mb-1 text-bold">Administracion de Sistema</p>

    <hr>

    <form id="frm-usuarios" name="frm-usuario"  method="post" action="?c=mant_usuarios&a=Save" class="form-control"  enctype="multipart/form-data">

        <div class="container-fluid">

            <input type="hidden" name="Id" id="Id" value="<?php echo $Usuario->Id; ?>" />
            <input type="hidden" name="Activo" id="Activo" value="<?php echo ($Usuario->Id != null) ? $Usuario->Activo : 1 ?>" >
            <br>

            <div class="form-group col-md-6">
                <label for="cmbPerfilUsuarioID"><b>Perfil del Usuario:</b></label>
                <select id="PerfilUsuarioID" name="PerfilUsuarioID" class="form-control select2" style="width: 100%">
                    <option value="" selected>Seleccione el perfil del usuario</option>
                    <?php foreach($PerfilesUsuarios as $a): ?>
                        <option value="<?php echo $a->Id; ?>"><?php echo $a->Perfil; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="form-group col-md-6">
                <label for="Email"><b>Email:</b></label>
                <input type="email" name="Email" value="<?php echo $Usuario->Email; ?>" class="form-control" placeholder="Email@dominio.com"/>
            </div>

            <div class="form-group col-md-6">
                <label for="Nombre"><b>Nombre:</b></label>
                <input type="text" name="Nombre" value="<?php echo $Usuario->Nombre; ?>" class="form-control" placeholder="Nombre de la persona" data-validacion-tipo="requerido|min:3" />
            </div>

            <div class="form-group col-md-6">
                <label for="Apellido"><b>Apellido:</b></label>
                <input type="text" name="Apellido" value="<?php echo $Usuario->Apellido; ?>" class="form-control" placeholder="Apellido de la persona" data-validacion-tipo="requerido|min:3" />
            </div>


            <div class="form-group col-md-6">
                <label for="Usuario"><b>Usuario (login):</b></label>
                <input type="text" name="Usuario" value="<?php echo $Usuario->Usuario; ?>" class="form-control" placeholder="Usuario (login)" data-validacion-tipo="requerido|min:3" />
            </div>

            <div class="form-group col-md-3">
                <label  class="text-danger" for="Password"><b>Password (login):</b></label>
                <input type="password" name="Password" id="Password" value="<?php echo $Usuario->Password; ?>" class="form-control" placeholder="Password (login)" data-validacion-tipo="requerido|min:5" />
                <span class="glyphicon glyphicon-eye-open"></span>
            </div>

            <div class="form-group col-md-3">
                <label class="text-danger"><b>Confirmar Password (login):</b></label>
                <input type="password"  id="ConfirmPassword" class="form-control" placeholder="Confirmar Password (login)" data-validacion-tipo="requerido|min:5" />
            </div>

            <div class="form-group col-md-6">
                <label for="cmbPuestoID"><b>Puestos:</b></label>
                <select id="PuestoID" name="PuestoID[]" class="form-control multiple" multiple="multiple">
                    <?php foreach($PuestosArray as $a): ?>
                        <option value="<?php echo $a->Id; ?>"><?php echo $a->Nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="Imagen"><b>Imagen:</b></label>
                <input type="file"  name="Imagen" id="input-file-now-custom-2" class="dropify" data-height="80"   data-default-file="uploads/<?php echo $Usuario->Imagen ?>"/>
                <input type="hidden" name="Imagen" value="<?php echo $Usuario->Imagen; ?>"/>
            </div>




        <div class="form-group col-md-12">
            <hr>
            <?php if($Usuario->Id != null){?>
                <button type="submit"   class="btn btn-warning">Actualizar <i class="fa fa-refresh"></i> </button>
                <input type="checkbox"  data-toggle="toggle" id="ActivoToogle" data-on="Activo" data-off="Inactivo" data-onstyle="success" data-offstyle="danger" data-onstyle="danger" data-style="ios">
            <?php }else {?>
                <button type="submit"   class="btn btn-success">Guardar <i class="fa fa-save"></i> </button>
            <?php }?>
         </div>
        </div>

    </form>

    </div>

<script type="text/javascript" src="assets/jquery/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="assets/js/forms-upload.js"></script>
<script type="text/javascript" src="assets/switchery/dist/switchery.min.js"></script>
<script type="text/javascript" src="assets/js/select2.full.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.multi-select.js"></script>

<script>

    $('.select2').select2();
    $('.multiple').multiSelect();

    if($("#Id").val() != null){

        var ar = <?php echo json_encode($PuestosByUser) ?>;
        $(".multiple").val(ar);
        $(".multiple").multiSelect("refresh");

        var PerfilUsuarioID = "<?php echo ($Usuario->PerfilUsuarioID != null) ? $Usuario->PerfilUsuarioID : "" ?>";
        $("#PerfilUsuarioID").val(PerfilUsuarioID).trigger("change");

        $("#ConfirmPassword").val($("#Password").val());
    }

</script>


<script>

    $(document).ready(function(){

            if($("#Id").val() != null){
                $("#ConfirmPassword").val($("#Password").val())
            }

            $("#frm-usuarios").submit(function(){
                return $(this).validate();
            });

        $("#Password").focus(function(){
            this.type = "text";
        }).blur(function(){
            this.type = "password";
        });

        $("#ConfirmPassword").focus(function(){
            this.type = "text";
        }).blur(function(){
            this.type = "password";
        });

        });

</script>

<script>

    $(function() {

        if($("#Activo").val() > 0){
            $('#ActivoToogle').bootstrapToggle('on');
        }else{
            $('#ActivoToogle').bootstrapToggle('off');
        }


        $('#ActivoToogle').change(function() {

            if($(this).prop('checked') == false){

                swal({
                    title: 'Registro Eliminado',
                    text: 'Presione Actualizar para eliminar el registro',
                    type: 'error',
                    timer: 5000,
                    buttonsStyling: true
                });
            }
            $("#Activo").val(($(this).prop('checked')) == false ? 0 : 1);
        })
    })


</script>

