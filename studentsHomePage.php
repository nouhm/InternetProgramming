<?php 


session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale-1.0">
        <title> studentsHomePage </title>
    </head>

    <body>
        <?php echo "Welcome " . $_SESSION['id'];  ?>
    </body>

</html>

