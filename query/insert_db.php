<?php
	/**
	 * -------------------------
	 *	insert_db page, vitaMySQL 1.0.0
	 * -------------------------
	 *
	 * -------------------------
	 * @author Josué Hernández
	 * -------------------------
	 */
	/**
	 * ---------------------------------
	 * 				insert_db
	 * ---------------------------------
	 * @param string $db
	 * @param string $table
	 * @param string $queery
	 * @return int
	 */
	function insert_to($db, $table, $query){
		$in = '';//guarda todos los array padres
		$values = '';//guarda todos los array hijos
		$i = 0;	 //contador		
		foreach ($query as $val => $key) {
			$count = count($query);//contamos el array mandado
			$f = $count-1;//le retamos uno
			$i = $i + 1;//al contador le sumamos 1 por vueltas

			if ($i <= $f) {//si el valor de $i es menor o igual pondra una coma
				$in.= $val.','; 
				$values.= "'".$key."'".',';
			}
			else{//si el contador es mayor a $f no pondra comas
				$in.= $val; 
				$values.= "'".$key."'";
			}
		}
		/**
		 * creamos $check para ver el resultado de la consulta
		 */
		$check = $db->query("INSERT INTO ".$table."(".$in.") VALUES (".$values.")");		

		if ($check!=0) {//si check es diferente de 0 entonses se guardo correctamente la consulta
			return true;
		}
		else{//de lo contrario se creo un error
			return false;
		}		
	}
?>