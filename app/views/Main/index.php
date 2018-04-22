<!--<code> --><?php //echo __FILE__;?><!-- </code>-->
<hr>
<?php new \vendor\widgets\Menu\Menu([
//        'tpl' => WWW . '/menu/my_menu.php',
        'tpl' => WWW . '/menu/select.php',
        'container' => 'select',
        'class' => 'my_menu',
        'table' => 'categories',
        'cache' => 3600,
        'cache_key' => 'menu_select'
]);?>
<hr>

<?php new \vendor\widgets\Menu\Menu([
        'tpl' => WWW . '/menu/my_menu.php',
        'container' => 'ul',
        'class' => 'my_menu',
        'table' => 'categories',
        'cache' => 3600,
        'cache_key' => 'menu_ul'
]);?>
<hr>

<div class="container" id="container">
    <button type="button" class="btn btn-default" id="send">BUTTON</button>
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

<script>
    $(function () {
        $('#send').on('click', function () {
            $.ajax({
                type: 'POST',
                url: '/main/test',
                data: {'id' : 2},
                success: function (res) {
                    // var data = JSON.parse(res);
                    console.log(res);
                    $('#container').append(res);
                },
                error: function () {
                    alert('Error ajax!');
                }
            });
        });
    });
</script>
