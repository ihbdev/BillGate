<?php
/**
 * 
 * NoticeController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */

/**
 * NoticeController includes actions relevant to Notice model:
 *** create Notice
 *** copy Notice
 *** update
 *** delete Notice
 *** index Notice
 *** reverse status Notice
 *** suggest title Notice
 *** update suggest
 *** load model  
 */
class NoticeController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('notice_index'),
			),
			array('allow',  
				'actions'=>array('create'),
				'roles'=>array('notice_create'),
			),
			array('allow',  
				'actions'=>array('suggestTitle'),
				'roles'=>array('notice_suggestTitle'),
			),
			array('allow', 
				'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('notice_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('notice_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('notice_checkbox'),
			),
			array('allow',  
				'actions'=>array('copy'),
				'roles'=>array('notice_copy'),
			),
			array('allow',  
				'actions'=>array('dynamicCat'),
				'roles'=>array('notice_dynamicCat'),
			),
			array('allow',  
				'actions'=>array('updateSuggest'),
				'roles'=>array('notice_updateSuggest'),
			),
			array('deny', 
				'users'=>array('*'),
			),		
		);
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Notice('write');
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Notice']))
		{
			$model->attributes=$_POST['Notice'];
			if(!isset($_POST['Notice']['list_special'])) $model->list_special=array();
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}
		//Group categories that contains notice
		$group=new Category();		
		$group->type=Category::TYPE_NOTICE;
		$list_category=$group->list_nodes;
		if (! Yii::app ()->getRequest ()->getIsAjaxRequest ())
				Yii::app ()->session ['checked-suggest-list'] = array();
		//Handler list suggest notice		
		$this->initCheckbox('checked-suggest-list');
		$suggest=new Notice('search');
		$suggest->unsetAttributes();  // clear any default values
		if(isset($_GET['catid'])) $suggest->catid=$model->catid;
		if(isset($_GET['SuggestNotice']))
			$suggest->attributes=$_GET['SuggestNotice'];
		
		//Group keyword
		$group=new Category();		
		$group->type=Category::TYPE_KEYWORD;
		$list_keyword_categories=$group->list_nodes;
		$this->render('create',array(
			'model'=>$model,
			'list_category'=>$list_category,
			'suggest'=>$suggest,
			'list_keyword_categories'=>$list_keyword_categories
			
		));
	}
	/**
	 * Copy a new model
	 * @param integer $id the ID of model to be copied
	 */
	public function actionCopy($id)
	{
		$copy=Notice::copy($id);
		if(isset($copy))
		{
				$this->redirect(array('update','id'=>$copy->id));
		}
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);	
		if (Yii::app ()->user->checkAccess ( 'notice_update', array ('notice' => $model ) )) {
		$model->scenario = 'write';
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Notice']))
		{
			if(!isset($_POST['Notice']['list_special'])) $model->list_special=array();
			$model->attributes=$_POST['Notice'];
			if($model->save()){				
				$this->redirect(array('update','id'=>$model->id));
			}
		}
		//Group categories 
		$group=new Category();		
		$group->type=Category::TYPE_NOTICE;
		$list_category=$group->list_nodes;
		if (! Yii::app ()->getRequest ()->getIsAjaxRequest ())
				Yii::app ()->session ['checked-suggest-list'] = array_diff ( explode ( ',', $model->list_suggest ), array ('' ) );
		//Handler list suggest notice
		$this->initCheckbox('checked-suggest-list');
		$suggest=new Notice('search');
		$suggest->unsetAttributes();  // clear any default values
		if(isset($_GET['catid'])) $suggest->catid=$model->catid;
		if(isset($_GET['SuggestNotice']))
			$suggest->attributes=$_GET['SuggestNotice'];
			
		//Group keyword
		$group=new Category();		
		$group->type=Category::TYPE_KEYWORD;
		$list_keyword_categories=$group->list_nodes;
		$this->render('update',array(
			'model'=>$model,
			'list_category'=>$list_category,
			'suggest'=>$suggest,
			'list_keyword_categories'=>$list_keyword_categories
		));	
		}	
		else
			throw new CHttpException(400,'Bạn không có quyền chỉnh sửa bài viết này.');	
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Performs the action with multi-selected notice from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-notice-list');
		$list_checked = Yii::app()->session["checked-notice-list"];
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'notice_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Notice::model ()->findByPk ( (int)$id );
						if (isset ( $item ))
							if (! $item->delete ()) {
								echo 'false';
								Yii::app ()->end ();
							}
					}
					Yii::app ()->session ["checked-notice-list"] = array ();
				} else {
					echo 'false';
					Yii::app ()->end ();
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'notice_copy')) {
				foreach ( $list_checked as $id ) {
					$copy=Notice::copy((int)$id);
					if(!isset($copy))
					{
						echo 'false';
						Yii::app ()->end ();
					}
				}
				Yii::app ()->session ["checked-notice-list"] = array ();
				}
				else {
					echo 'false';
					Yii::app ()->end ();
				}
				break;
		}
		echo 'true';
		Yii::app()->end();
		
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->initCheckbox('checked-notice-list');
		$model=new Notice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['catid'])) $model->catid=$_GET['catid'];
		$model->lang=Language::DEFAULT_LANGUAGE;
		if(isset($_GET['Notice']))
			$model->attributes=$_GET['Notice'];	
		//Group categories that contains notice
		$group=new Category();		
		$group->type=Category::TYPE_NOTICE;
		$list_category=$group->list_nodes;
		//Group keyword
		$group=new Category();		
		$group->type=Category::TYPE_KEYWORD;
		$list_keyword_categories=$group->list_nodes;
		
		$this->render('index',array(
			'model'=>$model,
			'list_category'=>$list_category,
			'list_keyword_categories'=>$list_keyword_categories
		));
	}
	/**
	 * Reverse status of notice
	 * @param integer $id, the ID of notice to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$src=Notice::reverseStatus($id);
			if($src) 
				echo json_encode(array('success'=>true,'src'=>$src));
			else 
				echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Suggests title of notice.
	 */
	public function actionSuggestTitle()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Notice::model()->suggestTitle($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/**
	 * Init checkbox selection
	 * @param string $name_params, name of section to work	 
	 */
	public function initCheckbox($name_params){
		if (! isset ( Yii::app ()->session [$name_params] ))
			Yii::app ()->session [$name_params] = array ();
		if (! Yii::app ()->getRequest ()->getIsAjaxRequest () && $name_params != 'checked-suggest-list')
		{
				Yii::app ()->session [$name_params] = array ();
		}
		else {
			if (isset ( $_POST ['list-checked'] )) {
				$list_new = array_diff ( explode ( ',', $_POST ['list-checked'] ), array ('' ) );
				$list_old = Yii::app ()->session [$name_params];
				$list = $list_old;
				foreach ( $list_new as $id ) {
					if (! in_array ( $id, $list_old ))
						$list [] = $id;
				}
				Yii::app ()->session [$name_params] = $list;
			}
			if (isset ( $_POST ['list-unchecked'] )) {
				$list_unchecked = array_diff ( explode ( ',', $_POST ['list-unchecked'] ), array ('' ) );
				$list_old = Yii::app ()->session [$name_params];
				$list = array ();
				foreach ( $list_old as $id ) {
					if (! in_array ( $id, $list_unchecked )) {
						$list [] = $id;
					}
				}
				Yii::app ()->session [$name_params] = $list;
			}
		}
	}
	/*
	 * List notice suggest 
	 */
	public function actionUpdateSuggest()
	{
		$this->initCheckbox('checked-suggest-list');
		$list_checked = Yii::app()->session["checked-suggest-list"];
		echo implode(',',$list_checked);
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Notice::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(Yii::app()->getRequest()->getIsAjaxRequest() )
		{
		if( !isset($_GET['ajax'] )  || ($_GET['ajax'] != 'notice-list-suggest' && $_GET['ajax'] != 'notice-list')){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
}
