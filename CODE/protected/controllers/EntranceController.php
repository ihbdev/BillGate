<?php

class EntranceController extends Controller
{
	/**
	 * Displays all news
	 */
	public function actionIndex()
	{
		Yii::app()->clientScript->scriptMap['jquery.js'] = false;
		Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
		$criteria=new CDbCriteria;				
		$criteria->compare('status',Entrance::STATUS_ACTIVE);				
		$criteria->order='id desc';
		$list_entrance=new CActiveDataProvider('Entrance', array(
			'pagination'=>array(
				'pageSize'=>Setting::s('ENTRANCE_PAGE_SIZE','Entrance'),
			),
			'criteria'=>$criteria,
		));
		$this->render('list-entrance',array(
			'list_entrance'=>$list_entrance
		));
	}

	/**
	 * Displays news
	 */
	public function actionList($cat_alias)
	{
		Yii::app()->clientScript->scriptMap['jquery.js'] = false;
		Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'alias', $cat_alias );
		$criteria->compare('type',Category::TYPE_ENTRANCE);
		$cat = Category::model ()->find( $criteria );
		if(isset($cat)) {
				$child_categories=$cat->child_nodes;
 				$list_child_id=array();
 				//Set itself
 				$list_child_id[]=$cat->id;
 				foreach ($child_categories as $id=>$child_cat){
 					$list_child_id[]=$id;
 				}
				$criteria=new CDbCriteria;
				$criteria->addInCondition('catid',$list_child_id);
				$criteria->compare('status',Entrance::STATUS_ACTIVE);
				$criteria->order='id desc';
				$list_entrance = new CActiveDataProvider('Entrance', array(
					'pagination'=>array(
						'pageSize'=>Setting::s('ENTRANCE_PAGE_SIZE','Entrance'),
					),
					'criteria'=>$criteria,
				));
				$this->render('list-entrance',array(
					'cat'=>$cat,
					'list_entrance'=>$list_entrance
				));
		}
	}	
	public function actionView($cat_alias,$entrance_alias)
	{
		Yii::app()->clientScript->scriptMap['jquery.js'] = false;
		Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'alias', $cat_alias );
		$criteria->compare('type',Category::TYPE_ENTRANCE);
		$cat = Category::model ()->find( $criteria );
		if(isset($cat)){
			$criteria = new CDbCriteria ();
			$criteria->compare ( 'catid', $cat->id );
			$criteria->compare ( 'alias', $entrance_alias );
			$entrance = Entrance::model ()->find ( $criteria );
			if (isset ( $entrance )) {
				$entrance->visits=$entrance->visits+1;
				$entrance->save();
				$this->render ( 'entrance', array ('cat' => $cat, 'entrance' => $entrance ) );
			}
		}
	}	
}
