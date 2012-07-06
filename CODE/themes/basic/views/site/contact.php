<?php 
$this->bread_crumbs=array(
	array('url'=>Yii::app()->createUrl('site/home'),'title'=>Language::t('Trang chủ')),
	array('url'=>'','title'=>Language::t('Liên hệ')),
)
?>
			<div class="box">
			 	<div class="box-title"><label><?php echo Language::t('Liên hệ')?></label></div>
                <div class="box-content">
					<div class="main-content">
						<p><b><?php echo Language::t('Địa chỉ')?>:</b> <?php echo Language::t(Setting::s('CONTACT_ADDRESS','contact'))?></p>
						<p><b><?php echo Language::t('Điện thoại')?>:</b> <?php echo Language::t(Setting::s('CONTACT_PHONE','contact'))?></p>
						<p><b><?php echo Language::t('Fax')?>:</b> <?php echo Language::t(Setting::s('CONTACT_FAX','contact'))?></p>
						<p><b><?php echo Language::t('Email')?>:</b> <?php echo Language::t(Setting::s('CONTACT_MAIL','contact'))?></p>
					</div><!--main-content-->
                	<?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>true,'htmlOptions'=>array('class'=>'contact-form form','style'=>'display:block'))); ?>
	                    <?php
	    					foreach(Yii::app()->user->getFlashes() as $key => $message) {
	        					echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
	    					}
						?>
                        <div class="row fix-inline">
                            <h3>(*) Phần thông tin bắt buộc:</h3>
                        </div>
                        <div class="row fix-inline">
                            <?php echo $form->labelEx($model,'fullname',array('style'=>'width:80px;')); ?>
	                        <?php echo $form->textField($model,'fullname',array('style'=>'width:330px;')); ?>	
							<?php echo $form->error($model, 'fullname'); ?>
                        </div>
                        <div class="row fix-inline">
                            <?php echo $form->labelEx($model,'email',array('style'=>'width:80px;')); ?>
	                        <?php echo $form->textField($model,'email',array('style'=>'width:330px;')); ?>	
							<?php echo $form->error($model, 'email'); ?>
                        </div>
                        <div class="row fix-inline">
							<?php echo $form->labelEx($model,'phone',array('style'=>'width:80px;')); ?>
							<?php echo $form->textField($model,'phone',array('style'=>'width:330px;')); ?>	
							<?php echo $form->error($model, 'phone'); ?>
                        </div>
                        <div class="row fix-inline">
                            <?php echo $form->labelEx($model,'address',array('style'=>'width:80px;')); ?>
	                        <?php echo $form->textField($model,'address',array('style'=>'width:330px;')); ?>	
							<?php echo $form->error($model, 'address'); ?>
                        </div>
                        <div class="row fix-inline">
							<?php echo $form->labelEx($model,'content',array('style'=>'width:80px;')); ?>
		                    <?php echo $form->textArea($model,'content',array('style'=>'width:440px; min-height:150px;')); ?>	
							<?php echo $form->error($model, 'content'); ?>
                        </div>
                        <div class="row">
                            <input type="submit" value="Gửi đi" class="button" name="btn-submit" />
                        </div>
                    <?php $this->endWidget(); ?>
					<div style="border:1px solid #E1E1E1 !important;box-shadow:0 0 2px rgba(0, 0, 0, 0.1) inset;width:360px;"><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=billgates+school&amp;aq=&amp;sll=21.033333,105.85&amp;sspn=0.044302,0.084543&amp;g=h%C3%A0+n%E1%BB%99i&amp;ie=UTF8&amp;ll=20.971766,105.827745&amp;spn=0.044319,0.084543&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=14694396637268820724&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=billgates+school&amp;aq=&amp;sll=21.033333,105.85&amp;sspn=0.044302,0.084543&amp;g=h%C3%A0+n%E1%BB%99i&amp;ie=UTF8&amp;ll=20.971766,105.827745&amp;spn=0.044319,0.084543&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=14694396637268820724" style="color:#0000FF;text-align:left">View Larger Map</a></small><br /><small></small></div><br />
                </div><!--box-content-->
            </div><!--box-->