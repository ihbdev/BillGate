<?php
							switch ($model->id){
								case Banner::CODE_HEADLINE:
									$type_image="thumb_headline";
									break;	
								case Banner::CODE_RIGHT:
									$type_image="thumb_right";
									break;	
								case Banner::CODE_PRESCHOOL_HEADLINE:
									$type_image="thumb_school_headline";
<<<<<<< HEAD
									break;
								case Banner::CODE_PRESCHOOL_LEFT:
									$type_image="thumb_school_left";
									break;
								case Banner::CODE_PRESCHOOL_MIDDLE:
									$type_image="thumb_school_middle";
									break;
								case Banner::CODE_PRIMARY_SCHOOL_HEADLINE:
									$type_image="thumb_school_headline";
									break;
								case Banner::CODE_PRIMARY_SCHOOL_LEFT:
									$type_image="thumb_school_left";
									break;
								case Banner::CODE_PRIMARY_SCHOOL_MIDDLE:
									$type_image="thumb_school_middle";
									break;
=======
									break;
								case Banner::CODE_PRESCHOOL_LEFT:
									$type_image="thumb_school_left";
									break;
								case Banner::CODE_PRESCHOOL_MIDDLE:
									$type_image="thumb_school_middle";
									break;
								case Banner::CODE_PRIMARY_SCHOOL_HEADLINE:
									$type_image="thumb_school_headline";
									break;
								case Banner::CODE_PRIMARY_SCHOOL_LEFT:
									$type_image="thumb_school_left";
									break;
								case Banner::CODE_PRIMARY_SCHOOL_MIDDLE:
									$type_image="thumb_school_middle";
									break;
>>>>>>> backup
								case Banner::CODE_HIGH_SCHOOL_HEADLINE:
									$type_image="thumb_school_headline";
									break;
								case Banner::CODE_HIGH_SCHOOL_LEFT:
									$type_image="thumb_school_left";
									break;
								case Banner::CODE_HIGH_SCHOOL_MIDDLE:
									$type_image="thumb_school_middle";
									break;
<<<<<<< HEAD
=======
								case Banner::CODE_HOMEPAGE:
									$type_image="thumb_homepage";
									break;
>>>>>>> backup
							}
?>
<!--begin inside content-->
	<div class="folder top">
		<!--begin title-->
		<div class="folder-header">
			<h1>quản trị banner ảnh</h1>
			<div class="header-menu">
				<ul>
					<li><a class="header-menu-active new-icon" href=""><span>Chỉnh sửa banner</span></a></li>					
				</ul>
			</div>
		</div>
		<!--end title-->
		<div class="folder-content form">
		<div>
                <input type="button" class="button" value="Danh sách banner" style="width:180px;" onClick="parent.location='<?php echo Yii::app()->createUrl('admin/banner')?>'"/>
                <div class="line top bottom"></div>	
            </div>
		<?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>true)); ?>	
			<!--begin left content-->
			<div class="fl" style="width:480px;">
				<ul>
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'title'); ?>
							<?php echo $form->textField($model,'title',array('style'=>'width:280px;','maxlength'=>'256')); ?>	
							<?php echo $form->error($model, 'title'); ?>				
						</li>
					</div>		
					<div class="row">
						<li>
							<?php echo $form->labelEx($model,'domain'); ?>
							<?php echo $form->dropDownList($model,'domain',$model->list_domain,array('style'=>'width:200px')); ?>
							<?php echo $form->error($model, 'domain'); ?>				
						</li>
					</div>					
           			<div class="row">
					<li>
						<?php echo $form->labelEx($model,'description'); ?>
						<?php echo $form->textArea($model,'description',array('style'=>'width:280px;','rows'=>6))?>
						<?php echo $form->error($model,'description'); ?>
					</li>	
					</div>				
                    <li>
                    	<input type="reset" class="button" value="Hủy thao tác" style="margin-left:153px; width:125px;" />
						<input type="submit" class="button" value="Cập nhật" style="margin-left:20px; width:125px;" />						
					</li>
				</ul>
			</div>
			<!--end left content-->
			<!--begin right content-->
			<div class="fl menu-tree" style="width:470px;">
			<ul>
				<div class="row">
						<li>
							<?php 
							echo $this->renderPartial('/image/_galleryupload', array('model'=>$model,'attribute'=>'images','type_image'=>$type_image)); 
							?>
							<?php echo $form->error($model, 'images'); ?>				
						</li>
					</div>
			</ul>
			</div>
			<!--end right content-->
			<?php $this->endWidget(); ?>
			<div class="clear"></div>          
		</div>
	</div>
	<!--end inside content-->