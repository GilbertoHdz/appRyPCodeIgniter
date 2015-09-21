
<?php 

	$porcentajeABCD=100;
	$porcentajeEF=100;
	$porcentajeGH=100;
	$porcentajeMN=100;
	$porcentajePQ=100;
	$porcentajeRS=78;

	    // ****************************************************************
	    // ********************* Funciones Globales ***********************
	    // ****************************************************************

	    function obtener_fecha_inicio($curso,$tipoReporte){
	        $f_inicio="";
	        if ($curso == 10 || $curso == 9 ){
	            $f_inicio='09 de febrero';
	        }
	        if ($curso == 14 || $curso == 15 ){
	            if($tipoReporte == 1){
	                $f_inicio='02 de marzo';
	            }else{
	                $f_inicio='09 de febrero';
	            }
	        }
	        if ($curso == 16 || $curso == 17){
	            if($tipoReporte == 1){
	                $f_inicio='13 de abril';
	            }else{
	                $f_inicio='09 de febrero';
	            }
	        }
	        if ($curso == 18 || $curso == 19){
	            if($tipoReporte == 1){
	                $f_inicio='27 de abril';
	            }else{
	                $f_inicio='02 de marzo';
	            }
	        }
	        if ($curso == 21 || $curso == 22){
	            if($tipoReporte == 1){
	               $f_inicio='11 de mayo';
	            }else{
	                $f_inicio='30 de marzo';
	            }
	                
	        }
	        if ($curso == 25 || $curso == 24){
	            if($tipoReporte == 1){
	               $f_inicio='08 de junio';
	            }else{
	                $f_inicio='30 de marzo';
	            }
	        }
	        if ($curso == 26 || $curso == 27){
	            if($tipoReporte == 1){
	               $f_inicio='22 de junio';
	            }else{
	                $f_inicio='30 de marzo';
	            }
	        }       
	        return $f_inicio;
	    }

	    function obtener_fecha_fin($curso,$tipoReporte){
	        $f_inicio="";
	        if ($curso == 10 || $curso == 9 ){
	            $f_inicio='08 de mayo';
	        }
	        if ($curso == 14 || $curso == 15 ){
	            if($tipoReporte == 1){
	               $f_inicio='22 de mayo';
	            }else{
	                $f_inicio='08 de mayo';
	            }
	        }
	        if ($curso == 16 || $curso == 17){
	            if($tipoReporte == 1){
	               $f_inicio='03 de julio';
	            }else{
	                $f_inicio='08 de mayo';
	            }
	        }
	        if ($curso == 18 || $curso == 19){
	            if($tipoReporte == 1){
	               $f_inicio='17 de julio';
	            }else{
	                $f_inicio='29 de mayo';
	            }
	        }
	        if ($curso == 21 || $curso == 22){
	            if($tipoReporte == 1){
	               $f_inicio='31 de julio';
	            }else{
	                $f_inicio='19 de junio';
	            }
	        }
	        if ($curso == 25 || $curso == 24){
	            if($tipoReporte == 1){
	                $f_inicio='';
	            }else{
	                $f_inicio='19 de junio';
	            }
	        }
	        if ($curso == 26 || $curso == 27){
	            if($tipoReporte == 1){
	                $f_inicio='';
	            }else{
	                $f_inicio='19 de junio';
	            }
	        }       
	        return $f_inicio;
	    }

	    function verificar_origen($curso,$usuario){
	        $letra_inicio = substr($usuario,0,1); 
	        $pertenece_grupo="SI";
	        if (($curso == 9 || $curso == 10) && (strcmp($letra_inicio,'a')==0 || strcmp($letra_inicio,'b')==0) ){
	               $pertenece_grupo="NO";
	        }
	        if (($curso == 14 || $curso == 15) &&(strcmp($letra_inicio,'c')==0 || strcmp($letra_inicio,'d')==0)){
	                $pertenece_grupo="NO";
	        }
	        if (($curso == 16 || $curso == 17) &&(strcmp($letra_inicio,'e')==0 || strcmp($letra_inicio,'f')==0)){
	                $pertenece_grupo="NO";
	        }
	        if (($curso == 18 || $curso == 19) && (strcmp($letra_inicio,'g')==0 || strcmp($letra_inicio,'h')==0 || strcmp($letra_inicio,'j')==0 || strcmp($letra_inicio,'k')==0)){
	               $pertenece_grupo="NO";
	        }
	        if (($curso == 21 || $curso == 22) &&(strcmp($letra_inicio,'m')==0 || strcmp($letra_inicio,'n')==0)){
	               $pertenece_grupo="NO";
	        }
	        if (($curso == 25 || $curso == 24) &&(strcmp($letra_inicio,'p')==0 || strcmp($letra_inicio,'q')==0)){
	               $pertenece_grupo="NO";
	        }
	        if (($curso == 26 || $curso == 27) &&(strcmp($letra_inicio,'r')==0 || strcmp($letra_inicio,'s')==0)){
	                $pertenece_grupo="NO";
	        }       
	        return $pertenece_grupo;
	    }

	    function obtenerNombreCurso($curso){
	        $nombre="";
	        if ($curso == 9 || $curso == 15 || $curso == 16 || $curso == 19
	                || $curso == 21 || $curso == 25 || $curso == 26){
	               $nombre="Diplomado en Generación de Ambientes de Aprendizaje basados en TIC";
	        }
	        if ($curso == 10 || $curso == 14 || $curso == 17 || $curso == 18
	                || $curso == 22 || $curso == 24 || $curso == 27){
	               $nombre="Diplomado para el Desarrollo de Competencias Matemáticas con Dispositivos Móviles";
	        }
	        return$nombre;
	        
	    }

	    function asignar_calificacionLania($curso,$Calplataforma){
	        $calificacion =0;
	        if($curso==9 || $curso==10 || $curso==14 || $curso==15 ){
	            if($Calplataforma>=1 && $Calplataforma<=50){
	                    $calificacion=50;
	            }
	            if($Calplataforma>50 && $Calplataforma<60){
	                    $calificacion=60;
	            }else{
	                    $calificacion=$Calplataforma;
	            }       
	        }
	        if($curso==16 || $curso==17 || $curso==18 || $curso==19
	            || $curso==21 || $curso==22){
	            if($Calplataforma>=1 && $Calplataforma<60){
	                $calificacion=50;
	            }elseif($Calplataforma>=60 && $Calplataforma<70){
	                $calificacion=60;
	            }elseif($Calplataforma>=70 && $Calplataforma<80){
	                $calificacion=70;
	            }elseif($Calplataforma>=80 && $Calplataforma<=100){
	                $calificacion=80;
	            }       
	        }
	        if($curso==24 || $curso==25 || $curso==26 || $curso==27){
	            if($Calplataforma<1 ){
	                $calificacion=50;
	            }else{
	                $calificacion=70;
	            }
	        }
	        
	        
	        return $calificacion;

	    }

		///Funciones para tratar valores para la tabla de conteos

	    function imprimir_contadores($fila,$contadores){
	        for($i=0; $i<8;$i++){
	            echo'<td>'.$contadores[$fila][$i].'</td>';
	        }

	    }

	    function definirPosicion($curso,$estado,$origen,&$contadores){
	        switch($curso){
	            case 9:
	                asignar_valor(0,$estado,$contadores);
	                break;
	            case 10:
	                asignar_valor(1,$estado,$contadores);
	                break;
	            case 15:
	                if(strcmp ($origen,"UNETE") == 0){
	                    asignar_valor(2,$estado,$contadores);
	                }
	                if(strcmp ($origen,"YUCATAN") == 0){
	                    asignar_valor(3,$estado,$contadores);
	                }
	                break;
	            case 14:
	                if(strcmp ($origen,"UNETE") == 0){
	                    asignar_valor(4,$estado,$contadores);
	                }
	                if(strcmp ($origen,"YUCATAN") == 0){
	                    asignar_valor(5,$estado,$contadores);
	                }
	                break;
	            case 16:
	                if(strcmp ($origen,"UNETE") == 0){
	                    asignar_valor(6,$estado,$contadores);
	                }
	                if(strcmp ($origen,"VERACRUZ") == 0){
	                    asignar_valor(7,$estado,$contadores);
	                }
	                break;
	            case 17:
	                if(strcmp ($origen,"UNETE") == 0){
	                    asignar_valor(8,$estado,$contadores);
	                }
	                if(strcmp ($origen,"VERACRUZ") == 0){
	                    asignar_valor(9,$estado,$contadores);
	                }
	                break;
	            case 19:
	                if(strcmp ($origen,"UNETE") == 0){
	                    asignar_valor(10,$estado,$contadores);
	                }
	                if(strcmp ($origen,"YUCATAN") == 0){
	                    asignar_valor(11,$estado,$contadores);
	                }
	                if(strcmp ($origen,"VERACRUZ") == 0){
	                    asignar_valor(12,$estado,$contadores);
	                }
	                break;
	            case 18:
	                if(strcmp ($origen,"UNETE") == 0){
	                    asignar_valor(13,$estado,$contadores);
	                }
	                if(strcmp ($origen,"YUCATAN") == 0){
	                    asignar_valor(14,$estado,$contadores);
	                }
	                if(strcmp ($origen,"VERACRUZ") == 0){
	                    asignar_valor(15,$estado,$contadores);
	                }
	                break;
	            case 21:
	                if(strcmp ($origen,"UNETE") == 0){
	                    asignar_valor(16,$estado,$contadores);
	                }
	                if(strcmp ($origen,"YUCATAN") == 0){
	                    asignar_valor(17,$estado,$contadores);
	                }
	                if(strcmp ($origen,"VERACRUZ") == 0){
	                    asignar_valor(18,$estado,$contadores);
	                }
	                break;
	            case 22:
	                if(strcmp ($origen,"UNETE") == 0){
	                    asignar_valor(19,$estado,$contadores);
	                }
	                if(strcmp ($origen,"YUCATAN") == 0){
	                    asignar_valor(20,$estado,$contadores);
	                }
	                if(strcmp ($origen,"VERACRUZ") == 0){
	                    asignar_valor(21,$estado,$contadores);
	                }
	                break;
	            case 25:
	                if(strcmp ($origen,"UNETE") == 0){
	                    asignar_valor(22,$estado,$contadores);
	                }
	                if(strcmp ($origen,"YUCATAN") == 0){
	                    asignar_valor(23,$estado,$contadores);
	                }
	                if(strcmp ($origen,"VERACRUZ") == 0){
	                    asignar_valor(24,$estado,$contadores);
	                }
	                break;
	            case 24:
	                if(strcmp ($origen,"UNETE") == 0){
	                    asignar_valor(25,$estado,$contadores);
	                }
	                if(strcmp ($origen,"YUCATAN") == 0){
	                    asignar_valor(26,$estado,$contadores);
	                }
	                if(strcmp ($origen,"VERACRUZ") == 0){
	                    asignar_valor(27,$estado,$contadores);
	                }
	                break;
	            case 26:
	                if(strcmp ($origen,"UNETE") == 0){
	                    asignar_valor(28,$estado,$contadores);
	                }
	                if(strcmp ($origen,"YUCATAN") == 0){
	                    asignar_valor(29,$estado,$contadores);
	                }
	                if(strcmp ($origen,"VERACRUZ") == 0){
	                    asignar_valor(30,$estado,$contadores);
	                }
	                break;
	            case 27:
	                if(strcmp ($origen,"UNETE") == 0){
	                    asignar_valor(31,$estado,$contadores);
	                }
	                if(strcmp ($origen,"YUCATAN") == 0){
	                    asignar_valor(32,$estado,$contadores);
	                }
	                if(strcmp ($origen,"VERACRUZ") == 0){
	                    asignar_valor(33,$estado,$contadores);
	                }
	                break;
	            default:    
	        }       
	    }
	    
	    function asignar_valor($valorfila,$estado,&$contadores){
	        $valor=0;
	            if(strcmp ($estado,"BAJA POR INACTIVIDAD") == 0){
	                $contadores[$valorfila][0]+=1;                  
	            }
	            if(strcmp ($estado,"BAJA POR INACTIVIDAD*") == 0){
	                $contadores[$valorfila][1]+=1;
	            }
	            if(strcmp ($estado,"BAJA POR SOLICITUD*") == 0){
	                $contadores[$valorfila][2]+=1;
	            }
	            if(strcmp ($estado,"CORREO REBOTADO*") == 0){
	                $contadores[$valorfila][3]+=1;
	            }
	            if(strcmp ($estado,"EN RIESGO (1-59)") == 0){
	                $contadores[$valorfila][4]+=1;
	            }
	            if(strcmp ($estado,"EN RIESGO (60-69)") == 0){
	                $contadores[$valorfila][5]+=1;
	            }
	            if(strcmp ($estado,"AL CORRIENTE (70-79)") == 0){
	                $contadores[$valorfila][6]+=1;
	            }
	            if(strcmp ($estado,"AL CORRIENTE (80-100)") == 0){
	                $contadores[$valorfila][7]+=1;
	            }
	    }

	    function inicializar_array(&$contadores){
	        for($j=0;$j<34;$j++){
	            for($i=0;$i<8;$i++){
	                $contadores[$j][$i] = 0;
	            }
	        }
	    }

