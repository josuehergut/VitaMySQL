<?php
 	function delete($db, $table, $query){
 		$param = '';
 		foreach ($query as $key => $value) {
 			$param.= " ".$key." = '".$value."'";
 		}
 		$return = $db->query("DELETE FROM ".$table." WHERE ".$param);
 		return $return;
 	}
?>