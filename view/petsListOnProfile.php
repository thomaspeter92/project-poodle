<?php 
if (isset($petPreviews)): 
    foreach($petPreviews as $preview):?>
    <div class="petListElement" data-petId="<?=$preview['id']?>">
        <div class="petInnerDiv">
            <img class="petImage" src="./private/pet/<?=!empty($preview['photo']) ? $preview['photo'] : 'default.png' ?>" alt="pet profile image">
        </div>
        <div class="petInnerDiv">
            <table>
                <tr>
                    <td colspan="2">            
                        <div class="petName"><?= $preview['name'] ?>&nbsp;<?= $preview['gender'] == 'male' ? '<i class="fas fa-mars"></i>' : '<i class="fas fa-venus"></i>' ?></div>
                    </td>
                </tr>
                <tr>
                    <td class="icon"><i class="fas fa-dog"></i></td>
                    <td class="text"><?= $preview['breed'] ?></td>
                </tr>
                <tr>
                    <td class="icon"><i class="fas fa-birthday-cake"></i></td>
                    <td class="text"><?= $preview['age'] ?> years</td>
                </tr>
            </table>
        </div>
    </div>
<?php 
    endforeach;
else : 
    echo "<div class='noEvents'>Please add your first lovely pet.</div>";
endif;
?>
