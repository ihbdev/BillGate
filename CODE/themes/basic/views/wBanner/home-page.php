
                    	<ul id="mycarousel" class="jcarousel-skin-tango">
                    	<?php $index = 0;?>
						<?php foreach ($list_images as $id):?>
				  			<?php
				  			$index++;
				  			$image = Image::model ()->findByPk ( $id );
				  			?>
							<li>
								<a class="item-slider" href="<?php echo $image->url?>">
									<div class="img-thumb"><img src="<?php echo $image->getThumb('Banner','homepage')?>" alt="news<?php echo $index?>" /></div>
									<div class="item-content"><?php echo $image->title?></div>
								</a><!--item-slider-->
							</li>
						<?php endforeach;?>
                        </ul>