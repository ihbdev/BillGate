<?php
/**
 * 
 * GalleryVideoController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */

/**
 * GalleryVideoController includes actions relevant to GalleryVideo:
 *** create new GalleryVideo
 *** update information of a GalleryVideo
 *** delete GalleryVideo
 *** index list gallery video
 *** reverse GalleryVideo's status
 *** suggest GalleryVideo's title
 *** load model from id
 *** perform action to list of selected model from checkbox  
 */
class GalleryVideoController extends Controller
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
				'roles'=>array('video_index'),
			),
			array('allow',  
				'actions'=>array('create'),
				'roles'=>array('video_create'),
			),
			array('allow',  
				'actions'=>array('suggestTitle'),
				'roles'=>array('video_suggestTitle'),
			),
			array('allow', 
				'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('video_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('video_delete'),
			),
				array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('video_checkbox'),
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
		$model=new GalleryVideo('write');
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['GalleryVideo']))
		{
			$model->attributes=$_POST['GalleryVideo'];
			if(!isset($_POST['GalleryVideo']['list_special'])) $model->list_special=array();
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}
		//List category product
		$group=new Category();		
		$group->type=Category::TYPE_GALLERYVIDEO;
		$list=$group->list_nodes;
		$list_category=array();
		foreach ($list as $id=>$cat){
			$list_category[$id]=$cat;
		}
		//Group keyword
		$group=new Category();		
		$group->type=Category::TYPE_KEYWORD;
		$list_keyword_categories=$group->list_nodes;
		$this->render('create',array(
			'model'=>$model,
			'list_category'=>$list_category,
			'list_keyword_categories'=>$list_keyword_categories	
			
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel ( $id );
		if (Yii::app ()->user->checkAccess ( 'video_update', array ('video' => $model ) )) {
			$model->scenario = 'write';
			// Ajax validate
			$this->performAjaxValidation ( $model );
			
			if (isset ( $_POST ['GalleryVideo'] )) {
				$model->attributes = $_POST ['GalleryVideo'];
				if(!isset($_POST['GalleryVideo']['list_special'])) $model->list_special=array();
				if ($model->save ())
					$this->redirect ( array ('update', 'id' => $model->id ) );
			}
		//List category product
		$group=new Category();		
		$group->type=Category::TYPE_GALLERYVIDEO;
		$list=$group->list_nodes;
		$list_category=array();
		foreach ($list as $id=>$cat){
			$list_category[$id]=$cat;
		}
		//Group keyword
		$group=new Category();		
		$group->type=Category::TYPE_KEYWORD;
		$list_keyword_categories=$group->list_nodes;
			$this->render ( 'update', array (
				'model' => $model,
				'list_category'=>$list_category,
				'list_keyword_categories'=>$list_keyword_categories	
			) );
		}	
		else
			throw new CHttpException(400,'Bạn không có quyền chỉnh sửa video này.');		
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->initCheckbox('checked-video-list');
		$model=new GalleryVideo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GalleryVideo']))
			$model->attributes=$_GET['GalleryVideo'];
		//List category product
		$group=new Category();		
		$group->type=Category::TYPE_GALLERYVIDEO;
		$list=$group->list_nodes;
		$list_category=array();
		foreach ($list as $id=>$cat){
			$list_category[$id]=$cat;
		}
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
	 * Reverse status of model
	 * @param integer $id, id of model
	 */
	public function actionReverseStatus($id)
	{
		$src=GalleryVideo::reverseStatus($id);
			if($src) 
				echo json_encode(array('success'=>true,'src'=>$src));
			else 
				echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Suggests title of model.
	 */
	public function actionSuggestTitle()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=GalleryVideo::model()->suggestTitle($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=GalleryVideo::model()->findByPk($id);
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
		if(Yii::app()->getRequest()->getIsAjaxRequest())
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * Performs the action with multi-selected model from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */	
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-video-list');
		$list_checked = Yii::app()->session["checked-video-list"];
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'video_delete')) {
					foreach ( $list_checked as $id ) {
						$item = GalleryVideo::model ()->findByPk ( $id );
						if (isset ( $item ))
							if (! $item->delete ()) {
								echo 'false';
								Yii::app ()->end ();
							}
					}
					Yii::app ()->session ["checked-video-list"] = array ();
				} else {
					echo 'false';
					Yii::app ()->end ();
				}
				break;
		}
		echo 'true';
		Yii::app()->end();
		
	}
	
	/**
	 * Init checkbox selection
	 * @param $name_params, name of section to work	 
	 */
	public function initCheckbox($name_params){
		if (! isset ( Yii::app ()->session [$name_params] ))
			Yii::app ()->session [$name_params] = array ();
		if (! Yii::app ()->getRequest ()->getIsAjaxRequest ())
			Yii::app ()->session [$name_params] = array ();
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
}

