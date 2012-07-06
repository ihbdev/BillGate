
	<li>
		<div class="gallery-thumb">
			<a class="video-item" href="http://www.youtube.com/embed/<?php echo $data->parseUrl()?>">
        		<?php echo $data->getThumb_url('thumb_video_big','img')?>
        	</a>
		</div>
		<div class="gallery-title"><?php echo $data->title?></div>
	</li>
