<?php 

session_start();
$_SESSION["DC"] = 1234;
$_SESSION["MARVEL"] = 1234;
$usuario = "MARVEL";
$contraseña = 1234;

if (isset($_SESSION[$usuario])&&$contraseña===$_SESSION[$usuario]) {
    if ($usuario==="DC") {
        include_once("DC.php");
    }elseif ($usuario==="MARVEL") {
        include_once("Marvel.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

</body>
</html>