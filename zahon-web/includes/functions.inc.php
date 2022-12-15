<?php

function emptyInputSignup($email, $pwd, $pwdRepeat, $invite)
{
    $result;
    if (empty($email) || empty($pwd) || empty($pwdRepeat) || empty($invite)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat)
{
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdTooShort($pwd)
{
    $result;
    if (strlen($pwd) < "5") {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidInvite($invite)
{
    $result;
    if ($invite === "85473") {
        $result = false;
    } else {
        $result = true;
    }
    return $result;
}

function uidExists($conn, $email)
{
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $email, $pwd)
{
    $sql = "INSERT INTO users (usersEmail, usersPwd) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php");
    exit();
}

function emptyInputLogin($email, $pwd)
{
    $result;
    if (empty($email) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $pwd)
{
    $uidExists = uidExists($conn, $email);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        header("location: ../index.php");
        exit();
    }
}
?>