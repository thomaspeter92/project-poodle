<?php 
if ($events): 
    foreach ($events as $event): ?>
        <div class="item">
            <div class="imgContainer">
                <img src="./private/event/<?=$event->imageName;?>" alt="event image">
            </div>
            <div class="content">
                <div class="date"><?= $event->eventDate; ?></div>
                <div class="title"><?= $event->name; ?></div>
                <div class="host">Hosted by <?= $event->hostName; ?></div>
                <div class="attendees">
                    <!-- <div class="profileImgsContainer"> -->
                <?php 
                    $eventId = $event->id;
                    $guestCount = getGuestCountOfEvent($eventId);
                    //NOTICE: The first profile image should be the host
                    $imageNames = getGuestProfileImagesOfEvent($eventId, 3);
                    foreach ($imageNames as $imageName): 
                        $imageURL = "./private/profile/".$imageName->profileImage;?>
                        <div class='profileImg'>
                            <div class='whiteCircle'><img src=<?=$imageURL;?>></div>
                        </div>
                    <?php endforeach;?>
                    <!-- </div> -->
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
