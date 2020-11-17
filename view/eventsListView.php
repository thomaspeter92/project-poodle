<?php
$style = "<link rel='stylesheet' href='./public/css/eventsList.css'>";
ob_start();
?>
<section>
    <div></div>
    <div id="inputOptions">
        <input type="text" placeholder="Search events">
        <select id="selectDay">
            <option value="Any day">Any day</option>
            <option value="Today">Today</option>
            <option value="Tomorrow">Tomorrow</option>
            <option value="This week">This week</option>
            <option value="This weekend">This weekend</option>
            <option value="Next week">Next week</option>
        </select>
    </div>
    <?php foreach ($events as $event): ?>
    <div class="item">
        <div class="imgContainer"><img src="./private/event/event1.png" alt="event1"></div>
        <div class="content">
            <div class="date"><?= $event->dateCreated; ?></div>
            <div class="title"><?= $event->name; ?></div>
            <div class="host">Hosted by <?= $event->hostName; ?></div>
            <div class="attendees">
                <div><img src="./private/profile/user1.png"></div>
                <div><img src="./private/profile/user2.png"></div>
                <div><img src="./private/profile/user3.png"></div>
                <div><span>75</span></div>
            </div>
        </div>
        <input type="hidden" class="eventId" value="<?=$event->id;?>">
    </div>
    <?php endforeach; ?>
    <div>
        <button type="button">Show more events</button>
    </div>
</section>
<script>
    const items = document.querySelectorAll(".item");
    items.forEach(item => {
        item.addEventListener("click", () => {
            const eventId = item.querySelector(".eventId").value;
            if (eventId) {
                const url = `index.php?action=showEventDetail&eventId=${eventId}`;
                window.location.href = url;
            }
        });    
    });
</script>
<?php
$content = ob_get_clean();
require("template.php");
