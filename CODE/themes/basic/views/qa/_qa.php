
<div class="grid">
<div class="g-row"><a class="g-title"><?php echo $data->title?></a>
<span>(<?php echo date('d/m/Y',$data->created_date)?>)</span></div>
<div class="g-row">
<h6><?php echo Language::t('Người hỏi')?>:&nbsp;<span><?php echo $data->fullname?> - <?php echo $data->email?></span></h6>
</div>
<div class="g-row"><?php echo $data->question?></div>
<div class="g-right"><a class="view-more" href="<?php echo $data->url?>"><i>&gt;&gt;<?php echo Language::t('Xem trả lời')?></i></a></div>
</div>
<!--grid-->