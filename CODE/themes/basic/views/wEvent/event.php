            <?php $index = 0;?>
			<?php foreach ($list_events as $event):?>
	  			<div class="event-item">
                     <div class="event-time"><span class="event-date"><?php echo date('d',$event->created_date)?></span><span class="event-month"><?php echo date('m',$event->created_date)?></span></div>
                     <a href="<?php echo $event->url?>"><?php echo $event->title?></a>
                </div>
			<?php endforeach;?>
