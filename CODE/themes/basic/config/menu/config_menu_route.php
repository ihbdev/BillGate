<?php
return array(
			'role'=>array(
				'manager_operation'=>Yii::app ()->user->checkAccess ('role_index')?'/admin/role/index':'',
				'manager_task'=>Yii::app ()->user->checkAccess ('role_index')?'/admin/role/index':'',
				'manager_role'=>Yii::app ()->user->checkAccess ('role_index')?'/admin/role/index':'',
			),
			'news'=>array(
				'index'=>Yii::app ()->user->checkAccess ('news_index')?'/admin/news/index':'',
				'create'=>Yii::app ()->user->checkAccess ('news_create')?'/admin/news/create':'',
				'manager_category'=>Yii::app ()->user->checkAccess ('News_Manager')?'/admin/category':'',
				'view_categories'=>'/news/list',
				'view_all'=>'/news/index',
			),
			'event'=>array(
				'index'=>Yii::app ()->user->checkAccess ('event_index')?'/admin/event/index':'',
				'create'=>Yii::app ()->user->checkAccess ('event_create')?'/admin/event/create':'',
				'manager_category'=>Yii::app ()->user->checkAccess ('Event_Manager')?'/admin/category':'',
				'view_categories'=>'/event/list',
				'view_all'=>'/event/index',
			),
			'notice'=>array(
				'index'=>Yii::app ()->user->checkAccess ('notice_index')?'/admin/notice/index':'',
				'create'=>Yii::app ()->user->checkAccess ('notice_create')?'/admin/notice/create':'',
				'manager_category'=>Yii::app ()->user->checkAccess ('Notice_Manager')?'/admin/category':'',
				'view_categories'=>'/notice/list',
				'view_all'=>'/notice/index',
			),
			'entrance'=>array(
				'index'=>Yii::app ()->user->checkAccess ('entrance_index')?'/admin/entrance/index':'',
				'create'=>Yii::app ()->user->checkAccess ('entrance_create')?'/admin/entrance/create':'',
				'manager_category'=>Yii::app ()->user->checkAccess ('Entrance_Manager')?'/admin/category':'',
				'view_categories'=>'/entrance/list',
				'view_all'=>'/entrance/index',
			),
			'preschool'=>array(
				'index'=>Yii::app ()->user->checkAccess ('preschool_index')?'/admin/preschool/index':'',
				'create'=>Yii::app ()->user->checkAccess ('preschool_create')?'/admin/preschool/create':'',
				'manager_category'=>Yii::app ()->user->checkAccess ('PreSchool_Manager')?'/admin/category':'',
				'view_categories'=>'/preschool/list',
				'view_all'=>'/preschool/index',
			),
			'highSchool'=>array(
				'index'=>Yii::app ()->user->checkAccess ('highSchool_index')?'/admin/highSchool/index':'',
				'create'=>Yii::app ()->user->checkAccess ('highSchool_create')?'/admin/highSchool/create':'',
				'manager_category'=>Yii::app ()->user->checkAccess ('High_School_Manager')?'/admin/category':'',
				'view_categories'=>'/highSchool/list',
				'view_all'=>'/highSchool/index',
			),
			'primarySchool'=>array(
				'index'=>Yii::app ()->user->checkAccess ('primarySchool_index')?'/admin/primarySchool/index':'',
				'create'=>Yii::app ()->user->checkAccess ('primarySchool_create')?'/admin/primarySchool/create':'',
				'manager_category'=>Yii::app ()->user->checkAccess ('Primary_School_Manager')?'/admin/category':'',
				'view_categories'=>'/primarySchool/list',
				'view_all'=>'/primarySchool/index',
			),
			'staticPage'=>array(
				'index'=>Yii::app ()->user->checkAccess ('static_page_index')?'/admin/staticPage/index':'',
				'create'=>Yii::app ()->user->checkAccess ('static_page_create')?'/admin/staticPage/create':'',
				'manager_category'=>Yii::app ()->user->checkAccess ('Static_Page_Manager')?'/admin/category':'',
				'view_categories'=>'staticPage/list',
				'view_all'=>'/staticPage/index',
				'view_page'=>'/staticPage/view',
				'home'=>'site/home'
			),
			'album'=>array(
				'index'=>Yii::app ()->user->checkAccess ('album_index')?'/admin/album/index':'',
				'create'=>Yii::app ()->user->checkAccess ('album_create')?'/admin/album/index':'',
				'manager_category'=>Yii::app ()->user->checkAccess ('Album_Manager')?'/admin/category':'',
				'view_categories'=>'/album/list',
				'view_all'=>'/album/index',
			),
			'galleryVideo'=>array(
				'index'=>Yii::app ()->user->checkAccess ('video_index')?'/admin/galleryVideo/index':'',
				'create'=>Yii::app ()->user->checkAccess ('video_create')?'/admin/galleryVideo/create':'',
				'manager_category'=>Yii::app ()->user->checkAccess ('Video_Manager')?'/admin/category':'',
				'view_categories'=>'/galleryVideo/list',
				'view_all'=>'/galleryVideo/index',
			),
			'qa'=>array(
				'index'=>Yii::app ()->user->checkAccess ('qa_index')?'/admin/qA/index':'',
				'create'=>Yii::app ()->user->checkAccess ('qa_create')?'/admin/qA/create':'',
				'view_qa'=>'qA/index',
				'manager_category'=>Yii::app ()->user->checkAccess ('QA_Manager')?'/admin/category':'',
				'view_all'=>'/qA/index',
			),
			'contact'=>array(
				'index'=>Yii::app ()->user->checkAccess ('contact_index')?'/admin/contact/index':'',
				'view_contact'=>'site/contact',
				'manager_category'=>Yii::app ()->user->checkAccess ('Contact_Manager')?'/admin/category':'',
			),
			'user'=>array(
				'index'=>Yii::app ()->user->checkAccess ('user_index')?'/admin/user/index':'',
				'create'=>Yii::app ()->user->checkAccess ('user_create')?'/admin/user/create':'',
			),
			'banner'=>array(
				'index'=>Yii::app ()->user->checkAccess ('banner_index')?'/admin/banner/index':'',
				'create'=>Yii::app ()->user->checkAccess ('banner_create')?'/admin/banner/create':'',
			),
			'keyword'=>array(
				'index'=>Yii::app ()->user->checkAccess ('keyword_index')?'/admin/keyword/index':'',
				'create'=>Yii::app ()->user->checkAccess ('keyword_create')?'/admin/keyword/create':'',
				'manager_category'=>Yii::app ()->user->checkAccess ('Keyword_Manager')?'/admin/category':'',
			),
			'setting'=>array(
				'index'=>Yii::app ()->user->checkAccess ('setting_index')?'/admin/setting/index':'',
			), 
			'language'=>array(
				'edit'=>Yii::app ()->user->checkAccess ('language_edit')?'/admin/language/edit':'',
				'create'=>Yii::app ()->user->checkAccess ('language_create')?'/admin/language/create':'',
				'delete'=>Yii::app ()->user->checkAccess ('language_delete')?'/admin/language/delete':'',
				'export'=>Yii::app ()->user->checkAccess ('language_export')?'/admin/language/export':'',
				'import'=>Yii::app ()->user->checkAccess ('language_import')?'/admin/language/import':'',
			),
			'image'=>array(
				'list'=>Yii::app ()->user->checkAccess ('image_list')?'/admin/image/list':'',
				'clear_image' => Yii::app ()->user->checkAccess ('image_clear')?'/admin/image/clear':'',
			),
			'menu' => array (
				'manager' => Yii::app ()->user->checkAccess ('menu_index')?'/admin/menu':'', 				
			),
		);