?>


<h3>Seguimiento Docente</h3>

<div class="dataTables_wrapper">
    
<br>
<button id="btnExportar" data-loading-text="Loading..." class="btn btn-danger btn-xs" onclick="exportarCSV('tbSegDocente', 'SegDocente')">
	<span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span>Exportar CVS
</button>

<br><br>

<div class="SegDocente" style="position: relative; overflow: auto; max-height: 60vh;">

	<table id="tbSegDocente" style="width: 10900px" class="tg">
		<tr>
			<th class="tg-ld5c" style="width:  90px;" >CONF. INFO.</th>
			<th class="tg-ld5c" style="width: 100px;" >USERNAME</th>
			<th class="tg-ld5c" style="width: 100px;" >CONTRASEÑA</th>
			<th class="tg-ld5c" style="width: 100px;" >ID USUARIO</th>
			<th class="tg-ld5c" style="width: 180px;" >Nombre Completo</th>
			<th class="tg-ld5c" style="width: 100px;" >Email Principal</th>
			<th class="tg-ld5c" style="width: 100px;" >Email Alternativo</th>
			<th class="tg-ld5c" style="width: 100px;" >Nombres</th>
			<th class="tg-ld5c" style="width: 100px;" >Apellidos</th>
			<th class="tg-ld5c" style="width: 100px;" >Tel. Particular</th>
			<th class="tg-ld5c" style="width: 100px;" >Tel. Movil</th>
			<th class="tg-ld5c" style="width: 100px;" >Clave CT</th>
			<th class="tg-ld5c" style="width: 150px;" >Nombre del CT</th>
			<th class="tg-ld5c" style="width: 100px;" >Nivel del CT</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad1_Razonamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad1_Reforzamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad2_Razonamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad2_Reforzamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad3_Razonamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad3_Reforzamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Proyecto integrador 1</th>
			<th class="tg-ld5c" style="width: 100px;" >Calificacion_producto1</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad4_Razonamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad4_Reforzamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad5_Razonamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad5_Reforzamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad6_Razonamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad6_Reforzamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Proyecto integrador 2</th>
			<th class="tg-ld5c" style="width: 100px;" >Calificacion_producto2</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad7_Razonamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad7_Reforzamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad8_Razonamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad8_Reforzamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad9_Razonamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Actividad9_Reforzamiento</th>
			<th class="tg-ld5c" style="width: 100px;" >Proyecto integrador 3</th>
			<th class="tg-ld5c" style="width: 100px;" >Calificacion_producto3</th>
			<th class="tg-ld5c" style="width: 100px;" >Calificacion_Actual</th>
			<th class="tg-ld5c" style="width: 100px;" >Calificacion_No_Recuperable</th>
			<th class="tg-ld5c" style="width: 100px;" >Calificacion_Alcanzable</th>
			<th class="tg-ld5c" style="width: 100px;" >Estado academico del alumno</th>
			<th class="tg-ld5c" style="width: 100px;" >Estado de participacion</th>
			<th class="tg-ld5c" style="width: 100px;" >Porcentaje de avance</th>
			<th class="tg-ld5c" style="width: 100px;" >cantidad_matriculaciones</th>
			<th class="tg-ld5c" style="width: 100px;" >suspendido</th>
			<th class="tg-ld5c" style="width: 100px;" >Viene de otro CURSO</th>
			<th class="tg-ld5c" style="width: 100px;" >origen de inscripcion</th>
			<th class="tg-ld5c" style="width: 100px;" >Dias sin ingresar al curso</th>
			<th class="tg-ld5c" style="width: 100px;" >Ingresó a la plataforma</th>
			<th class="tg-ld5c" style="width: 100px;" >Curso</th>
			<th class="tg-ld5c" style="width: 100px;" >Grupo</th>
			<th class="tg-ld5c" style="width: 100px;" >Fecha inicio del curso</th>
			<th class="tg-ld5c" style="width: 100px;" >Fecha fin del curso</th>
			<th class="tg-ld5c" style="width: 100px;" >Aplicó para entrega?</th>
			<th class="tg-ld5c" style="width: 100px;" >Integrante de curso remedial</th>
			<th class="tg-ld5c" style="width: 100px;" >Calificación curso remedial</th>
			<th class="tg-ld5c" style="width: 100px;" ># de intentos de la evaluación</th>
			<th class="tg-ld5c" style="width: 100px;" >Pts en base a calificación CR</th>
			<th class="tg-ld5c" style="width: 100px;" >ACREDITACION C/CURSO REMEDIAL</th>
			<th class="tg-ld5c" style="width: 100px;" >Pagó?</th>
		</tr>
	<?php
		$abcd = array(9,10,14,15);
		$e_s = array(16,17,18,19,21,22,24,25,26,27);
		$contadores	= array();
		inicializar_array($contadores);
		$inicio_curso = "";
	    $fin_curso = "";
		$cal_remedial=0;
		$CalAlc=0;
		$CalAct=0;
		$CalNoR=0;
		$curso=0;
		$nombre_usuario="";
		$porcentaje=0;
		$estadoacademico="";
		$estadoplataforma="";
		$origenins="";
		$suspension="";
		$no_matriculaciones=0;
		$intentos=0;

	if (isset($stmt)) {
		$c=1;
		foreach($stmt as $row) {
			$bgc='<tr>'; 
			if ($c%2==0) { $bgc= "<tr style='background-color: #f1f1f1;'>"; } $c += 1;
			$curso = (int)$row->id_curso;
			$origenins = $row->origen_inscripcion ;
			$nombre_usuario=$row->username ;
			$suspension=$row->suspendido ;
			$no_matriculaciones=$row->cantidad_matriculaciones ;

			if((in_array($curso,$abcd) && $no_matriculaciones==1) || (in_array($curso,$e_s) && strcmp($suspension,"NO")==0)){
		   		echo $bgc;
				echo "<td>" . $row->CONFIRMACION_INFORMACION ."</td>";
				echo "<td>" . $nombre_usuario."</td>";
				echo "<td>" . $row->CONTRASENIA ."</td>";
				echo "<td>" . $row->id ."</td>";
				echo "<td>" . $row->nombre_completo ."</td>";
				echo "<td>" . $row->email ."</td>";
				echo "<td>" . $row->correo2 ."</td>";
				echo "<td>" . $row->Nombres ."</td>";
				echo "<td>" . $row->Apellidos ."</td>";
				echo "<td>" . $row->telefono_particular ."</td>";
				echo "<td>" . $row->telefono_movil ."</td>";
				echo "<td>" . $row->clavect ."</td>";
				$nombre_ct = str_replace('"','',$row->nombrect ); 
				echo "<td>" . $nombre_ct. "</td>";
				echo "<td>" . $row->nivelct ."</td>";
				echo "<td>" . $row->Actividad1_Razonamiento ."</td>";
				echo "<td>" . $row->Actividad1_Reforzamiento ."</td>";
				echo "<td>" . $row->Actividad2_Razonamiento ."</td>";
				echo "<td>" . $row->Actividad2_Reforzamiento ."</td>";
				echo "<td>" . $row->Actividad3_Razonamiento ."</td>";
				echo "<td>" . $row->Actividad3_Reforzamiento ."</td>";
				echo "<td>" . $row->Proyecto_integrador1 ."</td>";
				echo "<td>" . $row->Calificacion_producto1 ."</td>";
				echo "<td>" . $row->Actividad4_Razonamiento ."</td>";
				echo "<td>" . $row->Actividad4_Reforzamiento ."</td>";
				echo "<td>" . $row->Actividad5_Razonamiento ."</td>";
				echo "<td>" . $row->Actividad5_Reforzamiento ."</td>";
				echo "<td>" . $row->Actividad6_Razonamiento ."</td>";
				echo "<td>" . $row->Actividad6_Reforzamiento ."</td>";
				echo "<td>" . $row->Proyecto_integrador2 ."</td>";
				echo "<td>" . $row->Calificacion_producto2 ."</td>";
				echo "<td>" . $row->Actividad7_Razonamiento ."</td>";
				echo "<td>" . $row->Actividad7_Reforzamiento ."</td>";
				echo "<td>" . $row->Actividad8_Razonamiento ."</td>";
				echo "<td>" . $row->Actividad8_Reforzamiento ."</td>";
				echo "<td>" . $row->Actividad9_Razonamiento ."</td>";
				echo "<td>" . $row->Actividad9_Reforzamiento ."</td>";
				echo "<td>" . $row->Proyecto_integrador3 ."</td>";
				echo "<td>" . $row->Calificacion_producto3 ."</td>";
				$CalAct = $row->Calificacion_Actual ;
				echo "<td>".$CalAct."</td>";
				//asignación de porcentaje de avance según el curso
				if ($curso == 8 || $curso == 9 || $curso == 14 || $curso == 15 ){
					$porcentaje=$porcentajeABCD;
				}
				if ($curso == 16 || $curso == 17){
					$porcentaje=$porcentajeEF;
				}
				if ($curso == 18 || $curso == 19){
					$porcentaje=$porcentajeGH;
				}
				if ($curso == 21 || $curso == 22){
					$porcentaje=$porcentajeMN;
				}
				if ($curso == 25 || $curso == 24){
					$porcentaje=$porcentajePQ;
				}
				if ($curso == 26 || $curso == 27){
					$porcentaje=$porcentajeRS;
				}
				//asignación de valores para las calificaciones no recuperables y alcanzables
				$CalNoR = $row->Calificacion_No_Recuperable;
				echo "<td>".$CalNoR."</td>";
				$CalAlc = $row->Calificacion_Alcanzable;
				echo "<td>".$CalAlc."</td>";
				//asignacion de estado mediante calculo de calificaciones
				$estadoplataforma = $row->estadoPlataforma;
				if((strcmp ($estadoplataforma,"BAJA DEFINITIVA") ==0)){
						$estadoplataforma.="*";
						echo"<td>".$estadoplataforma."</td>";
						$estadoacademico=$estadoplataforma;
				}elseif(($CalAlc > (100-$porcentaje)) && ($CalAlc<60)){
					$estadoacademico ="EN RIESGO (1-59)";
					echo "<td>".$estadoacademico."</td>";
							
				}elseif(( $CalAlc >=60)&&($CalAlc <70)){
					$estadoacademico = "EN RIESGO (60-69)";
					echo "<td>".$estadoacademico."</td>";
					
				}elseif (($CalAlc >=70) && ($CalAlc < 80)){
					$estadoacademico = "AL CORRIENTE (70-79)";
					echo "<td>".$estadoacademico."</td>";
					
				}ELSEIF (($CalAlc >=80) && ($CalAlc <=100)){
					$estadoacademico = "AL CORRIENTE (80-100)";
					echo "<td>".$estadoacademico."</td>";
					
				}ELSE {
					echo "<td>SIN ACTIVIDAD</td>";
					$estadoacademico = "SIN ACTIVIDAD";
				}
				echo "<td>".$row->estado_participacion."</td>";
				echo "<td>".$porcentaje."</td>";
				echo "<td>".$no_matriculaciones."</td>";
				echo "<td>".$suspension."</td>";
				echo "<td>".verificar_origen($curso,$nombre_usuario)."</td>";
				echo "<td>".$origenins."</td>";
				echo "<td>".$row->Dias_Sin_Ingresar_Curso."</td>";
				echo "<td>".$row->ingreso_a_SITIO."</td>";
				echo "<td>".$row->curso."</td>";
				echo "<td>".$row->grupo."</td>";
				$inicio_curso = obtener_fecha_inicio($curso,1);
				$fin_curso = obtener_fecha_fin($curso,1);
				echo "<td>".$inicio_curso."</td>";
				echo "<td>".$fin_curso."</td>";
				echo "<td>".$row->aplica_entrega."</td>";
				echo "<td>".$row->pertenece_remedial."</td>";
				$cal_remedial = $row->calificacion_curso_remedial;
				echo "<td>".$cal_remedial."</td>";
				$intentos = $row->numero_intentos;
				if($intentos >= 1){
					echo "<td>".$intentos."</td>";

				}else{
					echo "<td></td>";
				}
				echo "<td>".(($cal_remedial*20)/100)."</td>";
				if($CalAct>=60 || $cal_remedial>=60){
					echo "<td>ACREDITADO</td>";
				}else{
					echo "<td>NO ACREDITADO</td>";
				}
				echo "<td>".$row->estado_pago."</td>";
				echo "</tr>";
	        }
			
			
		}
	}


	?>
	</table> 

</div>




















