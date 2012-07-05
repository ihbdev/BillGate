<?php

class PreSchoolController extends Controller {
	
	public function init(){
		$this->layout='preschool';
	}
	/**
	 * Displays all product
	 */
	public function actionIndex() {		
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'status', Preschool::STATUS_ACTIVE );
		$criteria->addInCondition('special',Preschool::getCode_special(PreSchool::SPECIAL_REMARK));
		$criteria->limit=3;
		$list_remark_news = PreSchool::model ()->findAll( $criteria );
		$list_remark_news_id=array();
		foreach ($list_remark_news as $news){
			$list_remark_news_id[]=$news->id;
		}
		
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'status', Preschool::STATUS_ACTIVE );
		$criteria->addNotInCondition('id', $list_remark_news_id);
		$criteria->limit=6;
		$list_news = PreSchool::model ()->findAll( $criteria );
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
		$criteria->compare('type',Category::TYPE_PRESCHOOL);
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
			$criteria->compare ( 'status', Preschool::STATUS_ACTIVE );
			$criteria->order = 'id desc';
			$list_news = new CActiveDataProvider ( 'Preschool', array ('pagination' => array ('pageSize' => Setting::s ( 'PAGE_SIZE','School' ) ), 'criteria' => $criteria ) );
			$this->render ( 'list', array ('cat' => $cat, 'list_news' => $list_news ) );
		}
	}
	/**
	 * Displays product
	 */
	public function actionView($cat_alias, $product_alias) {
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'alias', $cat_alias );
		$criteria->compare('type',Category::TYPE_PRODUCT);
		$cat = Category::model ()->find( $criteria );
		if (isset ( $cat )) {
		$criteria = new CDbCriteria ();
		if (isset ( $cat ))
			$criteria->compare ( 'catid', $cat->id );
		$criteria->compare ( 'alias', $product_alias );
		$product = Product::model ()->find ( $criteria );
		if (isset ( $product )) {
			$product->visits=$product->visits+1;
			$product->save();
			$this->render ( 'product', array ('cat' => $cat, 'product' => $product ) );
		}
		}
	}
}
