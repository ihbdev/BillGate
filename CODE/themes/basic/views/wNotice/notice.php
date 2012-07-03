            <?php $index = 0;?>
			<?php foreach ($list_news as $news):?>
	  			<a href="<?php echo $news->url?>"><?php echo $news->title?></a>
			<?php endforeach;?>