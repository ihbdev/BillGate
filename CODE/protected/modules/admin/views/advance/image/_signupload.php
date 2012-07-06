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
               if($(\"#store_data_upload".$attribute."\").val() != ''){
               		jQuery.ajax({
  						'data':{id : $(\"#store_data_upload".$attribute."\").val()},
  						'dataType':'json',
  						'success':function(data){
  							if(data.status == false){
								jAlert('Lỗi hệ thống');
							}
        				},
        				'type':'GET',
        				'url':'".$this->createUrl('image/delete')."',
        				'cache':false});
        		}
        		if (typeof responseJSON.id != 'undefined')  
        		{
        			$('#store_data_upload".$attribute."').val(responseJSON.id);
        			test_hide_upload_list_".$attribute."--;
               		if(test_hide_upload_list_".$attribute." == 0)
               			$('#form_upload_".$attribute." .qq-upload-list').hide();
               		$('#preview_upload_".$attribute."').html('<div class=\"item-image\" id=\"'+responseJSON.id+'\"><img style=\"height:".$h."px; width:".$w."px\" src=\"'+responseJSON.url+'\" /></div>');
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
    <div class="item-folder" id="<?php echo 'preview_upload_'.$attribute;?>">
    <?php 
    foreach (array_diff(explode(',',$model->$attribute),array('')) as $image_id){
    	$image=Image::model()->findByPk($image_id);
    	if(isset($image))
    		echo '<div class="item-image" id="'.$image_id.'"><img style="height:'.$h.'px; width:'.$w.'px" src="'.$image->getThumb($category,$type_image).'" /></div>';
    }
    ?>