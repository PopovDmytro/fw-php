<li>|
    <a href="?id=<?php echo $id; ?>"><?php echo $category['title'];?></a> |
<?php if(isset($category['child'])):?>
    <ul>
        <?php echo $this->getMenuHtml($category['child']);?>
    </ul>
<?php endif;?>
</li>



