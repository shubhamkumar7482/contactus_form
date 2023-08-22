
<?php

$hname = "localhost";
$uname = "root";
$pass = '';
$db = 'bs';

$con = mysqli_connect($hname,$uname,$pass,$db);

if(!$con){
    die("cannot connect to Database.".mysqli_connect_error());
}

// filter the data 
function filteration($data){
    foreach($data as $key => $value){
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);      

        $data[$key] = $value;
    }
    return $data;
}

?>