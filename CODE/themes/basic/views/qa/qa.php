<?php 
$this->bread_crumbs=array(
	array('url'=>Yii::app()->createUrl('site/home'),'title'=>Language::t('Trang chủ')),
	array('url'=>Yii::app()->createUrl('qA/index'),'title'=>Language::t('Danh sách câu hỏi')),
	array('url'=>'','title'=>Language::t($qa->question)),
)
?>
			<div class="box">
                <div class="box-title"><label><?php echo $cat->name?></label></div>
                <div class="box-content">
                	<div class="news-detail">
                        <div class="news-title"><?php echo $qa->question?> <span class="news-time"><?php echo date("(d/m/Y | h'm')",$qa->created_date);?></span></div>
                        <div class="news-maindetail">
                        	<h5><?php echo Language::t('Câu trả lời')?>:</h5>
                            <?php echo $qa->answer?>
                        </div><!--news-maindetail-->
                    </div><!--news-detail-->
					<div class="other-list">
						<?php $list_similar=$qa->list_similar;?>
						<ul>
							<?php
		                       	foreach ($list_similar as $similar_qa){
		                       		if(isset($similar_qa)){
		                          		echo '<li><a href="'.$similar_qa->url.'">'.$similar_qa->title.'</a><span>('.date("d/m/Y",$similar_qa->created_date).')</span></li>';
		                   			}
		                      	}
		                   	?>
						</ul>
					</div><!--other-list-->
                </div><!--box-content-->
            </div><!--box-->