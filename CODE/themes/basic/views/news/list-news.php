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
		<div class="box-title"><label>Tin mới</label></div>
		<div class="box-content">
				<?php $this->widget('wBanner',array('code'=>Banner::CODE_HOMEPAGE,'view'=>'home-page'))?>
				<div class="news-list">
					<?php $this->widget('iPhoenixListView', 
						array(
	            			'id'=>'list-product',
							'dataProvider'=>$list_news,
							'itemView'=>'_news',
							'template'=>$template,
	            			'itemsCssClass'=>'news-list',
	                   		'pagerCssClass'=>'pages-inner',
	                   		'pager'=>array(
	                   			'class'=>'iPhoenixLinkPager',
	   							'prevPageLabel'=>'Đầu',
	   							'nextPageLabel'=>'Cuối',        
	                   			'maxButtonCount'=>3
	                   		),
					)); ?>
				</div>
		</div><!--box-content-->
	</div><!--box-->