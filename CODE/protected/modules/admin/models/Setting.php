<?php
/**
 * 
 * Setting class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
/**
 * This is the model class for table "setting".
 */
class Setting extends CActiveRecord
{
	public $list=array('System'=>'System','Contact'=>'Contact','News'=>'News','QA'=>'QA','StaticPage'=>'StaticPage','GalleryVideo'=>'GalleryVideo','Album'=>'Album','School'=>'School','Entrance'=>'Entrance');
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/**
	 * @return string the associated database table name
	 */	
	public function tableName()
	{
		return 'tbl_setting';
	}
	/**
	 * @return array validation rules for model attributes.
	 */	
	public function rules()
	{
		return array(
			array('name,value,category','required'),
			array('name','unique'),
			array('description','safe')
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */	
	public function attributeLabels()
	{
		return array(
			'name' => 'Tên tham số',
			'value' => 'Giá trị',
			'category'=>'Nhóm',
			'description'=>'Miêu tả'
		);
	}
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'name', $this->name );
		$criteria->compare ( 'category', $this->category );
		if (isset ( $_GET ['pageSize'] ))
			Yii::app ()->user->setState ( 'pageSize', $_GET ['pageSize'] );
		return new CActiveDataProvider ( $this, array ('criteria' => $criteria, 'pagination' => array ('pageSize' => Yii::app ()->user->getState ( 'pageSize', Setting::s('DEFAULT_PAGE_SIZE','System') ) ), 'sort' => array ('defaultOrder' => 'id DESC' )    		
		));
	}
	/**
	 * Suggests a list of existing names matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of tags to be returned
	 * @return array list of matching username names
	 */
	public function suggestName($keyword,$limit=20)
	{
		$list_news=$this->findAll(array(
			'condition'=>'name LIKE :keyword',
			'order'=>'name DESC',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$names=array();
		foreach($list_news as $news)
			$names[]=$news->name;
			return $names;
	}	
	public static function s($name,$category) {
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'name', $name );
		$criteria->compare ( 'category', $category );
		$model = self::model ()->find ( $criteria );
		if (isset ( $model )) 
				return $model->value;	
		else
		{
			/*
			$model=new Setting();
			$model->name=$name;
			$model->value=1;
			$model->category=$category;
			$model->save();
			*/
			throw new CHttpException(400,'Trong nhóm '.$category.' không tồn tại tham số cấu hình '.$name);
		}

	}
}