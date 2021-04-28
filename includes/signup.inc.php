<?php

if (isset($_POST["submit"])){
$veznev=$_POST["veznev"];
$kernev=$_POST["kernev"];
$email=$_POST["email"];
$username=$_POST["uid"];
$pwd=$_POST["pwd"];
$pwdrepeat=$_POST["pwdrepeat"];

require_once 'db.inc.php';
require_once 'functions.inc.php';

if (emptyInputSignup($veznev, $kernev,$email, $username,$pwd,$pwdrepeat) !== false) {
    header("location: ../index.php?error=emptyInput");
    exit();
}
if (invalidUid($username) !== false) {
    header("location: ../index.php?error=invalidUid");
    exit();
}
if (invalidEmail($email) !== false) {
    header("location: ../index.php?error=invalidEmail".$email);
    exit();
}
if (pwdMatch($pwd, $pwdrepeat) !== false) {
    header("location: ../index.php?error=pwdNotMatch");
    exit();
}
if (uidExists($conn, $username, $email) !== false) {
    header("location: ../index.php?error=usernameTaken");
    exit();
}
}
else {
    header("location: ../index.php");
    exit();
}
createUser($conn, $veznev, $kernev, $email, $username, $pwd);
?>