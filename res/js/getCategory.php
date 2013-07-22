<?php
	mysql_connect('localhost','root','tembok');
	mysql_select_db('elearning');

	// Execute Query in the right order  
   	//(value,text) 
    $query = "SELECT id,cat_name FROM category"; 
    $result = mysql_query($query); 
    $items = array(); 
    if($result &&  
       mysql_num_rows($result)>0) { 
        while($row = mysql_fetch_array($result)) { 
            $items[] = array( $row[0], $row[1] ); 
        }         
    } 
    mysql_close(); 
    // convert into JSON format and print
    echo json_encode($items);
?>