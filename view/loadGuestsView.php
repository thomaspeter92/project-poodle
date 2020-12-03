<style>
    .modalSubDiv{
        overflow-y: scroll;
        height: 50%;
        width: 40%;
    }
    .modalSubDiv > .modalDivContent {
        display: flex;
        flex-wrap: wrap;
        height: 100%;
        padding: 50px 0 50px 0;
        border-radius: 10px;

    }
    
</style>

<?php foreach($guestList as $guest): ?>
    <div class="guestListItem">
        <img class="hostPhoto" src="./private/profile/<?=!empty($guest['image']) ? $guest['image'] : 'defaultProfile.png' ;?>"></img>
        <p><?= $guest['guestName'] ?><br><span>
        <?= $guest['guestId'] === $event['hostId'] ? '<strong>HOST</strong>' : 'Guest'; ?></span></p>
        <?= !isset($_SESSION['id']) ? '<div class="overlay"></div>' : null ?>
    </div>
<?php endforeach;?>