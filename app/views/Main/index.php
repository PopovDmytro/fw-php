<!--<code> --><?php //echo __FILE__;?><!-- </code>-->
<div class="container">
    <div class="row">
    <?php if(!empty($posts)):?>
        <?php foreach ($posts as $post):?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post['name'];?></h5>
                    <p class="card-text"><?php echo $post['content'];?></p>
                </div>
            </div>
        <?php  endforeach; ?>
    <?php endif;?>
    </div>
</div>
