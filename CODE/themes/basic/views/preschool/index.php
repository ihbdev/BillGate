<<<<<<< HEAD
<div class="box-title"><label>TIN BILLGATES PRESCHOOL</label></div>
                    <div class="box-content">
                    	<div class="news-top">
                            <a class="item-slider" href="#">
                                <div class="img-thumb"><img src="images/data/smallslider1.jpg" alt="news" /></div>
                                <div class="item-content">Triển lãm đồ dụng dạy học tự làm của Trường mầm non</div>
                            </a><!--item-slider-->
                            <a class="item-slider" href="#">
                                <div class="img-thumb"><img src="images/data/smallslider2.jpg" alt="news" /></div>
                                <div class="item-content">Triển lãm đồ dụng dạy học tự làm của Trường mầm non</div>
                            </a><!--item-slider-->
                            <a class="item-slider" href="#">
                                <div class="img-thumb"><img src="images/data/smallslider3.jpg" alt="news" /></div>
                                <div class="item-content">Triển lãm đồ dụng dạy học tự làm của Trường mầm non</div>
                            </a><!--item-slider-->
                        </div><!--news-top-->
                        <div class="news-list">
                        	<div class="grid">
                            	<a href="#"><img class="img" src="images/data/image1.jpg" alt="news" /></a>
                                <div class="g-content">
                                	<div class="g-row"><a href="#" class="g-title">Triển lãm đồ dụng dạy học tự làm của Trường mầm non</a></div>
                                    <div class="g-row">
                                    	"Bạn không nên quyết định hai lần cho một vấn đề. Hãy dành đủ thời gian và suy nghĩ để ra quyết định đúng đắn ngay từ lần đầu tiên mà không cần phải quay trở lại xem xét vấn đề đó vào sau này nữa".
                                    </div>
                                </div>
                            </div><!--grid-->
                            <div class="grid">
                            	<a href="#"><img class="img" src="images/data/image1.jpg" alt="news" /></a>
                                <div class="g-content">
                                	<div class="g-row"><a href="#" class="g-title">Triển lãm đồ dụng dạy học tự làm của Trường mầm non</a></div>
                                    <div class="g-row">
                                    	"Bạn không nên quyết định hai lần cho một vấn đề. Hãy dành đủ thời gian và suy nghĩ để ra quyết định đúng đắn ngay từ lần đầu tiên mà không cần phải quay trở lại xem xét vấn đề đó vào sau này nữa".
                                    </div>
                                </div>
                            </div><!--grid-->
                            <div class="grid">
                            	<a href="#"><img class="img" src="images/data/image1.jpg" alt="news" /></a>
                                <div class="g-content">
                                	<div class="g-row"><a href="#" class="g-title">Triển lãm đồ dụng dạy học tự làm của Trường mầm non</a></div>
                                    <div class="g-row">
                                    	"Bạn không nên quyết định hai lần cho một vấn đề. Hãy dành đủ thời gian và suy nghĩ để ra quyết định đúng đắn ngay từ lần đầu tiên mà không cần phải quay trở lại xem xét vấn đề đó vào sau này nữa".
                                    </div>
                                </div>
                            </div><!--grid-->
                        </div><!--news-list-->
                        <div class="other-list">
                            <ul>
                                <li><a href="#">Thực đơn Tuần từ ngày 09/04 - 15/04/2012</a></li>
                                <li><a href="#">Thực đơn Tuần từ ngày 09/04 - 15/04/2012</a></li>
                                <li><a href="#">Thực đơn Tuần từ ngày 09/04 - 15/04/2012</a></li>
                            </ul>
                        </div><!--other-list-->
                    </div>
=======
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
>>>>>>> backup
