<?php
//str_replace('val', 'replace', $var);
  /**
   * -------------------------
   *  search_db page, vitaMySQL 1.0.0
   * -------------------------
   *
   * -------------------------
   * @author Josué Hernández
   * -------------------------
   */
  /**
   * ---------------------------------
   *        type
   * ---------------------------------
   * @param string $key
   * @param string $value
   * @return string
   */
  function type($key, $value){
    switch ($key){
      /*------------------------*/
      case 'LIKE'://si es LIKE
        return $key." '%".$value."%'";
        break;
      /*------------------------*/
      case 'LIMIT'://si es LIMIT
        return $key.' '.$value;
        break;
      /*------------------------*/
      case 'ORDER-ASC':
        return 'ORDER BY '.$value.' ASC';
        break;
      /*------------------------*/
      case 'ORDER-DESC':
        return 'ORDER BY '.$value.' DESC';
        break;
      /*------------------------*/
      case 'ORDER':
        return 'ORDER BY '.$value;
        break;
      /*------------------------*/
      default:

        break;
    }
  }

  /**
   * ---------------------------------------------
   *        operator
   * ---------------------------------------------
   * @param string $key
   * @param string $value
   * @return string
   */
	function operator($key,$value){
    $word = '@';//en esta variable guardamos la letra que deseamos buscar
		$replace = strpos($key, $word);//buscamos la palaabra en el array
		if ($replace !== false){//si la busqueda es diferente a false entonses entrara
			$key = str_replace('@', '', $key);//remplazamos la variabla encontrada
      $result = type($key, $value);//con esta function regresamos la operacion formada
      return $result;
		}
	}


  /**
   * -------------------------------------------------
   *        search
   * ------------------------------------------------
   * @param string $db
   * @param string $table
   * @param string $val
   * @return string
   */
	function search($db, $table, $val){
		$param = '';//esta variable contendra las columnas de la tabla a la que se desea hacer la busqueda
		$operation = '';//si existe una operacion se asignara a esta variable
		foreach($val as $key => $value) {
			if (operator($key, $value)){
				$i = operator($key, $value);
				$operation.= ' '.$i;
			}
			else{
				if ($value == '') {
					$param.= ' '.$key;
				}
				else{
					$param.= ' '.$key." = '".$value."'";
				}
			}
		}
		$return = $db->query("SELECT * FROM ".$table." WHERE".$param."".$operation."");
    return $return;
	}
?>
