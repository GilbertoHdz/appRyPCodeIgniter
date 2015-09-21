<?php

	function truncateFloat($number, $digitos){
		$raiz = 10;
		$multiplicador = pow ($raiz,$digitos);
		$resultado = ((int)($number * $multiplicador)) / $multiplicador;
		return number_format($resultado, $digitos); 
	}

	function porcentajeFaltante($calTema,$tema){
		$porcentaje = 0;
		if ($tema<=2){
			$porcentaje = 100-(($calTema*100)/32);
		}else{
			$porcentaje = 100-(($calTema*100)/36);
		}	
		return $porcentaje;
	}	
	
	function porcentajeFaltanteAjustado($porcentajeTema,$totPorcen_Faltante){
		$porcentaje = $porcentajeTema*100/$totPorcen_Faltante ;		
		return $porcentaje;
	}
	
	function calificacionAjustada_porcentaje($porcenTema_ajustado,$calOriginalTema,$tema,$ptsExtra){
		$pts_ajustados = 0;
		$cal_ajustada = 0;
		if ($tema<=2){
			$pts_ajustados = ($ptsExtra*$porcenTema_ajustado)/100;
			$cal_ajustada = (($calOriginalTema+$pts_ajustados)/32)*100;
		}else{
			$pts_ajustados = ($ptsExtra*$porcenTema_ajustado)/100;
			$cal_ajustada = (($calOriginalTema+$pts_ajustados)/36)*100;
		}	
		return $cal_ajustada;
	}

	function formatearNumero($numero){
		$numero_formateado = '';
		if ($numero<10){
			$numero_formateado = '000'.$numero;
		}elseif ($numero<100){
			$numero_formateado = '00'.$numero;
		}elseif ($numero<1000){
			$numero_formateado = '0'.$numero;
		}else{
			$numero_formateado=$numero;
		}
		return $numero_formateado;
	}

	function reasignarCurso($curso_origen,$curso_actual){
		$ambientes = array(21,25,26);
		$moviles = array(22,24,27);
		$curso_reasignado=0;
		if((strcmp($curso_origen,'G') ==0 || strcmp($curso_origen,'J') ==0)
			&& in_array($curso_actual,$ambientes)){
			$curso_reasignado =19;
		}elseif((strcmp($curso_origen,'G') ==0 || strcmp($curso_origen,'J') ==0)
			&& in_array($curso_actual,$moviles)){
			$curso_reasignado =18;			
		}elseif((strcmp($curso_origen,'H') ==0 || strcmp($curso_origen,'K') ==0)
			&& in_array($curso_actual,$ambientes)){
			$curso_reasignado =19;			
		}elseif((strcmp($curso_origen,'H') ==0 || strcmp($curso_origen,'K') ==0)
			&& in_array($curso_actual,$moviles)){
			$curso_reasignado =18;			
		}elseif((strcmp($curso_origen,'E') ==0 )
			&& in_array($curso_actual,$ambientes)){
			$curso_reasignado =16;			
		}elseif((strcmp($curso_origen,'E') ==0 )
			&& in_array($curso_actual,$moviles)){
			$curso_reasignado =17;			
		}elseif((strcmp($curso_origen,'F') ==0)
			&& in_array($curso_actual,$ambientes)){
			$curso_reasignado =16;			
		}elseif((strcmp($curso_origen,'F') ==0)
			&& in_array($curso_actual,$moviles)){
			$curso_reasignado =17;			
		}elseif((strcmp($curso_origen,'M') ==0 )
			&& in_array($curso_actual,$ambientes)){
			$curso_reasignado =21;			
		}elseif((strcmp($curso_origen,'M') ==0 )
			&& in_array($curso_actual,$moviles)){
			$curso_reasignado =22;			
		}elseif(( strcmp($curso_origen,'N') ==0)
			&& in_array($curso_actual,$ambientes)){
			$curso_reasignado =21;			
		}elseif(( strcmp($curso_origen,'N') ==0)
			&& in_array($curso_actual,$moviles)){
			$curso_reasignado =22;			
		}else{
			$curso_reasignado=$curso_actual;
		}
		return $curso_reasignado;
	}	
	
	function obtener_prefijomatricula($curso){
		$matricula ='pendiente';
		switch($curso){
			case 16:
				$matricula='DAGE130415';
				break;
			case 17:
				$matricula='DMGF130415';
				break;
			case 18:
				$matricula='DMGH270415';
				break;
			case 19:
				$matricula='DAGG270415';
				break;
			case 21:
				$matricula='DAGM110515';
				break;
			case 22:
				$matricula='DMGN110515';
				break;
		}
		return $matricula;
		
	}
	
	function obtener_sufijofolio($curso){
		$folio ='pendiente';
		switch($curso){
			case 16:
				$folio='/DAABTIC/13042015';
				break;
			case 17:
				$folio='/DCMDM/13042015';
				break;
			case 18:
				$folio='/DCMDM/27042015';
				break;
			case 19:
				$folio='/DAABTIC/27042015';
				break;
			case 21:
				$folio='/DAABTIC/11052015';
				break;
			case 22:
				$folio='/DCMDM/11052015';
				break;
		}
		return $folio;
		
	}
	
	function inicio_curso($curso){
		$inicio_curso ='pendiente';
		if ($curso == 16 || $curso == 17){
			$inicio_curso ='13 de abril';
		}elseif($curso == 19 || $curso == 18){
			$inicio_curso ='27 de abril';
		}elseif($curso == 21 || $curso == 22){
			$inicio_curso ='11 de mayo';
		}
		return $inicio_curso;
		
	}
	
	function fin_curso($curso){
		$fin_curso ='pendiente';
		if ($curso == 16 || $curso == 17){
			$fin_curso ='03 de julio';
		}elseif($curso == 19 || $curso == 18){
			$fin_curso ='17 de julio';
		}elseif($curso == 21 || $curso == 22){
			$fin_curso ='31 de julio';
		}
		return $fin_curso;
		
	}
	
	function obtener_curso($curso){
		$letra_curso='';
		switch($curso){
			case 16:
				$letra_curso='E';
				break;
			case 17:
				$letra_curso='F';
				break;
			case 18:
				$letra_curso='H';
				break;
			case 19:
				$letra_curso='G';
				break;
			case 21:
				$letra_curso='M';
				break;
			case 22:
				$letra_curso='N';
				break;
			case 24:
				$letra_curso='Q';
				break;
			case 25:
				$letra_curso='P';
				break;
			case 26:
				$letra_curso='R';
				break;
			case 27:
				$letra_curso='S';
				break;
			default:
				$letra_curso='';
		}
		return $letra_curso;
	}


