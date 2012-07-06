<?php
if($this->beginCache('video',array('dependency'=>array(
			'class'=>'system.caching.dependencies.CDbCacheDependency',
			'sql'=>'SELECT MAX(id) FROM tbl_article')))){
?>
<?php 
$this->bread_crumbs=array(
	array('url'=>Yii::app()->createUrl('site/home'),'title'=>Language::t('Trang chủ')),
	array('url'=>Yii::app()->createUrl('galleryVideo/index'),'title'=>Language::t('Album')),
	array('url'=>'','title'=>isset($cat)?Language::t($cat->name):Language::t('Tất cả video')),
)
?>
<?php 
$template='	{items}
			<div class="pages" style="clear:both">
				<div class="pages-inner">
					{pager}
				</div><!--pages-inner-->
			</div><!--pages-->';
?>
				<div class="box-title"><label>BGS TV</label></div>
				<div class="box-content">
					<div class="home-gallery">
						<div class="home-gallery-show">
							<?php parse_str( parse_url( $latest_video->link, PHP_URL_QUERY ), $tmp );?>
							<iframe id="video-iframe" width="986" height="468" src="http://www.youtube.com/embed/<?php echo $tmp['v']?>" frameborder="0" allowfullscreen></iframe>
						</div>
						<ul>
			                <?php $this->widget('iPhoenixListView', array(
								'dataProvider'=>$list_video,
								'itemView'=>'_video',
								'template'=>$template,
			            		'itemsCssClass'=>'news-list',
			            		'pagerCssClass'=>'pages-inner',
			                	'pager'=>array(
		                   			'class'=>'iPhoenixLinkPager',
		   							'prevPageLabel'=>'Trước',
		   							'nextPageLabel'=>'Sau',        
		                   			'maxButtonCount'=> 5
		                   		),
							)); 
							?>
						</ul>
					</div><!--home-gallery-->
				</div>
 
<?php $this->endCache();}?>
<?php 
$cs = Yii::app()->getClientScript(); 
// Script view form update
$cs->registerScript(
  'js-video-update',
  "jQuery(function($) { $('body').on('click','.video-item',	
  		function(){
  			var url=$(this).attr('href');
  			$('#video-iframe').attr('src',url);
  			return false;
        	});
        })",
  CClientScript::POS_END
  );
 ?>