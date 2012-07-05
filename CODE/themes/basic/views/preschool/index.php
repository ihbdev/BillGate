<div class="box">
<?php $this->widget('wBanner',array('code'=>Banner::CODE_PRESCHOOL_MIDDLE,'view'=>'school-middle'))?>
</div><!--box-->
<div class="box">
<div class="box-title"><label>TIN BILLGATES PRESCHOOL</label></div>
                    <div class="box-content">
                    	<div class="news-top">
                    		<?php foreach($list_remark_news as $news):?>                  		
                            <a class="item-slider" href="<?php echo $news->url;?>">                            	
                                <div class="img-thumb"><?php echo $news->getThumb_url('remark','')?></div>
                                <div class="item-content"><?php echo iPhoenixString::createIntrotext($news->title,Setting::s('INTRO_TITLE','School'));?></div>
                            </a><!--item-slider-->
                           	<?php endforeach;?>
                        </div><!--news-top-->
                        <div class="news-list">
                        	<?php for($i=0;$i<3;$i++):?>
                        	<?php if(isset($list_news[$i])):?>
                        	<?php $news=$list_news[$i];?>
                        	<div class="grid">
                            	<a href="<?php echo $news->url;?>"><?php echo $news->getThumb_url('introimage','img')?></a>
                                <div class="g-content">
                                	<div class="g-row"><a href="<?php echo $news->url;?>" class="g-title"><?php echo $news->title;?></a></div>
                                    <div class="g-row">
                                    	<?php echo iPhoenixString::createIntrotext($news->introtext,Setting::s('INTRO_CONTENT','School'));?>
                                    </div>
                                </div>
                            </div><!--grid-->
                            <?php endif;?>
                            <?php endfor;?>                           
                        </div><!--news-list-->
                        <div class="other-list">
                            <ul>
                            <?php for($i=3;$i<6;$i++):?>
                        	<?php if(isset($list_news[$i])):?>
                        	<?php $news=$list_news[$i];?>
                                <li><a href="<?php echo $news->url?>"><?php echo $news->title?></a></li>
      						<?php endif;?>
                            <?php endfor;?> 
                            </ul>
                        </div><!--other-list-->
                    </div>
</div>