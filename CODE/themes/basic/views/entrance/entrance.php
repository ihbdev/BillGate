<?php 
$this->bread_crumbs=array(
	array('url'=>Yii::app()->createUrl('site/home'),'title'=>Language::t('Trang chủ')),
	array('url'=>Yii::app()->createUrl('entrance/index',array('cat_alias'=>$cat->alias)),'title'=>Language::t($cat->name)),
	array('url'=>'','title'=>Language::t($entrance->title)),
)
?>
			<div class="box">
                <div class="box-title"><label><?php echo $cat->name?></label></div>
                <div class="box-content">
                	<div class="news-detail">
                        <div class="news-title"><?php echo $entrance->title?> <span class="news-time"><?php echo date("(d/m/Y | h'm')",$entrance->created_date);?></span></div>
							<div class="other-list">
								<?php $list_similar=$entrance->list_similar;?>
								<ul>
		                        <?php
		                        	foreach ($list_similar as $similar_entrance){
		                        		if(isset($similar_entrance)){
		                            		echo '<li><a href="'.$similar_entrance->url.'">'.$similar_entrance->title.'</a><span>('.date("d/m/Y",$similar_entrance->created_date).')</span></li>';
		                       			}
		                        	}
		                       	?>
								</ul>
							</div><!--other-list-->
                        <div class="news-maindetail">
                            <?php echo $entrance->fulltext?>
                        </div><!--news-maindetail-->
                    </div><!--news-detail-->
                    <br />
                </div><!--box-content-->
            </div><!--box-->