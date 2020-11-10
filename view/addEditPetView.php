<?php
ob_start();
?>

<form action="index.php" method="POST">
    Name:<input type="text" name="name"></br>
    Type:<input type="text" name="type"></br>
    Breed:<input type="text" name="breed"></br>
    Age:<input type="text" name="age"></br>
    Gender:<input type="text" name="gender"></br>
    Weight:<input type="text" name="weight"></br>
    Color:<input type="text" name="color"></br>
    Friendliness:<input type="text" name="friendliness"></br>
    Activity Level:<input type="text" name="activityLevel"></br>
    Owner ID:<input type="number" name="ownerId" value="<?= $_SESSION['id']; ?>"></br>
    <input type="submit" value="submit">
</form>





<?php
ob_get_clean();
require("template.php")
?>