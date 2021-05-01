<?php

if (isset($_POST["submit-contactus"])){
$nev=$_POST["nev"];
$email=$_POST["email"];
$msg=$_POST["msg"];

require_once 'db.inc.php';
require_once 'functions.inc.php';

    if (emptyInputContact($nev,$email,$msg) !== false) {
        header("location: ../index.php?error=emptyInput");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../index.php?error=invalidEmail".$email);
        exit();
    }

}
else {
    header("location: ../index.php");
    exit();
}
sendMsg($conn, $nev, $email,$msg);
?>