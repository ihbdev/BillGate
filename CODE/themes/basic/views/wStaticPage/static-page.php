			<?php foreach ($list_news as $news):?>
				<div class="box-title"><label><?php echo $news->title?></label></div>
				<div class="box-content">
					<div class="main-content">
						<?php echo $news->fulltext;?>
					</div><!--main-content-->
				</div>
			<?php endforeach;?>