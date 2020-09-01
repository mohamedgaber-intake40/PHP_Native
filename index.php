<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <h1>home</h1>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION == true)
    {?>
    <h1> logged in</h1>
    <h1>
        <?php echo $_SESSION['email'] ?>
    </h1>
        <form action="Includes/scripts/logout.inc.php">
            <input type="submit" value="logout">
        </form>
    <?php
    }
    ?>

</body>
</html>

<?php

