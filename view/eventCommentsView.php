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



<!-- For blurred effect read more, apply the blurry css class in the CSS to the last child of commentChunk class.  -->
