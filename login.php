<?php
session_start();
require_once __DIR__.'/Includes/bootstrap.php';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
    redirect('index.php');

$errors=[];
if(isset($_SESSION['login_errors']) && !empty($_SESSION['login_errors']))
{
    $errors = $_SESSION['login_errors'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
<form action="Includes/scripts/login.inc.php" method="POST">
    <label for="username">username</label>
    <input  type="text" name="email" id="username">
    <hr>
    <label for="password">password</label>
    <input  type="password" name="password" id="password">

    <input type="submit">
    <?php
    echo '<br>';
    if($errors)
        foreach ($errors as $key=>$rule_errors)
        {
            echo $key;
            foreach ($rule_errors as $rule_error)
            {
                echo $rule_error;
            }
            echo '<br>';
        }
    ?>
</form>
</body>
</html>