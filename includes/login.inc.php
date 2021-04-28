<?php

if (isset($_POST['login-submit'])){
    require 'db.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {

        $sql = "SELECT usersId,usersUid,usersPwd,usersVeznev,usersKernev FROM users WHERE usersUid=? OR usersEmail=?;"; //ellenőrzi, hogy uid vagy emailnak megfelel-e
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror"); //sql hibát dob tovább
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);

            if($stmt->execute()) {
                $stmt->bind_result($idUsers, $uidUsers,$pwdUsers,$veznevUsers,$kernevUsers);
                if($stmt->fetch()) {
                    $pwdCheck = password_verify($password, $pwdUsers);
                    if ($pwdCheck == false) {
                        header("Location: ../index.php?error=wrongpwd");
                        exit();
                    }
                    else if($pwdCheck == true) {
                        session_start();
                        session_regenerate_id();
                        $_SESSION['userId'] = $idUsers;
                        $_SESSION['userUid'] = $uidUsers;
                        $_SESSION['userVeznev'] = $veznevUsers;
                        $_SESSION['userKernev'] = $kernevUsers;
                        session_write_close();
                        //Sikeres beléptetés után:
                        header("Location: ../index.php?login=success");
                        exit();
                    }
                    else{
                        header("Location: ../index.php?error=wrongpwd");
                        exit();
                    }
                    $stmt->close();
                }else{
                    header("Location: ../index.php?error=nouser");
                exit();
                }
              }else{
                  
              }
        }
    }

}
else {
    header("Location: ../index.php");
    exit();
}