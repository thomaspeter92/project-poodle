<?php
// TODO: Use $style for additional css
$style = NULL;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <?= ($style) ? $style : ""; ?>
    <!-- TODO: Change to a variable -->
    <title>Project Poodle</title>
</head>

<body>
    <!-- TODO: main menu -->
    <!-- maybe include or variable depending on -->
    <!-- TODO: Add Content -->
    <?= $content; ?>
    <!-- TODO: Add Footer -->
</body>

</html>