<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Docentefun {

	$porcentajeABCD=100;
	$porcentajeEF=100;
	$porcentajeGH=100;
	$porcentajeMN=100;
	$porcentajePQ=100;
	$porcentajeRS=78;

	$calificacionesABCD = "mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada
		+mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada+mgg11.cal_ponderada+
		mgg12.cal_ponderada+mgg13.cal_ponderada+mgg142.cal_ponderada+mgg15.cal_ponderada+mgg16.cal_ponderada+mgg17.cal_ponderada+
		mgg18.cal_ponderada+mgg19.cal_ponderada+mgg20.cal_ponderada+mgg212.cal_ponderada";

	$calificacionesEF = "mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada
		+mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada+mgg11.cal_ponderada+
		mgg12.cal_ponderada+mgg13.cal_ponderada+mgg142.cal_ponderada+mgg15.cal_ponderada+mgg16.cal_ponderada+mgg17.cal_ponderada+
		mgg18.cal_ponderada+mgg19.cal_ponderada+mgg20.cal_ponderada+mgg212.cal_ponderada";

	$calificacionesGH = "mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada
		+mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada+mgg11.cal_ponderada+
		mgg12.cal_ponderada+mgg13.cal_ponderada+mgg142.cal_ponderada+mgg15.cal_ponderada+mgg16.cal_ponderada+mgg17.cal_ponderada+
		mgg18.cal_ponderada+mgg19.cal_ponderada+mgg20.cal_ponderada+mgg212.cal_ponderada";

	$calificacionesMN = "mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada
		+mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada+mgg11.cal_ponderada+
		mgg12.cal_ponderada+mgg13.cal_ponderada+mgg142.cal_ponderada+mgg15.cal_ponderada+mgg16.cal_ponderada+mgg17.cal_ponderada+
		mgg18.cal_ponderada+mgg19.cal_ponderada+mgg20.cal_ponderada+mgg212.cal_ponderada";

	$calificacionesPQ = "mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada
		+mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada+mgg11.cal_ponderada+
		mgg12.cal_ponderada+mgg13.cal_ponderada+mgg142.cal_ponderada+mgg15.cal_ponderada+mgg16.cal_ponderada+mgg17.cal_ponderada+
		mgg18.cal_ponderada+mgg19.cal_ponderada+mgg20.cal_ponderada+mgg212.cal_ponderada";
	
	$calificacionesRS="mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada+
		mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada+mgg11.cal_ponderada
		+mgg12.cal_ponderada+mgg13.cal_ponderada+mgg142.cal_ponderada+mgg15.cal_ponderada+mgg16.cal_ponderada+mgg17.cal_ponderada+
		mgg18.cal_ponderada";

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
	    if (($curso == 18 || $curso == 19) &&
		   (strcmp($letra_inicio,'g')==0 || strcmp($letra_inicio,'h')==0
		    || strcmp($letra_inicio,'j')==0 || strcmp($letra_inicio,'k')==0)){
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


	

}

?>