
                	<ul>
                	<?php foreach ($list_menus as $id=>$item):?>
                	<?php 
                		$menu=Category::model()->findByPk($id);
                	?>
                    	<li><a href="<?php echo $menu->url;?>"><?php echo Language::t($menu->name,'layout')?></a></li>
                   <?php endforeach;?>
                    </ul>
