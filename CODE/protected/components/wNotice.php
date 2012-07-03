<?php 
Yii::import('zii.widgets.CPortlet');
class wNotice extends CPortlet
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
		$criteria->compare('status', Notice::STATUS_ACTIVE);
		$criteria->addInCondition('special',Notice::getCode_special($this->special));
		$criteria->order='id desc';
		$criteria->limit=$this->limit;
		$list_news=Notice::model()->findAll($criteria);
		$this->render($this->view,array(
			'list_news'=>$list_news,
		));
	}
}
?>

