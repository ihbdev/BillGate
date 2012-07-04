<?php 
Yii::import('zii.widgets.CPortlet');
class wStaticPage extends CPortlet
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
		$criteria->compare('status', StaticPage::STATUS_ACTIVE);
		$criteria->addInCondition('special',StaticPage::getCode_special($this->special));
		$criteria->order='id desc';
		$criteria->limit=$this->limit;
		$list_news=StaticPage::model()->findAll($criteria);
		$this->render($this->view,array(
			'list_news'=>$list_news,
		));
	}
}
?>

