<?php 
$this->bread_crumbs=array(
	array('url'=>Yii::app()->createUrl('site/home'),'title'=>Language::t('Trang chủ')),
	array('url'=>Yii::app()->createUrl('news'),'title'=>Language::t('Tin tức')),
)
?>
<?php
$template='	{items}
			<div class="pages">
				<div class="pages-inner">
					{pager}
				</div><!--pages-inner-->
			</div><!--pages-->';
?>
	<div class="box">
		<div class="box-title"><label><?php echo Language::t('Kết quả tìm kiếm')?></label></div>
		<div class="box-content">
				<div class="news-list">
					<?php $this->widget('iPhoenixListView', 
						array(
	            			'id'=>'list-search',
							'dataProvider'=>$result,
							'itemView'=>'_search',
							'template'=>$template,
	            			'itemsCssClass'=>'search-list',
	                   		'pagerCssClass'=>'pages-inner',
	                   		'pager'=>array(
	                   			'class'=>'iPhoenixLinkPager',
	   							'prevPageLabel'=>'Trước',
	   							'nextPageLabel'=>'Sau',        
	                   			'maxButtonCount'=> 5
	                   		),
					)); ?>
				</div>
		</div><!--box-content-->
	</div><!--box-->