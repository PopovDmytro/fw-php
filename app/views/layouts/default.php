<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="/css/default.css" >

    <title>Default | <?php echo $meta['title'];?></title>
    <meta name="description" content="<?php echo $meta['content'];?>">
    <meta name="keywords" content="<?php echo $meta['keywords'];?>">

</head>
<body>

<?php if(!empty($menu)):?>
<hr>
    <ul class="nav">
        <?php foreach ($menu as $item):?>
            <li class="nav-item"><a class="nav-link" href="category/<?php echo $item['id']?>"><?php echo $item['title']?></a></li>
        <?php endforeach;?>
    </ul>
<hr>
<?php endif;?>

<div class="container">
    <h1>Hello, DEFAULT!</h1>
    <?php echo $content;?>
    <?php //echo debug(vendor\core\Db::$countSql);?>
    <?php //echo debug(vendor\core\Db::$queries);?>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="/bootstrap/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>