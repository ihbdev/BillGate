<?php
if($this->beginCache('video',array('dependency'=>array(
			'class'=>'system.caching.dependencies.CDbCacheDependency',
			'sql'=>'SELECT MAX(id) FROM tbl_article')))){
?>

        			<label class="video-top-title">Videos</label>
                	<?php if(sizeof($list_video) > 0):?>
                	<?php 
                		$video=$list_video[0];
						parse_str( parse_url( $video->link, PHP_URL_QUERY ), $tmp );
                	?>
                	<div class="video-top-show"><iframe id="video-iframe" width="296" height="180" src="http://www.youtube.com/embed/<?php echo $tmp['v']?>" frameborder="0" allowfullscreen></iframe></div>
                    <?php endif;?>
                    <div class="video-top-ul">
                    	<ul>
                    		<?php for($i=1;$i<sizeof($list_video);$i++):?>
                    		<?php
                    			$video=$list_video[$i];
								parse_str( parse_url( $video->link, PHP_URL_QUERY ), $tmp );
                    		?>
                        	<li>
                        		<a class="video-item" href="http://www.youtube.com/embed/<?php echo $tmp['v']?>">
                        			<?php echo $video->getThumb_url('thumb_video','img')?>
                        		</a>
                        	</li>
                        	<?php endfor;?>
                        </ul>
					</div>
 					<div class="video-top-button"><a href="#">Xem thêm</a></div>         
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