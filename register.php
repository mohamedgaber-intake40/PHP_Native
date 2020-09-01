<?php
require_once __DIR__.'/Includes/bootstrap.php';
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
    redirect('index.php');

$errors=[];
if(isset($_SESSION['register_errors']) && !empty($_SESSION['register_errors']))
{
    $errors = $_SESSION['register_errors'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
<form action="Includes/scripts/register.inc.php" method="POST">
    <label for="username">username</label>
    <input  type="text" name="username" id="username">
    <hr>
    <label for="password">password</label>
    <input  type="password" name="password" id="password">
    <hr>
    <label for="password_confirm">confirm password</label>
    <input  type="password" name="password_confirm" id="password_confirm">

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