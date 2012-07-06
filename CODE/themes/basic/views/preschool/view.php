 <div class="box">
                	<div class="box-title"><label>Tin chi tiết</label></div>
                    <div class="box-content">
                        <div class="news-detail">
                        	<div class="news-title"><?php echo $preschool->title?></div>
                            <?php 
            					$list_similar=$preschool->list_similar;
            				?>
            				<?php if(sizeof($list_similar) > 0):?>
                            <div class="other-list">
                                <ul>    
                                	<?php foreach ($list_similar as $news):?>                            	
                                    <li><a href="<?php echo $news->url;?>"><?php echo $news->title;?></a></li>
                                	<?php endforeach;?>
                                </ul>
                            </div><!--other-list-->
                            <?php endif;?>
                        	<div class="news-maindetail">
                        		 <?php echo $news->fulltext?>
                        	</div><!--news-maindetail-->
                        </div><!--news-detail-->
                    </div>
                </div><!--box-->
                <div class="box">
                	<div class="box-title"><label>Tin mới</label></div>
                    <div class="box-content">
                    	<div class="other-list">
                            <ul>
                            <?php foreach ($list_news as $news):?>
                                <li><a href="<?php echo $news->url?>"><?php echo $news->title?></a></li>
                           <?php endforeach;?> 
                           </ul>
                        </div><!--other-list-->
                    </div>
                </div><!--box-->