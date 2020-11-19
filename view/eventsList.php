<?php 
if ($events): 
    foreach ($events as $event): ?>
        <div class="item">
            <div class="imgContainer"><img src="./private/event/event1.jpg" alt="event1"></div>
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
                    <div class="secondImg"><img src="./private/profile/user3.png"></div>
                    <div class="firstImg"><img src="./private/profile/user2.png"></div>
                    <div class="hostImg"><img src="./private/profile/user1.png"></div>
                    <div class="guestCount"><span><?=$guestCount;?></span></div>
                </div>
            </div>
            <input type="hidden" class="eventId" value="<?=$event->id;?>">
        </div>
<?php 
    endforeach; 
else : 
    echo ($text) ? 
        "<div class='noEvents'>Sorry, there are no events for \"". $text ."\"</div>" : 
        "<div class='noEvents'>Sorry, there are no events.</div>";?>
    <div class="noEventsSub">Try searching for something else.</div>
<?php
endif; 
?>
