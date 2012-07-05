<?php 
$this->bread_crumbs=array(
	array('url'=>Yii::app()->createUrl('site/home'),'title'=>Language::t('Trang chủ')),
	array('url'=>Yii::app()->createUrl('news'),'title'=>Language::t('Tin tức')),
)
?>
<?php 
$template='<div class="box">
                <div class="box-title">
                    <div class="page-button">
                    	<span>{summary}</span>
                       	{pager}
                    </div>
                </div>
                <div class="box-content">
                {items}
                </div><!--box-content-->
			</div><!--box-->';
?>
	<div class="box">
		<div class="box-title">
		<div class="box-content">
			<div class="box">
				<?php $this->widget('wBanner',array('code'=>Banner::CODE_HOMEPAGE,'view'=>'home-page'))?>
                <div class="box-content">
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
		   							'prevPageLabel'=>'',
		   							'nextPageLabel'=>'',        
		                   			'maxButtonCount'=>0
		                   		),
		                   		'summaryText'=>'Trang {page}/{pages}'
							)); ?>
					</div>
				</div><!--box-content-->
			</div><!--box-->
		</div>
	</div><!--box-->