<?php
	/**
	 * http://localhost/
	 * Este framework es de libre distribución
	 * VitaSQL 1.0.0
	 * @author Josué Hernández
	 *
	 */	

	/**
	 * -------------------------------------
	 * 				class vita
	 * -------------------------------------
	 */
	class vita{

		/**
		 *
		 * @param string $url
		 * @param string $user
		 * @param string $pass
		 * @param string $db
		 * 
		 * @return string
		 */
		function connect_db($url = 'localhost', $user = 'root', $pass = '' , $db){

			$db = new MySQLi($url, $user, $pass, $db);
    		if ($db -> connect_errno) {
      			die( "Fallo la conexión a MySQL: (" . $db -> mysqli_connect_errno() . ") " . $db -> mysqli_connect_error());
    		}
    		else{
    			return $db;
    		}
		}
	}
?>