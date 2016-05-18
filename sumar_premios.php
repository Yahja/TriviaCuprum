<?php
	$fecha=date("d")."-".date("m")."-".date("Y");
	$fecha=(string)$fecha;
	//$cantidad_premios_fecha=1;
	$sw=0;
	$file = fopen("registro_premios.txt", "a+");
	$indice=0;
	while(!feof($file)) 
  {
		$lineas[$indice]=fgets($file);
		$indice++;
	}
	fclose($file);
	
	$indice=0;
	foreach ($lineas as $linea) 
	{
		$fecha_linea=substr($linea, 0, 10);
	  if ($fecha==$fecha_linea)
    {
    	$cantidad_premios_fecha=substr($linea, 11);
    	$cantidad_premios_fecha=str_replace("\n","",$cantidad_premios_fecha);
    	$cantidad_premios_fecha=(int)$cantidad_premios_fecha;
    	$cantidad_premios_fecha++;
    	$lineas[$indice]=$fecha.":".$cantidad_premios_fecha."\n";
    	$sw=1;
    }
   	$indice++;
	}
	$file = fopen("registro_premios.txt", "w");
	
  foreach ($lineas as $linea) 
  {
     	fwrite($file, $linea);
  }
	if ($sw==0) fwrite($file, $fecha.":1\n"); 	 
	fclose($file);
	

