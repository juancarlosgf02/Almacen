<?php
   $link=mysql_connect("localhost","root","") or die ("No se pudo conectar:" ); 
   mysql_select_db("bdinventarline",$link) or die (mysql_error()); 
?>