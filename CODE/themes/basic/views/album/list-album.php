<?php
if($this->beginCache('video',array('dependency'=>array(
			'class'=>'system.caching.dependencies.CDbCacheDependency',
			'sql'=>'SELECT MAX(id) FROM tbl_article')))){
?>
<?php 
$this->bread_crumbs=array(
	array('url'=>Yii::app()->createUrl('site/home'),'title'=>Language::t('Trang chủ')),
	array('url'=>Yii::app()->createUrl('album/index'),'title'=>Language::t('Album')),
	array('url'=>'','title'=>isset($cat)?Language::t($cat->name):Language::t('Tất cả album')),
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
				<div class="box-title"><label>BGS Gallery</label></div>
				<div class="box-content">
					<div class="home-gallery">
						<div class="home-gallery-show">
                           <ul id="mycarousel" class="jcarousel-skin-tango">
		                          <?php               
										$list_image_id=array_diff ( explode ( ',', $latest_album->images ), array ('' ));
										foreach ( $list_image_id as $image_id ) {
											$image = Image::model ()->findByPk ( $image_id );
											echo 
												'<li><table class="gallery-slider">
													<tr><td><img src="'.$image->getThumb('Album','thumb_list_page_big').'" alt="'.$image->title.'" /></td></tr>
												</table></li>
												';
											}
		                           ?>
							</ul>
						</div><!--home-gallery-show-->
						<ul>
			                <?php $this->widget('iPhoenixListView', array(
								'dataProvider'=>$list_album,
								'itemView'=>'_album',
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
  'js-album-update',
  "jQuery(function($) { $('body').on('click','.album-item',	
  		function(){
  				jQuery.ajax({
  					'data':{id : this.id},
  					'success':function(data){
						$(\".home-gallery-show\").html($(data));
						$.getScript('".Yii::app()->theme->baseUrl."/js/jquery.jcarousel.min.js');
						$.getScript('".Yii::app()->theme->baseUrl."/js/gallery.js');
        			},
        			'type':'GET',
        			'url':'".$this->createUrl('album/load')."',
        			'cache':true,
        		});
        		return false;
        	});
        })",
  CClientScript::POS_END
  );
 ?>