<link rel="stylesheet" href="assets/select2/select2.min.css">
<link rel="stylesheet" href="assets/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="assets/clockpicker/dist/bootstrap-clockpicker.min.css">
<link rel="stylesheet" href="assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="assets/bootstrap-daterangepicker/daterangepicker.css">
<?php
date_default_timezone_set('America/Santo_Domingo');
?>


<ul class="breadcrumb no-bg mb-1">
    <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="#">Marquesina</a></li>
    <li  class="breadcrumb-item"><i class="fa fa-list-ul"></i> <a href="?c=mant_marquesina&a=Index">Listado</a></li>
    <li class="breadcrumb-item active"><?php echo  ($Marquesina->Id != null)  ? "Modificar Registro" : "Nuevo Registro" ?></li>
</ul>

<div class="box box-block bg-white">

    <h4 class="text-primary">Mantenimiento de la Marquesina</h4>
    <p class="font-90 text-muted mb-1 text-bold">Administracion de Sistema</p>

    <hr>

     <form id="frm-puestos" action="?c=mant_marquesina&a=Save" method="post" enctype="multipart/form-data" class="form-control">

        <div class="container-fluid">
        <input type="hidden" name="Id" id="Id" value="<?php echo $Marquesina->Id; ?>" />
        <input type="hidden" name="Activo" id="Activo" value="<?php echo ($Marquesina->Id != null) ? $Marquesina->Activo : 1 ?>" >

        <div class="form-group">
            <label for="cmbDepartamento"><b>Departamentos:</b></label>
            <select id="DepartamentoID" name="DepartamentoID" class="form-control select2" style="width: 100%">
                <option value="" selected>Seleccione el departamento en el que desea mostrar la informaciom</option>
                <?php foreach($Departamentos as $a): ?>
                    <option value="<?php echo $a->Id; ?>"><?php echo $a->Nombre; ?></option>
                <?php endforeach; ?>
            </select>
        </div>


            <div class="form-group">
                <label for="TextoMostrar"><b>Texto a mostrar:</b></label>
                <textarea name="TextoMostrar" class="form-control"><?php echo htmlspecialchars($Marquesina->TextoMostrar); ?></textarea>
            </div>


            <div class="form-group clockpicker input-group">
                <span class="input-group-addon"><i class="ti ti-time"></i></span>
                <input type="text" name="HoraInicial" class="form-control Picker" placeholder="Desde que hora" value="<?= $Marquesina->HoraInicial; ?>" >
                <span class="input-group-addon bg-primary b-0 text-white">a</span>
                <input type="text" name="HoraFinal" class="form-control Picker" placeholder="Hasta que hora"  value="<?= $Marquesina->HoraFinal; ?>" >
                <span class="input-group-addon"><i class="ti ti-time"></i></span>
            </div>

            <div class="form-group input-daterange input-group" id="date-range">
                <span class="input-group-addon"><i class="ti ti-calendar"></i></span>
                <input type="text" class="form-control datepicker" name="FechaInicial" placeholder="Mostrar desde (Fecha)" value="<?php echo ($Marquesina->FechaInicial) == '0000-00-00' ? '': $Marquesina->FechaInicial ?>" required>

                <span class="input-group-addon bg-primary b-0 text-white">a</span>
                <input type="text" class="form-control datepicker" name="FechaFinal" placeholder="Hasta (Fecha)" value="<?php echo ($Marquesina->FechaFinal) == '0000-00-00' ? '': $Marquesina->FechaFinal ?>" required>
                <span class="input-group-addon"><i class="ti ti-calendar"></i></span>
            </div>


        <div class="form-group col-md-12">
            <hr>
            <?php if($Marquesina->Id != null){?>
                <button type="submit" class="btn btn-warning">Actualizar <i class="fa fa-refresh"></i> </button>
                <input type="checkbox"  data-toggle="toggle" id="ActivoToogle" data-on="Activo" data-off="Inactivo" data-onstyle="success" data-offstyle="danger" data-onstyle="danger" data-style="ios">
            <?php }else {?>
                <button type="submit"  class="btn btn-success">Guardar <i class="fa fa-save"></i> </button>
            <?php }?>
         </div>
    </div>

    </form>


</div>

<script type="text/javascript" src="assets/jquery/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="assets/switchery/dist/switchery.min.js"></script>
<script type="text/javascript" src="assets/js/select2.full.min.js"></script>
<script type="text/javascript" src="assets/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script type="text/javascript" src="assets/clockpicker/dist/jquery-clockpicker.min.js"></script>
<script type="text/javascript" src="assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>


<script type="text/javascript">
    $('.select2').select2();
    $(".Picker").clockpicker({donetext: "Asignar Hora"});

    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
    });

</script>

<script type="text/javascript">

    $(document).ready(function(){

        if($("#Id").val() != null) {

            var DepartamentoID = "<?php echo ($Marquesina->DepartamentoID != null) ? $Marquesina->DepartamentoID : "" ?>";
            $("#DepartamentoID").val(DepartamentoID).trigger('change');
        }


        $("#frm-puestos").submit(function(){
            return $(this).validate();
        });

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
        });

    });
</script>


