		<div class="news-list">
			<?php $index = 0;?>
			<?php foreach ($list_news as $news):?>
				<?php if($index<3):?>
				<?php $index++?>
				<div class="grid">
					<a href="<?php echo $news->url?>"><?php echo $news->getThumb_url('thumb_homepage','news')?></a>
					<div class="g-content">
						<div class="g-row"><a href="<?php echo $news->url?>" class="g-title"><?php echo $news->title?></a></div>
						<div class="g-row"><?php echo iPhoenixString::createIntrotext($news->introtext,40);?></div>
					</div>
				</div><!--grid-->
				<?php endif?>
			<?php endforeach;?>
		</div><!--news-list-->

		<div class="other-list">
			<ul>
			<?php $index = 0;?>
			<?php foreach ($list_news as $news):?>
				<?php $index++?>
				<?php if($index>3):?>
					<li><a href="<?php echo $news->url?>"><?php echo $news->title?></a></li>
				<?php endif?>
			<?php endforeach;?>
			</ul>
		</div><!--other-list-->