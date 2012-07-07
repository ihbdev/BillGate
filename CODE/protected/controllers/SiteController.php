<?php

class SiteController extends Controller
{
	/**
	 * This is the action to handle view home page
	 */
	public function actionIndex()
	{
		$this->layout="main";
		$this->render( 'index');
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
			$this->layout="main";
			if ($error = Yii::app ()->errorHandler->error) {
				if (Yii::app ()->request->isAjaxRequest)
					echo $error ['message'];
				else
					$this->render( 'error', $error );
			}
	}
	/**
	 * This is the action to handle view home page
	 */
	public function actionContact()
	{
		Yii::app()->clientScript->scriptMap['jquery.js'] = false;
		Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
		$model=new Contact('create');
		if(isset($_POST['Contact'])){
			$model->attributes=$_POST['Contact'];
			if($model->save())
				Yii::app()->user->setFlash('success', Language::t('Liên hệ đã được gửi thành công'));
		}
		$this->render( 'contact' ,array('model'=>$model));
	}		
	/**
	 * This is the action to handle view home page
	 */
	public function actionHome()
	{
		$this->render('home');
	}	
	/**
	 * This is the action to handle view search page
	 */
	public function actionSearch()
	{
		Yii::app()->clientScript->scriptMap['jquery.js'] = false;
		Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
		$search=new SearchForm();
		$criteria = new CDbCriteria ();
		if(isset($_GET['SearchForm'])){
			$search->attributes=$_GET['SearchForm'];
			$criteria->compare ( 'title', $search->name, true );
		}
		$criteria->order = "id DESC";
		$result=new CActiveDataProvider ( 'News', array ('criteria' => $criteria, 'pagination' => array ('pageSize' => Setting::s('SEARCH_PAGE_SIZE','News' ) ) ) );
		$this->render( 'search',array('result'=>$result) );
	}	
	/**
	 * This is the action to handle view home page
	 */
	public function actionLanguage($language)
	{
		Yii::app()->session['language']=$language;
		Yii::app()->request->redirect(Yii::app()->getRequest()->getUrlReferrer());
	}	
	function actionDownload($path){
		$list_element=explode('/',$path);
		$filename=end($list_element);
  		$filecontent=file_get_contents(Yii::getPathOfAlias('webroot').'/'.$path);
  		header("Content-Type: text/plain");
  		header("Content-disposition: attachment; filename=$filename");
  		header("Pragma: no-cache");
  		echo $filecontent;
  		exit;
	}
}