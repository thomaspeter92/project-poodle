<?php foreach($guestList as $guest): ?>
    <div class="guestListItem">
        <img class="hostPhoto" src="./private/profile/<?=$guest['image'];?>"></img>
        <p><?= $guest['guestName'] ?><br><span>
        <?= $guest['guestId'] === $event['hostId'] ? '<strong>HOST</strong>' : 'Guest'; ?></span></p>
        <?= !isset($_SESSION['id']) ? '<div class="overlay"></div>' : null ?> <?= $guest['guestId']; ?>
    </div>
<?php endforeach;?>