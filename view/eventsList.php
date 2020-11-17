<?php foreach ($events as $event): ?>
<div class="item">
    <div class="imgContainer"><img src="./private/event/event1.png" alt="event1"></div>
    <div class="content">
        <div class="date"><?= $event->eventDate; ?></div>
        <div class="title"><?= $event->name; ?></div>
        <div class="host">Hosted by <?= $event->hostName; ?></div>
        <div class="attendees">
            <?php 
                $eventId = $event->id;
                $guestCount = getGuestCountOfEvent($eventId)+1; //+1 because of the host
                
                //TODO: Get members profile images by eventId, first should be the host
                

            ?>
            <div><img src="./private/profile/user1.png"></div>
            <div><img src="./private/profile/user2.png"></div>
            <div><img src="./private/profile/user3.png"></div>
            <div><span><?=$guestCount;?></span></div>
        </div>
    </div>
    <input type="hidden" class="eventId" value="<?=$event->id;?>">
</div>
<?php endforeach; ?>