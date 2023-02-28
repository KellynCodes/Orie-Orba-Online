<?php

require 'create_new_password.php';

if(isset($_POST['reset_password'])){
    $selectorToken = $_POST['selectorToken'];
    $validatorToken = $_POST['validatorToken'];
    $new_password = $_POST['new_password'];
    $repeated_password = $_POST['repeated_password'];

    if(empty($new_password) || empty($repeated_password)){
        header("location: create_new_password.php");
        $msg = "Please make sure all the inputs are not empty";
        $msgtype = "danger";
        exit();
    }else if($new_password !== $repeated_password){
        header("location: create_new_password.php");
        $msg = "Password do not match please try again";
        $msgtype = "danger";
        exit();
    }

    $currentDate = date("U");
    
    require 'conn.php';

    $selectDb = "SELECT * FROM passwordresetion WHERE pwdResetSelectorToken = ? AND pwdResetExpiresToken >= ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $selectDb)){
        $msg = "An error occured";
        $msgtype = "danger";
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "ss", $selectorToken, $currentDate);
        mysqli_stmt_execute($stmt);

        $stmtResult = mysqli_stmt_get_result($stmt);
        if(!$row = mysqli_fetch_assoc($stmtResult)){
            $msg = "You need to Re-submit your reset request.";
            exit();
        }else{
            $tokenBin = hex2bin($validatorToken);
            $tokencheck = password_verify($tokenBin, $row['pwdResetToken']);

            if($tokencheck === false){
                $msg = "You need to resubmit Your request.";
                exit();
            }elseif($tokencheck === true){
                $tokenEmail = $row['pwdResetEmail'];
                $sqlStmt = "SELECT * FROM users WHERE email = ?";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sqlStmt)){
                    $msg = "An error occured!";
                    $msgtype = "danger";
                    exit();
                }else{
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $statementResult = mysqli_stmt_get_result($stmt);
                    if(!$row = mysqli_fetch_assoc($statementResult)){
                        $msg = "Please Your need to resubmit your request.";
                        exit();
                    }else{
                        $updateSqli = "UPDATE users SET password = ? WHERE email = ?";
                       $stmt = mysqli_stmt_init($conn);
                         if(!mysqli_stmt_prepare($stmt, $sqlStmt)){
                    $msg = "An error occured!";
                    $msgtype = "danger";
                    exit();
                         }else{
                            $newPwdHash = password_hash($new_password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $deletDb = "DELETE FROM passwordresetion WHERE pwdResetEmail = ?";
                            $stmt = mysqli_stmt_init($conn);
                            if(mysqli_stmt_prepare($stmt,$deletDb)){
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("location: login.php?newpwd=passwordupdated");
                            }else{
                                header("location: create_new_password.php");
                                $msg = "Error occured! Please try Again";
                                $msgtype = "danger";
                            }
                         }

                    }
                }
            }
        }
    }
}