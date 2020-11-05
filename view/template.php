<?php
// TODO: Use $style for additional css
$style = NULL;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">

    <!-- FONT LINKS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;0,900;1,400&display=swap" rel="stylesheet">



    <?= ($style) ? $style : ""; ?>
    <!-- TODO: Change to a variable -->
    <title>Project Poodle</title>
</head>

<body>

    <!-- TODO: Menu Maybe~~~~ -->
    <!-- maybe include or variable depending on -->
    <!-- TODO: Add Content -->
    <?= $content; ?>
    <!-- TODO: Add Footer -->


    <script src="./public/js/carousel.js"></script>
</body>

</html>