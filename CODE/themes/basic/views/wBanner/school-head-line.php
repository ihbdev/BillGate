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
	  			 <img src="<?php echo $image->getThumb('Banner','school_headline')?>" title="<?php if(isset($image->title)) echo $image->title?>" alt="<?php if(isset($image->title)) echo $image->title?>" />
			<?php endforeach;?>
            </div>                    	
            </div><!--slider-wrapper-->
