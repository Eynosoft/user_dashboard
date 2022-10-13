<?php 

$host = "localhost"; 
$user = "postgres"; 
$pass = "123"; 
$db = "user_record";

$connection_string = "host={$host} dbname={$db} user={$user} password={$pass}";
$dbconn = pg_connect($connection_string);
if($dbconn) {
    echo '';
} else {
    echo 'something went wrong!';

}

?>
