            <div class="slider-wrapper theme-default">   
            <div id="slider" class="nivoSlider">	                                
			<?php
				$index = 1;
			?>
			<?php foreach ($list_images as $id):?>
	  			<?php
	  			$index++;
	  			$image = Image::model()->findByPk ( $id );
	  			?>
<<<<<<< HEAD
	  			 <img src="<?php echo $image->getThumb('Banner','school_headline')?>" title="<?php if(isset($image->title)) echo $image->tilte?>" alt="<?php if(isset($image->title)) echo $image->tilte?>" />
=======
	  			 <img src="<?php echo $image->getThumb('Banner','school_headline')?>" title="<?php if(isset($image->title)) echo $image->title?>" alt="<?php if(isset($image->title)) echo $image->title?>" />
>>>>>>> backup
			<?php endforeach;?>
            </div>                    	
            </div><!--slider-wrapper-->
