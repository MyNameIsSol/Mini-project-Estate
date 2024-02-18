<?php
$server="localhost";
$usernam="root";
$pwdd="";
$dbname="eliteproperty";

// $server="localhost";
// $usernam="eliteexp_user";
// $pwdd="eliteexpress100%";
// $dbname="eliteexp_db";

$conn = mysqli_connect($server,$usernam,$pwdd,$dbname);
if(!$conn){
    die('Error:connection failed '.mysqli_connect_error());
}
