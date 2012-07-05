			<?php foreach ($list_images as $id):?>
	  			<?php
	  			$image = Image::model()->findByPk ( $id );
	  			?>
	  			<a href="<?php echo $image->url?>"><img src="<?php echo $image->getThumb('Banner','school_left')?>" width="243" alt="Quang cao" /></a>
			<?php endforeach;?>