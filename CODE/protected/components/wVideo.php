<?php 
Yii::import('zii.widgets.CPortlet');
class wVideo extends CPortlet
{
	public $view;
	public $limit;
	public $special;
	public function init(){
		parent::init();
		
	}
	protected function renderContent()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('status', GalleryVideo::STATUS_ACTIVE);
		$criteria->addInCondition('special',GalleryVideo::getCode_special($this->special));
		$criteria->limit=$this->limit;
		$list_video=GalleryVideo::model()->findAll($criteria);
		$this->render($this->view,array(
			'list_video'=>$list_video
		));
	}
}
?>