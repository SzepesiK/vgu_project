<?php
function emptyInputSignup($veznev, $kernev, $email, $username, $pwd, $pwdrepeat){

    $result;
    if (empty($veznev) || empty($kernev) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)) {
        $result=true;
    }
    else{
        $result = false;
    }
    return $result;
}

function emptyInputContact($nev, $email, $msg){

    $result;
    if (empty($nev) || empty($email)|| empty($msg)) {
        $result=true;
    }
    else{
        $result = false;
    }
    return $result;
}



function invalidUid($username){

    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result=true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){

    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result=true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat){

    $result;
    if ($pwd !== $pwdrepeat) {
        $result=true;
    }
    else{
        $result = false;
    }
    return $result;
}


function uidExists($conn, $username, $email){
    $sql="SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=sqlerror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $result;
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);

}

function createUser($conn, $veznev, $kernev, $email, $username, $pwd){
    $sql="INSERT INTO users (usersUid,usersEmail,usersPwd,usersVeznev,usersKernev) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=sqlerror".mysqli_error($conn));
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssss",$username,$email,$hashedPwd,$veznev,$kernev);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../index.php?signup=success");
    exit();
}

function sendMsg($conn, $nev, $email, $msg){
    $sql="INSERT INTO contact (contactNev,contactEmail,contactMsg) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=sqlerror");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss",$nev,$email,$msg);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../index.php?contact=success");
    exit();
}
function getMessages($conn){

$sql="SELECT * FROM contact ORDER BY contactId DESC;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../index.php?error=sqlerror");
    exit();
}
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);
echo "<center><table border='1'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Név</th>";
echo "<th>E-mail</th>";
echo "<th>Üzenet</th>";
echo "</tr></center>";

while ($row = mysqli_fetch_assoc($resultData)){
    echo "<tr>";
    foreach ($row as $field => $value) {
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
mysqli_stmt_close($stmt);
}
?>