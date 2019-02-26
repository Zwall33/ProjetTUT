<?php
//address of the server where db is installed
$servername = "localhost";

//username to connect to the db
//the default value is root
$username = "root";

//password to connect to the db
//this is the value you would have specified during installation of WAMP stack
$password = "sari";

//name of the db under which the table is created
$dbName = "capteurs";

//establishing the connection to the db.
$conn = new mysqli($servername, $username, $password, $dbName);

//checking if there were any error during the last connection attempt
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//the SQL query to be executed
$conn->query("insert into year (id, title, average, date) select null, title, avg(value) as average, now() from today group by title");

//Closing the connection to DB
$conn->close();
?>
