<?php 
$this->bread_crumbs=array(
	array('url'=>Yii::app()->createUrl('site/home'),'title'=>Language::t('Trang chủ')),
	array('url'=>Yii::app()->createUrl('news/index',array('cat_alias'=>$cat->alias)),'title'=>Language::t($cat->name)),
	array('url'=>'','title'=>Language::t($news->title)),
)
?>
			<div class="box">
                <div class="box-title"><label><?php echo $cat->name?></label></div>
                <div class="box-content">
                	<div class="news-detail">
                        <div class="news-title"><?php echo $news->title?> <span class="news-time"><?php echo date("(d/m/Y | h'm')",$news->created_date);?></span></div>
							<div class="other-list">
								<?php $list_similar=$news->list_similar;?>
								<ul>
		                        <?php
		                        	foreach ($list_similar as $similar_news){
		                        		if(isset($similar_news)){
		                            		echo '<li><a href="'.$similar_news->url.'">'.$similar_news->title.'</a><span>('.date("d/m/Y",$similar_news->created_date).')</span></li>';
		                       			}
		                        	}
		                       	?>
								</ul>
							</div><!--other-list-->
                        <div class="news-maindetail">
                            <?php echo $news->fulltext?>
                        </div><!--news-maindetail-->
                    </div><!--news-detail-->
                    <br />
                </div><!--box-content-->
            </div><!--box-->