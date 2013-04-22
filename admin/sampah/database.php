<?php
require_once('config.php');

//mysql_connect(host,username,password);

if(!(@mysql_connect($host,$userdb,$passdb))){
	echo mysql_error();
}


//mysql_db_select(namadatabase);
@mysql_select_db("tokoonline") or die("Error Database");

$hasil=@mysql_query("select * from produk");

while($row=mysql_fetch_array($hasil)){
	echo $row['namaproduk']."<br/>";
}

?>