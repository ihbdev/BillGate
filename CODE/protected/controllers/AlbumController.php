<?php

class AlbumController extends Controller
{
	/**
	 * Displays all album
	 */
	public function actionIndex()
	{
				Yii::app()->clientScript->scriptMap['jquery.js'] = false;
				Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
				$criteria=new CDbCriteria;
				$criteria->compare('status',Album::STATUS_ACTIVE);
				$criteria->order='id desc';

				//Find the latest album
				$latest_albums = Album::model()->findAll($criteria);
				$latest_album = $latest_albums[0];

				//Except latest video from list
				$criteria->addCondition('id<>'.$latest_album->id);

				$list_album=new CActiveDataProvider('Album', array(
					'pagination'=>array(
						'pageSize'=>Setting::s('ALBUM_PAGE_SIZE','Album'),
					),
					'criteria'=>$criteria,
				));
				$this->layout = 'main_gallery';
				$this->render('list-album',array(
					'latest_album'=>$latest_album,
					'list_album'=>$list_album
				));
	}	
	/**
	 * Displays album
	 */
	public function actionList($cat_alias)
	{	
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'alias', $cat_alias );
		$criteria->compare('type',Category::TYPE_ALBUM);
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
				$criteria->compare('status',Album::STATUS_ACTIVE);
				$criteria->order='id desc';
				$list_album=new CActiveDataProvider('Album', array(
					'pagination'=>array(
						'pageSize'=>Setting::s('ALBUM_PAGE_SIZE','Album'),
					),
					'criteria'=>$criteria,
				));
				$this->render('list-album',array(
					'cat'=>$cat,
					'list_album'=>$list_album
				));
		}	
	}	
	public function actionView($cat_alias,$album_alias)
	{
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'alias', $cat_alias );
		$criteria->compare('type',Category::TYPE_ALBUM);
		$cat = Category::model ()->find( $criteria );
		if(isset($cat)) {
		$criteria = new CDbCriteria ();
		if (isset ( $cat ))
			$criteria->compare ( 'catid', $cat->id );
		$criteria->compare ( 'alias', $album_alias );
		$album = Album::model ()->find ( $criteria );
		if (isset ( $album )) {
			$album->visits=$album->visits+1;
			$album->save();
			$this->render ( 'album', array ('cat' => $cat, 'album' => $album ) );
		}
		}
	}
	public function actionLoad($id)
	{
		$model=$this->loadModel($id);
		$list_image_id=array_diff ( explode ( ',', $model->images ), array ('' ));
		echo '<ul id="mycarousel" class="jcarousel-skin-tango">';
		foreach ( $list_image_id as $image_id ) {
			$image = Image::model ()->findByPk ( $image_id );
			echo 
				'
							<li><table class="gallery-slider">
								<tr><td><img src="'.$image->getThumb('Album','thumb_list_page_big').'" alt="'.$image->title.'" /></td></tr>
							</table></li>
				';
		}
		echo '</ul>';
	}

	public function loadModel($id)
	{
		$model=Album::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}

