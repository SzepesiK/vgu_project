<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "vgu";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
mysqli_set_charset($conn,"utf8");

if(!$conn){
die("Csat hiba: ".mysqli_connect_error());}