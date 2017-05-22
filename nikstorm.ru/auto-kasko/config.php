<?php
$dbhost="a116495.mysql.mchost.ru";
$dbuser="a116495_EnBcCmY";
$dbpass="14AxSshSym";
$dbname="a116495_YBoJHoe";
        ($link = mysql_pconnect("$dbhost", "$dbuser", "$dbpass")) || die("Couldn't connect to MySQL"); 
        mysql_select_db("$dbname", $link) || die("Couldn't open db: $dbname. Error if any was: ".mysql_error() );
mysql_query("SET NAMES utf8");
?>