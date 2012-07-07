<?php 
Yii::import('zii.widgets.CPortlet');
class wQuickSearch extends CPortlet
{
	public function init(){
		parent::init();
		
	}
	protected function renderContent()
	{
		$search=new SearchForm();
		$search->name=Language::t('Từ khóa...');
		if(isset($_GET['SearchForm']))
			$search->attributes=$_GET['SearchForm'];
		$this->render('quick-search',array(
			'search'=>$search
		));
	}
}
?>
