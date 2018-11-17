<?php	
/**Select all*/
/**function select_all(){
	  global $dbconnect;
    $query = 'SELECT * FROM table 1
              ORDER BY Date';
    $statement = $db->prepare($query);
    $statement->execute();
    $view = $statement->fetchAll();
    $statement->closeCursor();
    return $view;  
}*/
?>