?>


<h3>Diplomas Emitidos</h3>

<br>
<button id="btnExportar" data-loading-text="Loading..." class="btn btn-danger btn-xs" onclick="exportarCSV('tbDiplosEnviados', 'DiplosEnviados')">
	<span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span>Exportar CVS
</button>

<br><br>

<div class="DiplosEnviados" style="position: relative; overflow: auto; max-height: 60vh;">
	<table id="tbDiplosEnviados" style="width: 5100px" class="tg" >
		<tr>
			<th class="tg-ld5c" style="width: 100px;" >Usuario plataforma</th>
			<th class="tg-ld5c" style="width: 100px;" >Curso origen</th>
			<th class="tg-ld5c" style="width: 100px;" >Curso actual</th>
			<th class="tg-ld5c" style="width: 200px;" >Nombre completo</th>
			<th class="tg-ld5c" style="width: 100px;" >Nombre(s)</th>
			<th class="tg-ld5c" style="width: 100px;" >Apellidos</th>
			<th class="tg-ld5c" style="width:  80px;" >Correo electrónico</th>
			<th class="tg-ld5c" style="width:  80px;" >Correo alternativo</th>
			<th class="tg-ld5c" style="width: 100px;" >Telefono particular</th>
			<th class="tg-ld5c" style="width: 100px;" >Telefono movil</th>
			<th class="tg-ld5c" style="width: 100px;" >Clave del centro de trabajo</th>
			<th class="tg-ld5c" style="width: 250px;" >Nombre CT</th>
			<th class="tg-ld5c" style="width: 100px;" >Nivel CT</th>
			<th class="tg-ld5c" style="width: 100px;" >Municipio CT</th>
			<th class="tg-ld5c" style="width: 100px;" >Localidad CT</th>
			<th class="tg-ld5c" style="width: 400px;" >Diplomado </th>
			<th class="tg-ld5c" style="width: 100px;" >Fecha inicio</th>
			<th class="tg-ld5c" style="width: 100px;" >Fecha termino</th>
			<th class="tg-ld5c" style="width: 100px;" >Convenio</th>
			<th class="tg-ld5c" style="width: 100px;" >Entidad Federativa(Escuela)</th>			
			<th class="tg-ld5c" style="width: 100px;" >Matricula</th>
			<th class="tg-ld5c" style="width: 100px;" >Folio</th>
			<th class="tg-ld5c" style="width: 100px;" >Pagó?***</th>
			<th class="tg-ld5c" style="width: 100px;" >Diploma Impreso?</th>
			<th class="tg-ld5c" style="width: 100px;" >Baja Definitiva?</th>
			<th class="tg-ld5c" style="width: 100px;" >Cal. Tema 1</th>
			<th class="tg-ld5c" style="width: 100px;" >Cal. Tema 2</th>
			<th class="tg-ld5c" style="width: 100px;" >Cal. Tema 3</th>
			<th class="tg-ld5c" style="width: 100px;" >Cal. Final</th>
			<th class="tg-ld5c" style="width: 100px;" >Pertenece a CR</th>
			<th class="tg-ld5c" style="width: 100px;" >Calificación CR</th>
			<th class="tg-ld5c" style="width: 150px;" >Puntos calificación final</th>
			<th class="tg-ld5c" style="width: 100px;" >Cal. Tema 1 c/remedial</th>
			<th class="tg-ld5c" style="width: 100px;" >Cal. Tema 2 c/remedial</th>
			<th class="tg-ld5c" style="width: 100px;" >Cal. Tema 3 c/remedial</th>
			<th class="tg-ld5c" style="width: 100px;" >Cal. Final c/remedial</th>			
		</tr>
	<?php
		$abcd = array(9,10,14,15);
		$e_s = array(16,17,18,19,21,22,24,25,26,27);
		$usuarios_matriculacion = array();
		$folios_cursos = array(0,0,0,0,0,0);
		$folio_formateado = '';
		$curso=0;
		$username='';
		$cal_remedial=0;
		$pertenece_remedial=0;
		$matricula='';
		$folio='';
		$porc_t1=0;
		$porc_t2=0;
		$porc_t3=0;
		$total_porc=0;
		$CalRemT1=0;
		$CalRemT2=0;
		$CalRemT3=0;
		$CalRemFinal=0;
		$CalT1=0;
		$CalT2=0;
		$CalT3=0;
		$CalFinal=0;
		$pts_tema=0;
		$pts_cal=0;
		$suspendido="";
		
		if (isset($stmt4)) {
			$c = 0;
			foreach($stmt4 as $row) {
				$bgc ='<tr>'; 
				if ($c%2==0) { $bgc= "<tr style='background-color: #f1f1f1;'>"; } $c += 1;
				$i=0;
				$curso = (int)$row->curso;
				$pertenece_remedial = $row->pertenece_remedial;
				$cal_remedial = $row->calificacion_curso_remedial;
				$CalFinal = $row->Final;
				$CalT1=$row->tema1;
				$CalT2=$row->tema2;
				$CalT3=$row->tema3;		
				$suspension=$row->suspendido;
				$no_matriculaciones=$row->cantidad_matriculaciones;
				$username = $row->username;
				$gpo_origen = '';
				if((in_array($curso,$abcd) && $no_matriculaciones==1) || (in_array($curso,$e_s) && strcmp($suspension,"NO")==0)){
					$gpo_origen = strtoupper(substr ($username,0,1));
					$curso = reasignarCurso($gpo_origen,$curso);
					echo $bgc;
					echo "<td>".$username."</td>";
					echo "<td>".obtener_curso($curso)."</td>";
					echo "<td>".$row->cursoactual."</td>";			
					echo "<td>".$row->nombre_completo."</td>";
					echo "<td>".$row->firstname."</td>";
					echo "<td>".$row->lastname."</td>";
					echo "<td>".$row->email."</td>";
					echo "<td>".$row->email_alt."</td>";
					echo "<td>".$row->phone1."</td>";
					echo "<td>".$row->phone2."</td>";
					echo "<td>".$row->clavect."</td>";
					$nombre_ct = str_replace('"','',$row->nombrect); 
					echo "<td>".$nombre_ct."</td>";
					echo "<td>".$row->nivelct."</td>";
					echo "<td>".$row->munct."</td>";
					echo "<td>".$row->localct."</td>";
					echo "<td>".$row->Diplomado."</td>";
					echo "<td>".inicio_curso($curso)."</td>";
					echo "<td>".fin_curso($curso)."</td>";
					echo "<td>".$row->convenio."</td>";
					echo "<td>".$row->entidadct."</td>";
						
					
					switch($curso){
						case 16:
							$i = $folios_cursos[0]+1;
							$folios_cursos[0] = $i;
							break;
						case 17:
							$i = $folios_cursos[1]+1;
							$folios_cursos[1] = $i;
							break;
						case 18:
							 $i = $folios_cursos[2]+1;
							$folios_cursos[2] = $i;
							break;
						case 19:
							 $i = $folios_cursos[3]+1;
							$folios_cursos[3] = $i;
							break;
						case 21:
							 $i = $folios_cursos[4]+1;
							$folios_cursos[4] = $i;
							break;
						case 22:
							 $i = $folios_cursos[5]+1;
							$folios_cursos[5] = $i;
							break;
						default:
							$i =0;
							break;
					}	
					$folio_formateado =	formatearNumero($i);
					$matricula = obtener_prefijomatricula($curso);
					$folio = obtener_sufijofolio($curso);
					echo "<td>".$row->matricula."</td>";
					echo "<td>".$row->folio."</td>";
					echo "<td>".$row->estadopago."</td>";
					echo "<td>".$row->impreso."</td>";
					echo "<td>".$row->bajaDef."</td>";
					echo "<td>".truncateFloat(($CalT1/32*100),2)."</td>";
					echo "<td>".truncateFloat(($CalT2/32*100),2)."</td>";
					echo "<td>".truncateFloat(($CalT3/36*100),2)."</td>";
					echo "<td>".$CalFinal."</td>";
					echo "<td>".$pertenece_remedial."</td>";
					echo "<td>".$cal_remedial."</td>";
					$pts_cal = ($cal_remedial*20/100);
					echo "<td>".$pts_cal."</td>";
							
					if (strcmp($pertenece_remedial,"SI")==0 && $cal_remedial >= 60){
						if(($CalFinal+$pts_cal)>=100){
							$CalRemT1 = 100;
							$CalRemT2 = 100;
							$CalRemT3 = 100;
							$CalRemFinal = 100;
						}elseif($CalFinal<60){			
							$CalRemT1 = 60;
							$CalRemT2 = 60;
							$CalRemT3 = 60;
							$CalRemFinal = 60;
						}else{
							$porc_t1 = porcentajeFaltante($CalT1,1);
							$porc_t2 = porcentajeFaltante($CalT2,2);
							$porc_t3 = porcentajeFaltante($CalT3,3);
							$total_porc = $porc_t1+$porc_t2+$porc_t3;
							
							$porc_t1 = porcentajeFaltanteAjustado($porc_t1,$total_porc);
							$porc_t2 = porcentajeFaltanteAjustado($porc_t2,$total_porc);
							$porc_t3 = porcentajeFaltanteAjustado($porc_t3,$total_porc);
						
							$CalRemT1 = calificacionAjustada_porcentaje($porc_t1,$CalT1,1,$pts_cal);
							$CalRemT2 = calificacionAjustada_porcentaje($porc_t2,$CalT2,2,$pts_cal);
							$CalRemT3 = calificacionAjustada_porcentaje($porc_t3,$CalT3,3,$pts_cal);
							$CalRemFinal = $CalFinal+$pts_cal;
							
							
						}	
					}else{
						$CalRemT1=($CalT1/32*100);
						$CalRemT2=($CalT2/32*100);
						$CalRemT3=($CalT3/36*100);
						$CalRemFinal=$CalFinal;
					}
					echo "<td>".truncateFloat($CalRemT1,2)."</td>";
					echo "<td>".truncateFloat($CalRemT2,2)."</td>";
					echo "<td>".truncateFloat($CalRemT3,2)."</td>";
					echo "<td>".truncateFloat($CalRemFinal,2)."</td>";
								
					echo "</tr>";
				}
			}
		
		}
		echo'</table>'

	?>

</div>