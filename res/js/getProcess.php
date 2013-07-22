<?php
	mysql_connect('localhost','root','tembok');
	mysql_select_db('elearning');

    // Get parameters from Array
    $cat_id = !empty($_GET['id']) 
              ?intval($_GET['id']):0;

	// Execute Query in the right order  
   	//(value,text) 
    $query = "SELECT id,proc_name FROM process"; 

    //  else concatenate query with city id in order to filter.
    if($cat_id>0) $query.=" WHERE cat_id = '$cat_id'";  
    else $query.=" LIMIT 10"; 

    $result = mysql_query($query); 
    $items = array(); 
    if($result && mysql_num_rows($result)>0) { 
        while($row = mysql_fetch_array($result)) { 
            $items[] = array( $row[0], $row[1] ); 
        }         
    } 
    mysql_close(); 
    // convert into JSON format and print
    echo json_encode($items);
?>