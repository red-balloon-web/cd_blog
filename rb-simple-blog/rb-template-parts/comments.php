<h2 class="rb-simple-blog__leave-comment">Leave a Comment</h2>

<div class="rb-simple-blog__comments-template">
    <?php
    if (comments_open()){
        comments_template();
    } ?>
</div>