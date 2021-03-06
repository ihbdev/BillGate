<?php
/**
 * 
 * GalleryVideo class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */

/**
 * GalleryVideo includes attributes and methods of GalleryVideo class  
 */
class GalleryVideo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_article';
	}
	/**
	 * Get scope of gallery video
	 */
	public function defaultScope(){
		return array(
			'condition'=>'type = '.Article::ARTICLE_VIDEO,
		);	
	}
   /**
	* Config status of gallery video
	*/
	const STATUS_PENDING=0;
	const STATUS_ACTIVE=1;
	/**
	 * Config special
	 * SPECIAL_REMARK gallery video is viewed at homepage
	 */
	const SPECIAL_REMARK=0;	
	
	const LIST_VIDEO=10;
	
	const LIST_ADMIN=10;
	
	const META_LENGTH=30;
	
	/**	 	 
	 * @var string $old_video, keep the information of model to check changing in model
	 */
	public $old_video;
	public $old_introimage;
	public $old_title;	
	public $list_special;
	public $old_keyword;
	/**
	 * @var array config list other attributes of the banner
	 * this attribute no need to search	 
	 */
	private $config_other_attributes=array('modified','link','description','introimage','metakey','metadesc');	
	private $list_other_attributes;
	
	/**
	 * Get image url which display status of contact
	 * @return string path to enable.png if this status is STATUS_ACTIVE
	 * path to disable.png if status is STATUS_PENDING
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
	 * Get update url of gallery video
	 * @return gallery video's update url
	 */
	public function getUpdate_url()
 	{
 		$url=Yii::app()->createUrl("admin/galleryVideo/update",array('id'=>$this->id));
		return $url;
 	}
 	/**
 	 * Get url of this video
 	 * @return string $url, absoluted path to this video
 	 */
 	public function getUrl(){
		$url=Yii::app()->createUrl("galleryVideo/view",array('cat_alias'=>$this->category->alias,'video_alias'=>$this->alias)); 
		return $url;
	}
 	
 	/**
	 * Get thumb of this video
	 * @return string, html code of this video thumb image
	 */
	public function getThumb_url($type,$class){
		$alt=$this->title;
		if($this->introimage>0){
			$image=Image::model()->findByPk($this->introimage);
			if(isset($image)){
				$src=$image->getThumb('GalleryVideo',$type);
				if( $image->title != '')	$alt=$image->title;
			}
			else {
				$src=Image::getDefaultThumb('GalleryVideo', $type);
			}
			return '<img class="'.$class.'" src="'.$src.'" alt="'.$alt.'">';
		}
		else {			
			//return '<img class="img" src="'.Image::getDefaultThumb('GalleryVideo', $type).'" alt="">';
					//Get thumb youtube
		parse_str( parse_url( $this->link, PHP_URL_QUERY ), $vars );
		return '<img class="'.$class.'" src="http://img.youtube.com/vi/'.$vars['v'].'/1.jpg" alt="'.$alt.'">';
		}
	}
	public function getThumb($type,$class){
		$alt=$this->title;
		if($this->introimage>0){
			$image=Image::model()->findByPk($this->introimage);
			if(isset($image)){
				$src=$image->getThumb('GalleryVideo',$type);
				if( $image->title != '')$alt=$image->title;
			}
			else {
				$src=Image::getDefaultThumb('GalleryVideo', $type);
			}
			return $src;
		}
		else {			
			//return '<img class="img" src="'.Image::getDefaultThumb('GalleryVideo', $type).'" alt="">';
					//Get thumb youtube
		parse_str( parse_url( $this->link, PHP_URL_QUERY ), $vars );
		return 'http://img.youtube.com/vi/'.$vars['v'].'/1.jpg';
		}
	}
	/**
	 * Get all specials of class Album
	 * Used in dropdown in creating, updating an album
	 */
	static function getList_label_specials()
 	{
	return array(
			self::SPECIAL_REMARK=>'Hiển thị ở trang chủ',
		);
 	}
 	/*
	 * Get similar news
	 */
	public function getList_similar() {
		$criteria = new CDbCriteria ();
		$criteria->addCondition('id <>'. $this->id);
		$criteria->compare ( 'status', GalleryVideo::STATUS_ACTIVE );
		$criteria->order = 'id desc';
		$criteria->limit = Setting::s ( 'LIMIT_SIMILAR_GALLERYVIDEO','GalleryVideo' );
		$result = GalleryVideo::model ()->findAll ( $criteria );
		return $result;
	}	
 	/*
 	 * Get label category
 	 */
	public function getLabel_category()
 	{
		$cat=$this->category;
		return $cat->name;
 	}

 	/**
 	 * Get specials of a object album
 	 * Used in listing page in admin board
 	 */
	public function getLabel_specials()
 	{
		$label_specials=array();
		foreach ($this->list_special as $special) {
			$list_label_specials=self::getList_label_specials();
			$label_specials[]= $list_label_specials[$special];
		}
		return $label_specials;
 	}
 	/**
 	 * Special is encoded before save in database
 	 * Function get all code of the special
 	 */
	static function getCode_special($index=null)
 	{
 		$result=array();
 		$full=range(0,pow(2,sizeof(self::getList_label_specials()))-1);
 		if($index === null){
 			$result=$full;
 		}
 		else {			
 			foreach ($full as $num){
 				if(in_array($index, iPhoenixStatus::decodeStatus($num))){
 					$result[]=$num;
 				}
 			}
 		}
 		return $result;
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
	 * @param string $className active record class name.
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
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,link,catid','required','on'=>'write',),
			array('title', 'unique','on'=>'write'),
			array('title', 'length', 'max'=>256,'on'=>'write'),
			array('introimage', 'length', 'max'=>8,'on'=>'write'),
			array('list_special,lang,metadesc,description,keyword', 'safe','on'=>'write'),
			array('title,lang,catid,special,keyword','safe','on'=>'search'),
			array('link','safe','on'=>'upload_video'),
			array('introimage','safe','on'=>'upload_image'),
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
			'title' => 'Tên video',
			'created_by' => 'Người đăng',
			'created_date'=>'Thời điểm đăng',
			'description'=>'Mô tả video',
			'introimage'=>'Ảnh minh họa',
			'list_special'=>'Trạng thái hiển thị',
			'lang'=>'Ngôn ngữ',
			'special'=>'Lọc theo nhóm hiển thị',
			'catid'=>'Danh mục',
			'visits'=>'Người đọc'
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
		//Store old video
		//$this->old_video=$this->video;
		//Store introimage 
		$this->old_introimage=$this->introimage;
		//Get list special
		$this->list_special=iPhoenixStatus::decodeStatus($this->special);
		//Store old title
		$this->old_title=$this->title;
		$this->old_keyword=$this->keyword;
		
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
				$this->status=GalleryVideo::STATUS_ACTIVE;
				//Set alias
				$alias=iPhoenixString::createAlias($this->title);
				while(sizeof(GalleryVideo::model()->findAll('alias = "'.$alias.'"'))>0){
					$suffix=rand(1,99);
					$alias =$alias.'-'.$suffix;
				}
				$this->alias=$alias;				
			}	
			else {
				$modified=$this->modified;
				$modified[time()]=Yii::app()->user->id;
				$this->modified=json_encode($modified);	
				if($this->title != $this->old_title) {
					$alias=iPhoenixString::createAlias($this->title);
					while(sizeof(GalleryVideo::model()->findAll('alias = "'.$alias.'"'))>0){
						$suffix=rand(1,99);
						$alias =$alias.'-'.$suffix;
					}
					$this->alias=$alias;
				}
			}	
			if($this->metadesc == ''){
					$description=$this->description;
					$this->metadesc=iPhoenixString::createIntrotext($description,self::META_LENGTH);
				}
		//Handler keyword
			if($this->old_keyword != $this->keyword || $this->isNewRecord){
				$old_category=Category::model()->findByPk($this->old_keyword);
				if(isset($old_category)){
					$old_category->amount=$old_category->amount-1;
					if($old_category->amount < 0) $old_category->amount=0;
					$old_category->save();	
				}
				$new_category=Category::model()->findByPk($this->keyword);
				if(isset($new_category)){
					$new_category->amount=$new_category->amount+1;
					$new_category->save();	
				}
			}
			//Encode special
			$this->special=iPhoenixStatus::encodeStatus($this->list_special); 
			$this->type=Article::ARTICLE_VIDEO;
			$this->other=json_encode($this->list_other_attributes);
			return true;
		}
	}

	/**
	 * This method is invoked after saving a record.
	 * The default implementation raises the {@link onAfterSave} event.
	 * You may override this method to do any preparation work for record saving.
	 * Make sure you call the parent implementation so that the event is raised properly.
	 * ****
	 * Check changing in introimage,change the introimage if necessary
	 * @return boolean whether the saving should be executed. Defaults to true.
	 */	
	public function afterSave(){
		/*
		if ($this->old_video != $this->video) {
			foreach ( array_diff ( explode ( ',', $this->video ), array ('' ) ) as $video_id ) {
				$video= Video::model ()->findByPk ( $video_id );
				if (isset ( $video )) {
					$video->parent_id = $this->id;
					if (!$video->save ())
						return false;
				} 
			}
		
		}
		*/
		if($this->old_introimage != $this->introimage){
			$introimage = Image::model()->findByPk($this->introimage);
			if(isset($introimage)){
				$introimage->parent_id=$this->id;
				if($introimage->save()) 
					return parent::afterSave();
				else 
					return false;
				}
			else 
				return true;
			}
		return true;
	}
	
	/**
	 * This method is invoked before delete a record 
	 */
	public function beforeDelete() {
		if (parent::beforeDelete ()) {
			/*
			//Delete video	
			foreach ( array_diff ( explode ( ',', $this->video ), array ('' ) ) as $video_id ) {
				$video = Video::model ()->findByPk ( $video_id );
				if (isset ( $video )) {
					if (!$video->delete())
						return false;
				} 
			}	
			*/
			$introimage = Image::model()->findByPk($this->introimage);
			if(isset($introimage)){
				if($introimage->delete()) 
					return true;
				else 
					return false;	
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
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('lang',$this->lang);
		$criteria->compare('title',$this->title,true);
		if (!Yii::app ()->user->checkAccess ( 'video_update') && Yii::app()->controller->id == 'galleryVideo' && Yii::app()->controller->action->id == 'index') {
			$criteria->compare ( 'created_by', Yii::app()->user->id);
		}	
		if($this->special !='')
			$criteria->addInCondition('special',self::getCode_special($this->special));
		//Filter catid
		$cat = Category::model ()->findByPk ( $this->catid );
		if ($cat != null) {
			$child_categories = $cat->child_nodes;
			$list_child_id = array ();
			//Set itself
			$list_child_id [] = $cat->id;
			if ($child_categories != null)
				foreach ( $child_categories as $id => $child_cat ) {
					$list_child_id [] = $id;
				}
			$criteria->addInCondition ( 'catid', $list_child_id );
		}
		//Filter keyword category
		$cat = Category::model ()->findByPk ( $this->keyword );
		if ($cat != null) {
			$criteria->addInCondition ( 'keyword', $cat->ancestor_nodes );
		}	
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
	 * Suggests a list of existing titles matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of tags to be returned
	 * @return array list of matching username names
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
	 * Change status of contact
	 * @param integer $id, the ID of contact model
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

	/**
	 * Get url of Youtube video
	 */
	public function parseUrl()
	{
		parse_str( parse_url( $this->link, PHP_URL_QUERY ), $tmp );
		return $tmp['v'];
	}
}