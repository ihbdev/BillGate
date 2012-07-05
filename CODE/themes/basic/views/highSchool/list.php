<?php 
if(isset($cat)){
	$this->current_catid=$cat->id;
	$this->pageTitle = $cat->name;
	Yii::app()->clientScript->registerMetaTag($cat->metadesc, 'description');	
	Yii::app()->clientScript->registerMetaTag(Keyword::viewListKeyword($cat->keyword), 'keywords');
}
?>
<?php 
$template='<div class="box">
			<div class="box-title"><label>'.$this->pageTitle.'</label></div>
                <div class="box-content">
                {items}
				<div class="pages">
            		<div class="pages-inner">
            		{pager}
            		</div><!--pages-inner-->
            	</div><!--pages-->
                </div>
            </div>
			';   
?>       
<?php              
                  $this->widget('iPhoenixListView', 
                   	array(
            			'id'=>'list-news',
						'dataProvider'=>$list_news,
						'itemView'=>'_news',
						'template'=>$template,	
            			'itemsCssClass'=>'news-list',
                   		'pagerCssClass'=>'page-button',
                   		'pager'=>array(
                   			'class'=>'iPhoenixLinkPager',
   							'prevPageLabel'=>'Sau',
   							'nextPageLabel'=>'Trước',  
                   			'firstPageLabel'=>'Đầu',
                   			'lastPageLabel'=>'Cuối'      
                   		),
					)); ?>    