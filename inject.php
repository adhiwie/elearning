<?php 

mysql_connect('localhost','root','tembok');
mysql_select_db('elearning');
for($i=1; $i<6; $i++){
	$nim = 'ahli_'.$i;
	if(mysql_query("INSERT INTO user VALUES('','$nim',md5($nim),'$nim','','2','0')")){
		echo "sukses";
	}

}
?>