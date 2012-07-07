
 	<?php $form=$this->beginWidget('CActiveForm', array('method'=>'get','enableAjaxValidation'=>false,'action'=>Yii::app()->createUrl('site/search'))); ?>	
 		<?php echo $form->textField($search,'name',array('class'=>'text','onfocus'=>'javascript:if(this.value==\''.Language::t('Từ khóa...').'\'){this.value=\'\';};','onblur'=>'javascript:if(this.value==\'\'){this.value=\''.Language::t('Từ khóa...').'\';};')); ?>	
 	   	<input name="" type="submit" class="btn-search" value="<?php echo Language::t('Tìm kiếm');?>" />
    <?php $this->endWidget(); ?>