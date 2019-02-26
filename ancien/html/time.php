<?php
$t = Date("H-i");
$i = "20-50";

$servername = "localhost";
$username = "root";
$password = "sari";
$dbName = "NOM BDD";


function error(){
	sleep(5);
	echo "error";
	connection();
}
function connection(){
	$conn = new mysqli($servername, $username, $password, $dbName);
	if ($conn->connect_error) {
	  error();
	}

	$query = "COMMANDE SQL ICI";
	echo "connection";
	$conn->close();
}

while(1){
	echo "1";
if ($t >= $i){
	echo "2";
	connection();
}
sleep(10);
}

?>