            
			<?php
				$index = 0;
				$style = array('','bgcolor-green','bgcolor-orange','bgcolor-blue');
			?>
			<?php foreach ($list_images as $id):?>
	  			<?php
	  			$index++;
	  			$image = Image::model()->findByPk ( $id );
	  			?>
	  			<?php if($index<4):?>
	  			<div class="box-picture">
                	<div class="img-thumb"><a href="<?php echo $image->url?>"><img src="<?php echo $image->getThumb('Banner','right')?>" alt="banner_right<?php echo $index?>" /></a></div>
				<div class="img-title <?php echo $style[$index]?>"><?php echo $image->title?></div>
              	</div><!--box-picture-->
	  			<?php endif;?>
			<?php endforeach;?>
