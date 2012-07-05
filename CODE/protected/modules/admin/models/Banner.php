<?php
/**
 * 
 * Banner class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */

/**
 * Banner includes attributes and methods of Banner class  
 */
class Banner extends CActiveRecord
{
	const DOMAIN_PRESCHOOL=1;
	const DOMAIN_PRIMARYSCHOOL=2;
	const DOMAIN_HIGHSCHOOL=3;
	const CODE_HOMEPAGE=57;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_article';
	}
	
	/**
	 * Config scope of banner
	 */
	public function defaultScope(){		
		return array(
			'condition'=>'type = '.Article::ARTICLE_BANNER,
		);	
	}
	/**
	 * Config status of banner
	 */
	const STATUS_PENDING=0;
	const STATUS_ACTIVE=1;
	const LIST_ADMIN=10;
	
	/**
	 * Config code of banner (id)
	 * represent the position of banner 
	 */
	const CODE_RIGHT=6;
	const CODE_HEADLINE=7;
	const CODE_PRESCHOOL_LEFT=5;
	const CODE_PRESCHOOL_HEADLINE=57;
	const CODE_PRESCHOOL_MIDDLE=58;
	const CODE_PRIMARY_SCHOOL_LEFT=60;
	const CODE_PRIMAREY_SCHOOL_HEADLINE=61;
	const CODE_PRIMARY_SCHOOL_MIDDLE=62;
	const CODE_HIGH_SCHOOL_LEFT=63;
	const CODE_HIGH_SCHOOL_HEADLINE=64;
	const CODE_HIGH_SCHOOL_MIDDLE=65;
	const CODE_HOMEPAGE=66;
	

	/**
	 * @var string old images of the banner	 
	 */
	public $old_images;
	
	/**
	 * @var string old title of the banner	 
	 */
	public $old_title;
	
	/**
	 * @var array list other attributes of the banner 	 
	 */
	private $list_other_attributes;
	
	/**
	 * @var array config list other attributes of the banner
	 * this attribute no need to search	 
	 */
	private $config_other_attributes=array('modified','images','description','metakey','metadesc');	
	
	/**
	 * 
	 * PHP getter magic method for virtual property list_label_roles
	 */
 	public function getLabel_domain()
 	{
		switch($this->domain) {
			case self::DOMAIN_HIGHSCHOOL: 
				return 'THCS&THPT';
			case self::DOMAIN_PRIMARYSCHOOL: 
				return 'Tiểu học';
			case self::DOMAIN_PRESCHOOL: 
				return 'Mẫu giáo';
			case 0:
				return 'Trang tổng';
		}
 	}
	/**
	 * Get image url which view status of banner 
	 */
 	public function getImageStatus()
 	{
 		switch ($this->status) {
 			case self::STATUS_ACTIVE: 
 				return Yii::app()->request->getBaseUrl(true).'/images/admin/enable.png';
 				break;
 			case self::STATUS_PENDING:
 				return Yii::app()->request->getBaseUrl(true).'/images/admin/disable.png';
 				break;
 		}	
 	}
	/**
	 * Get number images of a banner
	 */
	public function getQuantity_images(){
		$list=array_diff ( explode ( ',', $this->images ), array ('' ) );	
		return sizeof($list);
	}
	/**
	 * Get thumb of the first id of first image in banner
	 */
	public function getThumb_id(){
		$list=array_diff ( explode ( ',', $this->images ), array ('' ) );	
		reset($list);
		return current($list);
	}
	
	/**
	 * Get url of first image
	 * @param string $type, type of thumb image
	 * @return string url path of thumb image if success, otherwise ""
	 */
	public function getThumb_url($type,$class){
		$alt=$this->title;
		if($this->thumb_id>0){
			$image=Image::model()->findByPk($this->thumb_id);
			if(isset($image)){
				$src=$image->getThumb('Banner',$type);
				if( $image->title != '')	$alt=$image->title;
			}
			else {
				$src=Image::getDefaultThumb('Banner', $type);
			}
		}
		else {
			$src=Image::getDefaultThumb('Banner',$type);
		}
		return '<img align="middle" class="'.$class.'" src="'.$src.'" alt="'.$alt.'">';
	}
	/**
	 * Get update url of banner
	 * @return banner's update url
	 */
	public function getUpdate_url()
 	{
 		$url=Yii::app()->createUrl("admin/banner/update",array('id'=>$this->id));
		return $url;
 	}
 	/**
 	 * Get list domain
 	 */
	public function getList_domain()
 	{
 		$tmp=array();
		if (Yii::app ()->user->checkAccess ( 'Manager PreSchool')) {
			$tmp[self::DOMAIN_PRESCHOOL]='Mẫu giáo';
		}
		if (Yii::app ()->user->checkAccess ( 'Manager Primary School')) {
			$tmp[self::DOMAIN_PRIMARYSCHOOL]='Tiểu học';
		}
		if (Yii::app ()->user->checkAccess ( 'Manager High School')) {
			$tmp[self::DOMAIN_HIGHSCHOOL]='THCS&THPT';
		}
		if(!Yii::app ()->user->checkAccess ( 'Admin'))
			return $tmp;
		else
			return $tmp+array('0'=>'Trang tổng');
 	}
 	
	/**
	 * PHP setter magic method for other attributes
	 * @param $name the attribute name
	 * @param $value the attribute value
	 * set value into particular attribute
	 */
	public function __set($name,$value)
	{
		if(in_array($name,$this->config_other_attributes))
			$this->list_other_attributes[$name]=$value;
		else 
			parent::__set($name,$value);
	}
	
	/**
	 * PHP getter magic method for other attributes
	 * @param $name the attribute name
	 * @return value of {$name} attribute
	 */
	public function __get($name)
	{
		if(in_array($name,$this->config_other_attributes))
			if(isset($this->list_other_attributes[$name])) 
				return $this->list_other_attributes[$name];
			else 
		 		return null;
		else
			return parent::__get($name);
	}
	/**
	 * Returns the static model of the specified AR class.
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('title,images,domain','required','on'=>'write',),
			array('title', 'length', 'max'=>256,'on'=>'write'),
			array('description', 'length', 'max'=>512,'on'=>'write'),
			array('title,domain','safe','on'=>'search'),
			array('images','safe','on'=>'upload_image'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'category'=>array(self::BELONGS_TO,'Category','catid'),
			'author'=>array(self::BELONGS_TO,'User','created_by')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Mã banner',
			'title' => 'Tên Banner',
			'created_by' => 'Người đăng Banner',
			'created_date'=>'Thời điểm đăng Banner',
			'description'=>'Mô tả Banner',
			'quantity_images'=>'Số lượng ảnh trong Banner',
			'thumb_Banner'=>'Ảnh đại diện của Banner',
			'domain'=>'Thuộc trang'
		);
	}
	/**
	 * This event is raised after the record is instantiated by a find method.
	 * @param CEvent $event the event parameter
	 */
	public function afterFind()
	{
		//Decode attribute other to set other attributes
		$this->list_other_attributes=json_decode($this->other,true);	
		//Store old intro image
		$this->old_images=$this->images;
		//Store old title
		$this->old_title=$this->title;
		if(isset($this->list_other_attributes['modified']))
			$this->list_other_attributes['modified']=json_decode($this->list_other_attributes['modified'],true);
		else 
			$this->list_other_attributes['modified']=array();
		return parent::afterFind();
	}
	
	/**
	 * This method is invoked before saving a record (after validation, if any).
	 * The default implementation raises the {@link onBeforeSave} event.
	 * You may override this method to do any preparation work for record saving.
	 * Use {@link isNewRecord} to determine whether the saving is
	 * for inserting or updating record.
	 * Make sure you call the parent implementation so that the event is raised properly.
	 * @return boolean whether the saving should be executed. Defaults to true.
	 */
	public function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->created_date=time();
				$this->created_by=Yii::app()->user->id;
				$this->status=Banner::STATUS_ACTIVE;
			}	
			else {
				$modified=$this->modified;
				$modified[time()]=Yii::app()->user->id;
				$this->modified=json_encode($modified);	
			}	
			$this->type=Article::ARTICLE_BANNER;
			$this->other=json_encode($this->list_other_attributes);
			return true;
		}
		else
			return false;
	}
	
	/**
	 * This method is invoked after saving a record (after validation, if any).
	 * The default implementation raises the {@link onAfterSave} event.
	 * You may override this method to do any preparation work for record saving.	 
	 * Make sure you call the parent implementation so that the event is raised properly.
	 * @return boolean whether the saving is successed or not. Defaults to true.
	 */	
	public function afterSave(){
		if ($this->old_images != $this->images) {
			foreach ( array_diff ( explode ( ',', $this->images ), array ('' ) ) as $image_id ) {
				$image = Image::model ()->findByPk ( $image_id );
				if (isset ( $image )) {
					$image->parent_id = $this->id;
					if (!$image->save ())
						return false;
				} 
			}
		
		}
		return true;
	}
	
	/**
	 * This method is invoked before delete a record 
	 * @return boolean whether the deleting is successed or not. Defaults to true. 
	 */
	public function beforeDelete() {
		if (parent::beforeDelete ()) {
			//Delete images	
			foreach ( array_diff ( explode ( ',', $this->images ), array ('' ) ) as $image_id ) {
				$image = Image::model ()->findByPk ( $image_id );
				if (isset ( $image )) {
					$image->parent_id = $this->id;
					if (!$image->delete())
						return false;
				} 
			}	
			return true;	
		}
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('title',$this->title,true);
		$criteria->compare('domain',$this->domain);
		if (!Yii::app ()->user->checkAccess ( 'banner_update')) {
			$criteria->compare ( 'created_by', Yii::app()->user->id);
		}
		
		$tmp=array();
		if (Yii::app ()->user->checkAccess ( 'Manager PreSchool')) {
			$tmp[] = self::DOMAIN_PRESCHOOL;
		}
		if (Yii::app ()->user->checkAccess ( 'Manager Primary School')) {
			$tmp[] = self::DOMAIN_PRIMARYSCHOOL;
		}
		if (Yii::app ()->user->checkAccess ( 'Manager High School')) {
			$tmp[] = self::DOMAIN_HIGHSCHOOL;
		}
		if(!Yii::app ()->user->checkAccess ( 'Admin'))
			$criteria->addInCondition('domain', $tmp);
		
		if(isset($_GET['pageSize']))
				Yii::app()->user->setState('pageSize',$_GET['pageSize']);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
        		'pageSize'=>Yii::app()->user->getState('pageSize',Setting::s('DEFAULT_PAGE_SIZE','System')),
    		),
    		'sort' => array ('defaultOrder' => 'id DESC')
		));
	}
	/**
	 * Suggests a list banner which matching the specified keyword.
	 */
	public function suggestTitle($keyword,$limit=20)
	{
		$list_qa=$this->findAll(array(
			'condition'=>'title LIKE :keyword',
			'order'=>'title DESC',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$titles=array();
		foreach($list_qa as $qa)
			$titles[]=$qa->title;
			return $titles;
	}
	/**
	 * Reverse status (enable & disbale)of banner
	 * @return boolean wheather the reverse status activities is success or not; default value is false
	 */
	static function reverseStatus($id){
		$command=Yii::app()->db->createCommand()
		->select('status')
		->from('tbl_article')
		->where('id=:id',array(':id'=>$id))
		->queryRow();
		switch ($command['status']){
			case self::STATUS_PENDING:
				 $status=self::STATUS_ACTIVE;
				 break;
			case self::STATUS_ACTIVE:
				$status=self::STATUS_PENDING;
				break;
		}
		$sql='UPDATE tbl_article SET status = '.$status.' WHERE id = '.$id;
		$command=Yii::app()->db->createCommand($sql);
		if($command->execute()) {
			switch ($status) {
 			case self::STATUS_ACTIVE: 
 				$src=Yii::app()->request->getBaseUrl(true).'/images/admin/enable.png';
 				break;
 			case self::STATUS_PENDING:
 				$src=Yii::app()->request->getBaseUrl(true).'/images/admin/disable.png';
 				break;
 		}	
			return $src;
		}
		else return false;
	}
}