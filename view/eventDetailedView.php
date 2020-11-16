<?php ob_start();?>
<link rel="stylesheet" href="./public/css/Modal.css"/>

<style>

    #wrapper {
        background-color: rgb(245, 245, 245);
        width: 100vw;
    }

    .eventDetail {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        width: 100vw;
        padding-top: 100px;
        margin: auto;
        padding-bottom: 50px;
    }

    .eventDetailHeader {
        width: 100%;
        margin-bottom: 20px;
        background-color: white;
        border-bottom: 1px solid lightgray;
    }

    #eventHeaderContent {
        width: 85%;
        margin: auto;
        padding-bottom: 20px;
    }

    #eventHeaderContent h3 {
        font-size: 2em;
    }

    #eventHeaderContent>p {
        color: grey;
    }

    #headerContentExtra {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    #headerContentExtra p:first-child {
        display: flex;
        align-items: center;
    }

    .hostPhoto {
        height: 50px;        
        margin-right: 20px;
        clip-path: circle(50% at 50% 50%);
    }

    .eventDetailMainContent {
        display: flex;
        justify-content: space-between;
        width: 85%;
        margin-bottom: 20px;
    }

    .eventDetailDescription {
        width: 65%;
    }

    .eventDetailSideContent {
        width: 34%;
    }

    .eventImage {
        max-width: 100%;
        margin-bottom: 20px;
    }

    #map img {
        width: 100%;
    }

    #eventInfo {
        background-color: white;
        border-radius: 10px;
    }

    .eventInfoChunk {
        display: flex;
        align-items: center;
        width: 50%;
        margin: 10px;
    }

    .eventInfoChunk p {
        margin-left: 20px;
    }

    .eventInfoChunk i {
        width: 20px;
        height: 20px;
        font-size: 1.5em;
        color: #ff3864
    }

    #guestList {
        width: 100%;
    }

    .guestListItem {
        width: 100px;
        height: 120px;
        background-color: white;
        border-radius: 10px;
        margin: 5px 5px 0 0;
        display: inline-block;
    }

    #commentForm {
        margin-top: 50px;
    }

    #formContent {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    #author {
        border: none;
    }

    #comment {
        width: 70%;
        border: none;
        resize: none;
        border-radius: 50px;
        padding: 20px;
    }

    #comment:focus {
        outline: none;
    }

    .submit {
        margin: 20px;
        width: 10%;
        background-color: #72ddf7;
        border-style: none;
        color: white;
        border-radius:42px;
        height: 50px;
    }

    .submit:focus {
        outline: none;
    }

    .commentChunk {
        background-color: white;
        width: 100%;
        border-radius: 10px;
        padding: 5px;
        margin: 10px 0 10px 0;
    }

    .commentChunk > p:first-child {
        display: flex;
        justify-content: space-between;
    }

    .commentChunk > p:first-child .hostPhoto {
        height: 25px;
        margin: 0 5px 0 0;
    }

    .commentChunk > p:first-child > span:first-child {
        font-weight: 600;
    }
    .commentChunk > p:first-child > span:nth-child(2) {
        color: lightslategrey;
        font-size: .8em;
    }

    .commentChunk i {
        margin-left: 10px;
        color: #ff3864;
    }

    .commentChunk i:hover {
        cursor: pointer;
    }
    
    #eventPreviews {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }

    .eventPreviewItem {
        width: 180px;
        height: 120px;
        background-color: #72ddf7;
        border-radius: 10px;
        color: white;
        text-align: center;
    }

</style>

<?php $style = ob_get_contents();?>
<?php ob_start();?>

