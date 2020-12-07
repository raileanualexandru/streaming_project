<?php

if (isset($_POST["reset-request-submit"])) {
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "sitelinkpath/create-new-password.php?selector=$selector&validator=" . bin2hex($toker);
    $expires = date("U") + 1800;

    require 'dbh.inc.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_init($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_init($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }


    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    $subject = 'Reset your password for streaming trailers ';

    $message = '<p>We received a password reset request. The link to reset your password make this request, you can ignore this email</p>';

    $message .= '<p>Here is your password reset link: </p>';

    $message .= '<a href="' .$url . '">'. $url . '</a></p>';

    $headers = "From : streaming Trailers <alex.raileanu91@gmail.com\r\n";

    $headers .= "Reply-To: alex.raileanu91@gmail.com\r\n";

    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: ../reset-password.php?reset=success"); 
    



} else {
    header("Location: ../index.php");
}
