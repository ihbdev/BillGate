	<!--begin inside content-->
	<div class="folder top">
		<!--begin title-->
		<div class="folder-header">
			<h1>quản trị sự kiện</h1>
			<div class="header-menu">
				<ul>
					<li class="ex-show"><a class="activities-icon" href=""><span>Danh sách sự kiện</span></a></li>
				</ul>
			</div>
		</div>
		<!--end title-->
		<div class="folder-content">
            <div>
            	<input type="button" class="button" value="Thêm sự kiện" style="width:180px;" onClick="parent.location='<?php echo Yii::app()->createUrl('admin/event/create')?>'"/>
                <div class="line top bottom"></div>	
            </div>
             <!--begin box search-->
         <?php 
			Yii::app()->clientScript->registerScript('search', "
				$('#event-search').submit(function(){
				$.fn.yiiGridView.update('event-list', {
					data: $(this).serialize()});
					return false;
				});");
		?>
            <div class="box-search">            
                <h2>Tìm kiếm</h2>
                <?php $form=$this->beginWidget('CActiveForm', array('method'=>'get','id'=>'event-search')); ?>
                <!--begin left content-->
                <div class="fl" style="width:480px;">
                    <ul>
                        <li>
                         	<?php echo $form->labelEx($model,'title'); ?>
                         	<?php $this->widget('CAutoComplete', array(
                         	'model'=>$model,
                         	'attribute'=>'title',
							'url'=>array('event/suggestTitle'),
							'htmlOptions'=>array(
								'style'=>'width:230px;',
								),
						)); ?>								
                        </li>   
                         <?php 
							$list=array(''=>'Không lọc');
							$list +=News::getList_label_specials();
						?>	
						<li>
							<?php echo $form->labelEx($model,'special'); ?>
							<?php echo $form->dropDownList($model,'special',$list,array('style'=>'width:200px')); ?>
						</li>                    
                        <li>
                        <?php 
							echo CHtml::submitButton('Lọc kết quả',
    						array(
    							'class'=>'button',
    							'style'=>'margin-left:153px; width:95px;',
    							''
    						)); 						
    					?>
                        </li>
                    </ul>
                </div>
                <!--end left content-->
                <!--begin right content-->
                <div class="fl" style="width:480px;">
                    <ul>
                      <li>
							<?php echo $form->labelEx($model,'lang'); ?>
							<?php echo $form->dropDownList($model,'lang',array(''=>'Tất cả')+LanguageForm::getList_languages_exist(),array('style'=>'width:200px')); ?>
                    	</li> 
                    <?php 
					$list=array(''=>'Tất cả các thư mục');
					foreach ($list_category as $id=>$level){
						$cat=Category::model()->findByPk($id);
						$view = "";
						for($i=1;$i<$level;$i++){
							$view .="---";
						}
						$list[$id]=$view." ".$cat->name." ".$view;
					}
					?>
					<li>
						<?php echo $form->labelEx($model,'catid'); ?>
						<?php echo $form->dropDownList($model,'catid',$list,array('style'=>'width:200px')); ?>
					</li>
                    </ul>
                </div>
                <!--end right content-->
                <?php $this->endWidget(); ?>
                <div class="clear"></div>
                <div class="line top bottom"></div>
            </div>
            <!--end box search-->		
           <?php 
			$this->widget('iPhoenixGridView', array(
  				'id'=>'event-list',
  				'dataProvider'=>$model->search(),		
  				'columns'=>array(
					array(
      					'class'=>'CCheckBoxColumn',
						'selectableRows'=>2,
						'headerHtmlOptions'=>array('width'=>'2%','class'=>'table-title'),
						'checked'=>'in_array($data->id,Yii::app()->session["checked-event-list"])'
    				),			
    				array(
						'name'=>'title',
						'headerHtmlOptions'=>array('width'=>'20%','class'=>'table-title'),		
					),
					array(
						'name'=>'category',
						'value'=>'$data->label_category',
						'headerHtmlOptions'=>array('width'=>'8%','class'=>'table-title'),		
					), 
					/*		
					array(
						'name'=>'list_special',
						'value'=>'implode(", ",$data->label_specials)',
						'headerHtmlOptions'=>array('width'=>'15%','class'=>'table-title'),		
					),
					*/
					array(
						'name'=>'order_view',
						'value'=>'$data->order_view',
						'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-title'),		
					),
					array(
						'name'=>'author',
						'value'=>'$data->author->username',
						'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-title'),		
					), 						
					array(
						'name'=>'created_date',
						'value'=>'date("H:i d/m/Y",$data->created_date)',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					), 		
					array(
						'header'=>'Trạng thái',
						'class'=>'iPhoenixButtonColumn',
    					'template'=>'{reverse}',
    					'buttons'=>array
    					(
        					'reverse' => array
    						(
            					'label'=>'Đổi trạng thái sự kiện',
            					'imageUrl'=>'$data->imageStatus',
            					'url'=>'Yii::app()->createUrl("admin/event/reverseStatus", array("id"=>$data->id))',
    							'click'=>'function(){
									var th=this;									
									jQuery.ajax({
										type:"POST",
										dataType:"json",
										url:$(this).attr("href"),
										success:function(data) {
											if(data.success){
												$(th).find("img").attr("src",data.src);
												}
										},
										error: function (request, status, error) {
        										jAlert(request.responseText);
    									}
										});
								return false;}',
        					),
        				),
						'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-title'),
					),    
					array(
						'name'=>'visits',
						'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-title'),		
					),											   	   
					array(
						'header'=>'Công cụ',
						'class'=>'CButtonColumn',
    					'template'=>'{copy}{update}{delete}{view}',
						'deleteConfirmation'=>'Bạn muốn xóa sự kiện này?',
						'afterDelete'=>'function(link,success,data){ if(success) jAlert("Bạn đã xóa thành công"); }',
    					'buttons'=>array
    					(
    						'update' => array(
    							'label'=>'Chỉnh sửa sự kiện',
    						),
        					'delete' => array(
    							'label'=>'Xóa sự kiện',
    						),
    						'copy' => array
    						(
            					'label'=>'Copy sự kiện',
            					'imageUrl'=>Yii::app()->request->getBaseUrl(true).'/images/admin/copy.gif',
            					'url'=>'Yii::app()->createUrl("admin/event/copy", array("id"=>$data->id))',
        					),
        					'view'=>array(
    							'url'=>'$data->url',
    						)
        				),
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),
					),    				
 	 			),
 	 			'template'=>'{displaybox}{checkbox}{summary}{items}{pager}',
  				'summaryText'=>'Có {count} sự kiện',
 	 			'pager'=>array('class'=>'CLinkPager','header'=>'','prevPageLabel'=>'< Trước','nextPageLabel'=>'Sau >','htmlOptions'=>array('class'=>'pages fr')),
				'actions'=>array(
					'delete'=>array(
						'action'=>'delete',
						'label'=>'Xóa',
						'imageUrl' => '/images/admin/delete.png',
						'url'=>'admin/event/checkbox'
					),
					'copy'=>array(
						'action'=>'copy',
						'label'=>'Copy',
						'imageUrl' => '/images/admin/copy.gif',
						'url'=>'admin/event/checkbox'
					)
				),
 	 			)); ?>
		</div>
	</div>
	<!--end inside content-->