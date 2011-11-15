<?php

include('./mysql.connect.php');

mysql_connect($bdd_server, $bdd_user, $bdd_pass);
mysql_select_db($bdd_db);

$query=mysql_query("INSERT INTO `game`.`game1` (`id`, `date`, `time`, `country`, `city`, `comment`, `path`, `distance`) VALUES (NULL, CURRENT_TIMESTAMP, '".$_GET['time']."', '".$_GET['country']."', '".$_GET['city']."', '".$_GET['comment']."', '".$_GET['path']."', '".$_GET['distance']."');");

$query=mysql_query("SELECT * FROM `game`.`game1` ORDER BY `date` DESC LIMIT 0, 5;");

echo "<br />HALL OF FAME :";
$i = 0;
while($result=mysql_fetch_array($query)) {
$who = $result['comment'].' from '.$result['city'].', '.$result['country'];
if($i==0) {
$who = 'you !';
$i=1;
}
	echo "<br />".$result['time']."ms : ".$who;
}

?>