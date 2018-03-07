<?php
	/**
	 * -------------------------
	 *	update_db page, vitaMySQL 1.0.0
	 * -------------------------
	 *
	 * -------------------------
	 * @author Josué Hernández
	 * -------------------------
	 */
	function operator_($key,$value){
    	$word = '!';//en esta variable guardamos la letra que deseamos buscar
		$replace = strpos($key, $word);//buscamos la palaabra en el array
		if ($replace !== false){//si la busqueda es diferente a false entonses entrara
			$key = str_replace('!', '', $key);//remplazamos la variabla encontrada
      		$result = $key." = '".$value."'";//con esta function regresamos la operacion formada      		
      		return $result;
		}
	}

	/**
	 * ---------------------------------
	 * 				insert_db
	 * ---------------------------------
	 */
	function change($db, $table, $val_){
		$param = '';
		$op = '';
		foreach($val_ as $key => $value){
			if (operator_($key, $value)) {
				$i = operator_($key, $value);
				$op.= 'WHERE '.$i;
			}
			else{
				$param.= " ".$key." = '".$value."'";
			}			
		}
		$return = $db->query("UPDATE ".$table." SET ".$param." ".$op);
		return $return;
	}
?>