<?php

class PrimarySchoolController extends Controller {
	
	public function init(){
		$this->layout='primarySchool';
	}

	public function actionIndex() {		
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'status', PrimarySchool::STATUS_ACTIVE );
		$criteria->addInCondition('special',PrimarySchool::getCode_special(PrimarySchool::SPECIAL_REMARK));
		$criteria->limit=3;
		$list_remark_news = PrimarySchool::model ()->findAll( $criteria );
		$list_remark_news_id=array();
		foreach ($list_remark_news as $news){
			$list_remark_news_id[]=$news->id;
		}
		
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'status', PrimarySchool::STATUS_ACTIVE );
		$criteria->addNotInCondition('id', $list_remark_news_id);
		$criteria->limit=6;
		$list_news = PrimarySchool::model ()->findAll( $criteria );
		$this->render ( 'index',array(
			'list_remark_news'=>$list_remark_news,
			'list_news'=>$list_news
		));
	}
	/**
	 * Displays a category 
	 */
	public function actionList($cat_alias) {
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'alias', $cat_alias );
		$criteria->compare('type',Category::TYPE_PRIMARYSCHOOL);
		$cat = Category::model ()->find( $criteria );
		if (isset ( $cat )) {
			$child_categories = $cat->child_nodes;
			$list_child_id = array ();
			//Set itself
			$list_child_id [] = $cat->id;
			foreach ( $child_categories as $id => $child_cat ) {
				$list_child_id [] = $id;
			}
			$criteria = new CDbCriteria ();
			$criteria->addInCondition ( 'catid', $list_child_id );
			$criteria->compare ( 'status', PrimarySchool::STATUS_ACTIVE );
			$criteria->order = 'id desc';
			$list_news = new CActiveDataProvider ( 'PrimarySchool', array ('pagination' => array ('pageSize' => Setting::s ( 'PAGE_SIZE','School' ) ), 'criteria' => $criteria ) );
			$this->render ( 'list', array ('cat' => $cat, 'list_news' => $list_news ) );
		}
	}
	/**
	 * Display
	 */
	public function actionView($cat_alias, $primarySchool_alias) {
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'alias', $cat_alias );
		$criteria->compare('type',Category::TYPE_PRIMARYSCHOOL);
		$cat = Category::model ()->find( $criteria );
		if (isset ( $cat )) {
		$criteria = new CDbCriteria ();
		if (isset ( $cat ))
			$criteria->compare ( 'catid', $cat->id );
		$criteria->compare ( 'alias', $primarySchool_alias );
		$primarySchool = PrimarySchool::model ()->find ( $criteria );
		
		//List newest news
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'status', PrimarySchool::STATUS_ACTIVE );
		$criteria->limit=3;
		$list_news = PrimarySchool::model ()->findAll( $criteria );
		
		if (isset ( $primarySchool )) {
			$primarySchool->visits=$primarySchool->visits+1;
			$primarySchool->save();
			$this->render ( 'view', array ('cat' => $cat, 'primarySchool' => $primarySchool, 'list_news'=>$list_news ) );
		}
		}
	}
}
