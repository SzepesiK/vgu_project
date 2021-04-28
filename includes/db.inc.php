<?php

$servername = "localhost";
$dBUsername = "seley_project";
$dBPassword = "5FwRtBRuUE";
$dBName = "seley_project";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
mysqli_set_charset($conn,"utf8");

if(!$conn){
die("Csat hiba: ".mysqli_connect_error());}