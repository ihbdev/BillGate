 <div class="box">
                    <div class="box-title"><a href="#">Hỏi đáp</a></div>
                    <div class="box-content">
                    	<?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>true,'htmlOptions'=>array('class'=>"contact-form form"))); ?>	
                            	<?php
    							foreach(Yii::app()->user->getFlashes() as $key => $message) {
        							echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    								}
								?>
                            <div class="row fix-inline">
                                <h3>(*) Phần thông tin bắt buộc:</h3>
                            </div>
                            <div class="row fix-inline">
                                <?php echo $form->labelEx($model,'fullname'); ?>
								<?php echo $form->textField($model,'fullname',array('style'=>'width:288px;','maxlength'=>'256')); ?>	
								<?php echo $form->error($model, 'fullname'); ?>
                            </div>
                            <div class="row fix-inline">
                                <?php echo $form->labelEx($model,'email'); ?>
								<?php echo $form->textField($model,'email',array('style'=>'width:288px;','maxlength'=>'256')); ?>	
								<?php echo $form->error($model, 'email'); ?>
                            </div>
                            <div class="row fix-inline">
                                <?php echo $form->labelEx($model,'title'); ?>
								<?php echo $form->textField($model,'title',array('style'=>'width:288px;','maxlength'=>'256')); ?>	
								<?php echo $form->error($model, 'title'); ?>
                            </div>
                            <div class="row fix-inline">
                                <?php echo $form->labelEx($model,'question'); ?>
								<?php echo $form->textArea($model,'question',array('style'=>'width:470px;','rows'=>20)); ?>	
								<?php echo $form->error($model, 'question'); ?>
                            </div>                           
                            <div class="row">
                                <input type="submit" value="Gửi đi" class="button" name="btn-submit" />
                            </div>
                        <?php $this->endWidget(); ?>
                    </div><!--box-content-->
                </div><!--box-->