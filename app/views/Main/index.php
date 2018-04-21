<!--<code> --><?php //echo __FILE__;?><!-- </code>-->
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
                    $('#container').append(res);
                },
                error: function () {
                    alert('Error ajax!');
                }
            });
        });
    });
</script>
