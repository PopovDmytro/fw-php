<option value="<?php echo $id;?>"><?php echo $tab;?><?php echo $category['title'];?></option>
<?php if(isset($category['child'])):?>
    <?php echo $this->getMenuHtml($category['child'], '&nbsp;' . $tab . '- ');?>
<?php endif;?>
