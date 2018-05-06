
<?php

	if($handle = printer_open('POS-80')){
		/*printer_set_option($handle, PRINTER_MODE, 'RAW');
		printer_start_doc($handle);
		printer_start_page($handle);
		printer_draw_bmp($handle, "logo2.bmp", 1, 1);
		printer_write($handle,  $_POST['data']);
		printer_end_page($handle);
		printer_end_doc($handle);
		printer_close($handle);
*/
		printer_set_option($handle, PRINTER_MODE, 'RAW');
		printer_start_doc($handle);
		printer_start_page($handle);

		//$Logo = "logo2.bmp";
		$Empresa = $_POST['Empresa'];
		$Sucursal = $_POST['Sucursal'];
		$Turno = $_POST['Turno']."-".$_POST['NuevoTurno'];
		$FechaHora = $_POST['FechaHora'];

		//$line1 = $Logo;
		printer_draw_bmp($handle, "logo2.bmp", 190, 0,240,111);

		$line2 = $Empresa;
		$line3 = $Sucursal;
		$line4 = '_____________________________________________';
		$line5 = '                 TURNO                       ';
		$line6 = $Turno;
		$line7 = '_____________________________________________';
		$line8 = $FechaHora;

		$font = printer_create_font("Calibri", 32, 14, 1, false, false, false, 0);
		printer_select_font($handle, $font);

		///printer_draw_text($handle, $line1, 10, 50);
		printer_draw_text($handle, $line2, 80, 120); //Empresa
		printer_draw_text($handle, $line3, 190, 160); //Sucursal
		printer_draw_text($handle, $line4, 10, 200); // -------

		$font = printer_create_font("Calibri", 50, 40, 1, false, false, false, 0);
		printer_select_font($handle, $font);

		printer_draw_text($handle, $line5, -130, 260); /// palbra Turno

		$font = printer_create_font("Calibri", 82, 40, 1, false, false, false, 0);
		printer_select_font($handle, $font);

		printer_draw_text($handle, $line6,  210, 400);// ------- turno




		/*$font = printer_create_font("Calibri", 32, 14, 400, false, false, false, 0);
		printer_select_font($handle, $font);*/


		$font = printer_create_font("Calibri", 32, 14, 1, false, false, false, 0);
		printer_select_font($handle, $font);


		printer_draw_text($handle, $line7, 10, 530); // linea
		printer_draw_text($handle, $line8, 140, 570); // linea

		printer_delete_font($font);

		printer_end_page($handle);
		printer_end_doc($handle);
		printer_close($handle);

	}else{
		echo 'No se pudo conectar a la impresora.';
	}