<div id="wrapper">

    <div class=eventDetail>
        <div class="eventDetailHeader">
            <div id="eventHeaderContent">
                <p><?= $event['dateCreate']; ?></p>
                <h3><?= $event['name']; ?></h3>
                <div id="headerContentExtra">
                    <p><img class="hostPhoto" src="./public/images/eventImages/hostPhoto<?=$event['hostId'];?>.jpg"></img> <span>Hosted by: <strong><?= $event['hostName']; ?></strong></span></p>
                    <button id="attendButton" class="submit">ATTEND</button>
                </div>
            </div>
        </div>

        <div class="eventDetailMainContent">
            <section class="eventDetailDescription">
                <img class="eventImage" src="./public/images/eventImages/eventImage<?= $event['picture']; ?>.jpg" />
                <?= $event['description']; ?>
                
                <form action="index.php?action=eventCommentPost" method="POST" id="commentForm">
                    <h4>Discussion:</h4>
                    <div id="formContent">
                        <img class="hostPhoto" src="./public/images/eventImages/hostPhoto<?=$event['hostId'];?>.jpg"></img>
                        <input type="hidden" name="author" id="author" value="<?= isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>">
                        <input type="hidden" name="eventId" id="eventId" value="<?=$event['eventId']; ?>">
                        <textarea name="comment" id="comment" rows="1" placeholder="Leave a comment..."></textarea>
                        <button type="submit" class="submit">POST</button>
                    </div>
                </form>
                <div id="commentArea">

                <?php foreach($comments as $comment):?>
                    <div class="commentChunk">
                        <p>
                            <span>
                                <img class="hostPhoto" src="./public/images/eventImages/hostPhoto<?=$comment['userId'];?>.jpg"></img><?=$comment['author'];?>
                            </span>
                            <span>
                                <?=$comment['dateCreation'];?>
                                <?php if ($comment['userId'] === $_SESSION['id']) { ?>
                                <i class="fas fa-edit editComment" data-commentId="<?=$comment['commentId']; ?>"></i><i class="fas fa-trash-alt deleteComment" data-commentId="<?=$comment['commentId']; ?>"></i> <?php }; ?>
                            </span>
                        </p>
                        <p><?=$comment['comment'];?></p>
                    </div>
                    <?php endforeach;?>

                </div>
            </section>
            <aside class="eventDetailSideContent">
                <div id="eventInfo">
                    <div class="eventInfoChunk">
                        <i class="far fa-clock"></i> 
                        <p><?= $event['dateCreate'];?></p>
                    </div>
                    <div class="eventInfoChunk">
                        <i class="fas fa-map-marker-alt"></i>
                        <p><?=$event['location']; ?></p>
                    </div>
                </div>
                <div id="map"><img src="./public/images/googleMapPreview.png" alt=""></div>
                <div id="guestList">
                    <h5>Guest List:</h5>
                    <div class="guestListItem">Guest</div>
                    <div class="guestListItem">Guest</div>
                    <div class="guestListItem">Guest</div>
                    <div class="guestListItem">Guest</div>
                    <div class="guestListItem">Guest</div>
                    <div class="guestListItem">Guest</div>
                    <div class="guestListItem">Guest</div>
                    <div class="guestListItem">Guest</div>
                </div>
            </aside>
        </div>
        <div id="eventPreviews">
            <div class="eventPreviewItem">Preview of other event here!</div>
            <div class="eventPreviewItem">Preview of other event here!</div>
            <div class="eventPreviewItem">Preview of other event here!</div>
            <div class="eventPreviewItem">Preview of other event here!</div>
        </div>
        <!-- <div id=box>
            <div class=insideBox>
                <div id=circle></div>
                <button>EVENTS</button>
            </div>
            <div class=insideBox>
                <article id=boxArticle>
                    <p>Toffee ∞</p>
                    <p>Breed: Color: Age: Weight:</p>
                </article>
                <div class="starRating">
                    <p>Friendliness:</p>
                </div>
                <div class="starRating">
                    <p>Activity Level:</p>
                </div>
                <hr>
                <p>"Lovely dog but needs lots of love and attention"</p>
            </div>
        </div> -->
    </div>
</div>

<script src="./public/js/Modal.js"></script>

<script>

    let commentForm = document.querySelector('#commentForm');
    commentForm.addEventListener('submit', function(e) {
        e.preventDefault();

        let commentBox = document.querySelector('#comment');
        if(commentBox.value.length >= 3) {
            let xhr = new XMLHttpRequest();
            let params = new FormData(commentForm);
            xhr.open("POST", "index.php?action=eventCommentPost");
            xhr.send(params);

            //SHOULD I ONLY REFRESH THE COMMENTS AREA AND NOT FULL PAGE? ASK MARIE!
            location.reload();
        } else {
            commentBox.style.border = '1px solid red';
        }
    })

    let deleteCommentButton = document.querySelectorAll('.deleteComment');
    for (let i=0; i<deleteCommentButton.length; i++) {
        deleteCommentButton[i].addEventListener('click', function(e) {
            let commentId = e.target.getAttribute("data-commentId");
            console.log(commentId)
            deleteComment(commentId);
        })
    }

    let editCommentButton = document.querySelectorAll('.editComment');
    for (let i=0; i<editCommentButton.length; i++) {
        editCommentButton[i].addEventListener('click', function(e) {
            let commentId = e.target.getAttribute("data-commentId");
            console.log(commentId)
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "index.php?action=loadSingleComment&commentId="+commentId);
            xhr.onload = function() {
                console.log(xhr.status)
                if(xhr.status === 200) {
                    let commentObj = {
                        Update: editComment,
                    }
                    let editView = new Modal(xhr.responseText);
                    editView.generate(commentObj, allowCancel=false);
                }
            }
            xhr.send(null)
        })
    }

    function editComment(commentId) {
        
    }

    function deleteComment (commentId){
        if (confirm('Are you sure you want to delete?')) { 
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "index.php?action=deleteEventComment");
            let params = new FormData();
            params.append("commentId",commentId);
            xhr.send(params);
            location.reload();
        }
    }



</script>

<?php
$content = ob_get_clean();
require("template.php");
?>