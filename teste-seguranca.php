<?php
	 $query = mysql_query("SELECT * FROM usuarios");
	 while($e = mysql_fetch_array($query)){
		echo $e["login"]."<br>";
		echo $e["senha"]."<br>";
	}
?>