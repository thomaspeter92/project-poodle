
<?php
ob_start();
?>



<p><strong><?=htmlspecialchars($petProfile['name']);?></strong></p>
<p><strong><?=htmlspecialchars($petProfile['breed']);?></strong></p>
<p><strong><?=htmlspecialchars($petProfile['age']);?></strong></p>
<img src="./public/images/testImage.jpg"/>
<p><strong><?=htmlspecialchars($petProfile['color']);?></strong></p>
<p><strong><?=htmlspecialchars($petProfile['gender']);?></strong></p>
<p><strong><?=htmlspecialchars($petProfile['weight']);?></strong></p>
<p><strong><?=htmlspecialchars($petProfile['friendliness']);?></strong></p>
<p><strong><?=htmlspecialchars($petProfile['activityLevel']);?></strong></p>



<?php
$content = ob_get_clean();
require("template.php");