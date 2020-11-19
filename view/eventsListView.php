<?php
$style = "<link rel='stylesheet' href='./public/css/eventsList.css'>";
ob_start();
?>
<section>
    <div></div>
    <div id="inputContainer">
        <input type="text" id="searchEvents" placeholder="Search events">
        <select id="selectOption">
            <option value="anyDay">Any day</option>
            <option value="today">Today</option>
            <option value="tomorrow">Tomorrow</option>
            <option value="thisWeek">This week</option>
            <option value="thisWeekend">This weekend</option>
            <option value="nextWeek">Next week</option>
        </select>
        <div id="addButton">
            <button class="button fullText">Add a Event</button>
            <button class="button shortText">+</button>
        </div>
    </div>
    <div id="eventsList">
        <?php require("./view/eventsList.php"); ?>
    </div>
    <!-- //TODO: Limit showing events
    <div>
        <button type="button">Show more events</button>
    </div> -->
</section>
<script>
    {
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

        const searchEvents = document.querySelector("#searchEvents");
        searchEvents.addEventListener("keypress", (e) => {
            if (e.key === "Enter") {
                const text = e.target.value;
                const url = "index.php?action=searchEvents&search="+text;
                const xhr = new XMLHttpRequest();
                xhr.addEventListener("load", () => {
                    if (xhr.status === 200) {
                        const eventsList = document.querySelector("#eventsList");
                        eventsList.innerHTML = xhr.responseText;
                    }
                });
                xhr.open("GET", url);
                xhr.send(null);
            }
        });

        const selectOption = document.querySelector("#selectOption");
        selectOption.addEventListener("change", (e) => {
            const option = e.target.value;
            const url = "index.php?action=searchEvents&option="+option;
            const xhr = new XMLHttpRequest();
            xhr.addEventListener("load", () => {
                if (xhr.status === 200) {
                    const eventsList = document.querySelector("#eventsList");
                    eventsList.innerHTML = xhr.responseText;
                }
            });
            xhr.open("GET", url);
            xhr.send(null);
        });

        const addButton = document.querySelector("#addButton>button");
        addButton.addEventListener("click", (e) => {
            //TODO: Popup adding event page
            alert("TODO: Popup adding event page!")
        });
    }
</script>
<!-- Script used for map. @TODO Move to page related to the event list once merging is done-->
<script src="https://kit.fontawesome.com/f66e3323fd.js" crossorigin="anonymous"></script>
<!-- GEOCODER lat lon from address -->
<script type="text/javascript" src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=cea8248c64bf22c135e642408c2fb6c2&libraries=services"></script>
<!-- MAP -->
<script type="text/javascript" src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=cea8248c64bf22c135e642408c2fb6c2"></script>
<script src="./public/js/event.js"></script>
<?php
$content = ob_get_clean();
require("template.php");
