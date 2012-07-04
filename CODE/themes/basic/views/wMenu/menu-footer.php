  <ul>
   <?php foreach ($list_menus as $id=>$item):?>
      <?php $menu=Menu::model()->findByPk($id);?>
      		<?php if($item['level']==1):?>
            <li>
            	<a href="<?php echo $menu->url;?>"><?php echo Language::t($menu->name,'layout');?></a>
            </li>
            <?php endif?>
   <?php endforeach;?>
   </ul>