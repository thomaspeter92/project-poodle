<p><strong>NAME: <?=" ".htmlspecialchars($petProfile['name']);?></strong></p>
<p><strong>BREED: <?=" ".htmlspecialchars($petProfile['breed']);?></strong></p>
<p><strong>AGE: <?=" ".htmlspecialchars($petProfile['age']);?></strong></p>
<p><strong>COLOR: <?=" ".htmlspecialchars($petProfile['color']);?></strong></p>
<img src="./public/images/testImage<?=$petProfile['photo']?>.jpg" width="500" height="500"/>
<p><strong>GENDER: <?=" ".htmlspecialchars($petProfile['gender']);?></strong></p>
<p><strong>WEIGHT: <?=" ".htmlspecialchars($petProfile['weight']);?></strong></p>
<p><strong><?=htmlspecialchars($petProfile['friendliness']);?></strong></p>
<p><strong><?=htmlspecialchars($petProfile['activityLevel']);?></strong></p>