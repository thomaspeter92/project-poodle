
<?php foreach($comments as $comment):?>
    <div class="commentChunk">
        <p>
            <span>
            <?php    if (isset($_SESSION['id'])) { ?>
                <img class="hostPhoto" src="./private/profile/<?=!empty($comment['image']) ? $comment['image'] : 'defaultProfile.png' ;?>"></img><?=$comment['author'];?>
            <?php  } else {
                echo 'Private Member:';
            } ?>
            </span>
            <span>
                <?=$comment['dateCreation'];?>
                <?php if (isset($_SESSION['id']) && $comment['userId'] === $_SESSION['id']) { ?>
                    <i class="fas fa-edit editComment" data-commentId="<?=$comment['commentId']; ?>"></i><i class="fas fa-trash-alt deleteComment" data-commentId="<?=$comment['commentId']; ?>"></i> 
                <?php }; ?>
            </span>
        </p>
        <p><?=$comment['comment'];?></p>
    </div>

<?php endforeach;?>

<!-- For blurred effect read more, apply the blurry css class in the CSS to the last child of commentChunk class.  -->