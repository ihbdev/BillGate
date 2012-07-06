<?php
	echo CHtml::activeHiddenField($model,$attribute,array('id'=>'store_data_upload'.$attribute)); 
    $category=get_class($model);
    $config_thumb_size=Image::getConfig_thumb_size();
    $h=$config_thumb_size[$category][$type_image]['h'];
    $w=$config_thumb_size[$category][$type_image]['w'];
	$this->widget('ext.EAjaxUpload.EAjaxUpload',
	array(
        'id'=>'form_upload_'.$attribute,
        'config'=>array(
               'action'=>$this->createUrl('image/upload'),
               'allowedExtensions'=>array("jpg","gif","png"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
               //'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
               'onSubmit'=>"js:function(id, fileName){ test_hide_upload_list_".$attribute."++; }",
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
               	var current_list_image=$('#store_data_upload".$attribute."').val();
               	if (typeof responseJSON.id != 'undefined')  
        		{
               	if(current_list_image != ''){
               		$('#store_data_upload".$attribute."').val(current_list_image+','+responseJSON.id);
               	}
               	else {
               		$('#store_data_upload".$attribute."').val(responseJSON.id);
               	}
               	test_hide_upload_list_".$attribute."--;
               	if(test_hide_upload_list_".$attribute." == 0)
               		$('#form_upload_".$attribute." .qq-upload-list').hide();
               	$('#preview_upload_".$attribute."').append('<div class=\"item-image\" id=\"'+responseJSON.id+'\"><img style=\"height:".$h."px; width:".$w."px\" src=\"'+responseJSON.url+'\" /><a target=\"_blank\" class=\"edit\" href=\"'+responseJSON.link_update+'\" onclick=\"image_select=$(this);update_form_image();return false;\"></a><a class=\"close\"></a></div>'); 
               	}
               	}",
               'messages'=>array(
                                 'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                 'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                 'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                 'emptyError'=>"{file} is empty, please select files again without it.",
                                 'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                                ),
               'showMessage'=>"js:function(message){ jAlert(message); }",
               'template'=> '<div class="qq-uploader">
                			<div class="qq-upload-drop-area"><span>Drop files here to upload</span></div>
                			<div class="qq-upload-button">Chọn ảnh</div>
                			<ul class="qq-upload-list"></ul>
             				</div>',  
               'multiple'=>true,              
              ),
        'postParams'=>array(
              'category'=>$category,
              'parent_id'=>isset($model->id)?$model->id:0,
              'attribute'=>$attribute,
              'type_image'=>$type_image
              )
	)); 
	?>
	<script type="text/javascript">
		var test_hide_upload_list_<?php echo $attribute?>= 0;
	</script>
    <div class="slider-folder" id="<?php echo 'preview_upload_'.$attribute;?>">
    <?php 
    foreach (array_diff(explode(',',$model->$attribute),array('')) as $image_id){
    	$image=Image::model()->findByPk($image_id);
    	if(isset($image))
    		echo '<div class="item-image" id="'.$image_id.'"><img style="height:'.$h.'px; width:'.$w.'px" src="'.$image->getThumb($category,$type_image).'" /><a target="_blank" class="edit" href="'.Yii::app()->createUrl('admin/image/update',array('id'=>$image_id)).'"></a><a class="close"></a></div>';
    }
    ?>
    </div>
    <div type="hidden" value="" id="popup_value"></div>
    <?php 
    $cs = Yii::app()->getClientScript(); 
    $cs->registerScript('js_upload_'.$attribute,
    "$('.slider-folder').delegate('.close', 'click', function() {
  			$('#popup_value').val($(this).parent().attr('id'));
  			jConfirm(
  				\"Bạn muốn xóa ảnh này?\",
  				\"Xác nhận xóa ảnh\",
  				function(r){
  					if(r){
  					jQuery.ajax({
  						'data':{id : $(\"#popup_value\").val()},
  						'dataType':'json',
  						'success':function(data){
  							if(data.status == true){
								$('#'+data.id).remove();
							}
							else {
								jAlert('Không thể xóa ảnh');
							}
							var list=$('#store_data_upload".$attribute."').val();
  						 	var list_image = list.split(',');
  						 	list_image = jQuery.grep(list_image, function(value) {
								return value != data.id;
							});
							$('#store_data_upload".$attribute."').val(list_image.join(',')
							);
        				},
        				'type':'GET',
        				'url':'".$this->createUrl('image/delete')."',
        				'cache':false});
        			}
        		}
        	);
        	return false;
	});");
	?>
<!-- For Display Popup to Update Image -->
    <div id="popUpDiv" style="z-index:10000;display: none;">
    	<div class="sendMarkOutline" style="border:2px solid #21629B;border-radius:8px;">
	        <div class="sendMark">
	            <a style= "float:right;margin-top:-20px" onclick="popup('popUpDiv')"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/images/admin/close.png"></a>
			    <h1 align='center'>Cập nhật thông tin ảnh</h1>
			    <div id='form_update_image'>	
			     	 <a id="update_image" style="margin-bottom:10px; margin-left:10px;width:125px;" class="button" title="Cập nhật">Cập nhật</a>
		  			 <a style= "margin-bottom:10px; width:125px;" class="button" title="Hủy thao tác" onclick="popup('popUpDiv');return false;">Hủy thao tác</a>		    	
			    </div>
			</div>
		</div>
    </div>
<script type="text/javascript">
$("body").delegate(".edit", 'click', function(){
	  jQuery.ajax({
			'success':function(data){
				$("#form_update_image").html($(data));
				popup('popUpDiv');
				},
			'type':'GET',
			'url':$(this).attr("href"),
			'cache':false});
		  return false;
});
$("body").delegate("#update_image", 'click', function(){
	jQuery.ajax({
		'data': $("#form_image").serialize(),
		'success':function(data){
			popup('popUpDiv');
			},
		'type':'POST',
		'url':$(this).attr("href"),
		'cache':false});
	  return false;
});
</script>
