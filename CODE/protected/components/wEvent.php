<?php 
Yii::import('zii.widgets.CPortlet');
class wEvent extends CPortlet
{
	public $view;
	public $special;
	public $limit;
	public function init(){
		parent::init();
		
	}
	protected function renderContent()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('status', Event::STATUS_ACTIVE);
		$criteria->addInCondition('special',Notice::getCode_special($this->special));
		$criteria->order='id desc';
		$criteria->limit=$this->limit;
		$list_events=Event::model()->findAll($criteria);
		$this->render($this->view,array(
			'list_events'=>$list_events,
		));
	}
}
?>