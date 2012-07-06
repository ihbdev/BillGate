<?php 
$template='	{items}
			<div class="pages" style="clear:both">
				<div class="pages-inner">
					{pager}
				</div><!--pages-inner-->
			</div><!--pages-->';
?>
 				<div class="box">
                    <div class="box-title"><label><?php echo Language::t('Hỏi đáp')?></label></div>
                    <div class="box-content">
                     	<br />
                    	<div id="faq-showmessage" class="sf-desc">
                        	<p><?php echo Language::t('Nếu bạn có bầt kỳ câu hỏi nào , xin hãy tham khảo những câu hỏi đã trả lời được đăng tải trong chuyên mục này (câu hỏi được sắp xếp theo thời gian, thứ tự từ mới đến cũ). Nếu chưa tìm được câu trả lời thoả đáng, hãy gửi câu hỏi cho chúng tôi. Chúng tôi sẻ giải đáp câu hỏi của các bạn trong thời gian sớm nhất')?>.</p>
                            <a href="<?php echo $this->createUrl('createQuestion');?>" class="btn-question"><?php echo Language::t('Đặt câu hỏi')?></a>
                        </div><!--faq-showmessage-->
                    	<div class="faq-list">
                           <?php $this->widget('iPhoenixListView', array(
							'dataProvider'=>$list_qa,
							'itemView'=>'_qa',
							'template'=>$template,
                           	'itemsCssClass'=>'news-list',
			            	'pagerCssClass'=>'pages-inner',
			                'pager'=>array(
		                   			'class'=>'iPhoenixLinkPager',
		   							'prevPageLabel'=>'Trước',
		   							'nextPageLabel'=>'Sau',        
		                   			'maxButtonCount'=> 5
		                   		),
						)); ?>   
                       </div><!--faq-list-->
                    </div><!--box-content-->
                </div><!--box-->