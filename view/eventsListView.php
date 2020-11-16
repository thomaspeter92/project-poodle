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
    <div class="item">
        <div class="imgContainer"><img src="./private/event/event1.png" alt="event1"></div>
        <div class="content">
            <div class="date">WED, NOV 18, 7:00 PM GMT+9</div>
            <div class="title">Developers.IO Korea Online #02</div>
            <div class="host">Hosted by Hongshik</div>
            <div class="attendees">
                <div><img src="./private/profile/user1.png"></div>
                <div><img src="./private/profile/user2.png"></div>
                <div><img src="./private/profile/user3.png"></div>
                <div><span>75</span></div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="imgContainer"><img src="./private/event/event2.png" alt="event1"></div>
        <div class="content">
            <div class="date">WED, NOV 18, 7:00 PM GMT+9</div>
            <div class="title">Developers.IO Korea Online #02</div>
            <div class="host">Hosted by Hongshik</div>
            <div class="attendees">
                <div><img src="./private/profile/user1.png"></div>
                <div><img src="./private/profile/user2.png"></div>
                <div><img src="./private/profile/user3.png"></div>
                <div><span>75</span></div>
            </div>
        </div>
    </div>
    <div>
        <button type="button">Show more events</button>
    </div>
</section>
<?php
$content = ob_get_clean();
require("template.php");
