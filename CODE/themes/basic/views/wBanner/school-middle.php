                	<div class="box-title"><label><?php echo Language::t($banner->title,'layout')?></label></div>
                    <div class="box-content">
                    	<div class="box-teatcher">
                            <ul id="mycarousel" class="jcarousel-skin-tango">
                            	<?php foreach ($list_images as $id):?>
	  							<?php
	  								$image = Image::model()->findByPk ( $id );
	  							?>
	  							<li>
                                    <a class="item-slider" href="<?php echo $image->url?>">
                                        <div class="img-thumb"><img src="<?php echo $image->getThumb('Banner','school_middle')?>" alt="teacher" /></div>
                                    </a><!--item-slider-->
                                </li>
								<?php endforeach;?>                                                           
                            </ul>
                        </div><!--box-teatcher-->
                    </div>
