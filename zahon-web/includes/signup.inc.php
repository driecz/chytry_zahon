<?php

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    $invite = $_POST['invite'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($email, $pwd, $pwdRepeat, $invite) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if (pwdTooShort($pwd) !== false){
        header("location: ../signup.php?error=tooshortpassword");
        exit();
    }
    if (uidExists($conn, $email) !== false) {
        header("location: ../signup.php?error=emailtaken");
        exit();
    }
    if (invalidInvite($invite) !== false) {
        header("location: ../signup.php?error=invalidinvite");
        exit();
    }

    createUser($conn, $email, $pwd);
}
else {
    header("location: ../signup.php ");
    exit();
}
?>