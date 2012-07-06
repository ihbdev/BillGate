<?php 
return array(
		Category::TYPE_STATICPAGE=>array(
			'form'=>'_form',
			'max_rank'=>1,
			'code'=>'staticPage',
			'class'=>'StaticPage',
			'label'=>'Danh mục các trang tĩnh'				
		),
		Category::TYPE_NEWS=>array(
			'form'=>'_form',
			'max_rank'=>2,
			'code'=>'news',
			'class'=>'News',
			'label'=>'Danh mục tin tức-sự kiện'	
		),
		Category::TYPE_ALBUM=>array(
			'form'=>'_form',
			'max_rank'=>2,
			'code'=>'album',
			'class'=>'Album',
			'label'=>'Danh mục album'
		),
		Category::TYPE_GALLERYVIDEO=>array(
			'form'=>'_form',
			'max_rank'=>2,
			'code'=>'galleryVideo',
			'class'=>'GalleryVideo',
			'label'=>'Danh mục video'
		),
		Category::TYPE_KEYWORD=>array(
			'form'=>'_form_keyword',
			'max_rank'=>3,
			'code'=>'keyword',
			'class'=>'Keyword',
			'label'=>'Danh mục keyword'
		),
		Category::TYPE_QA=>array(
			'form'=>'_form',
			'max_rank'=>1,
			'code'=>'qA',
			'class'=>'QA',
			'label'=>'Danh mục hỏi đáp'
		),		
		Category::TYPE_NOTICE=>array(
			'form'=>'_form',
			'max_rank'=>2,
			'code'=>'notice',
			'class'=>'Notice',
			'label'=>'Danh mục thông báo'
		),
		Category::TYPE_EVENT=>array(
			'form'=>'_form',
			'max_rank'=>2,
			'code'=>'event',
			'class'=>'Event',
			'label'=>'Danh mục sự kiện'
		),
		Category::TYPE_PRESCHOOL=>array(
			'form'=>'_form',
			'max_rank'=>1,
			'code'=>'preschool',
			'class'=>'PreSchool',
			'label'=>'Danh mục tin của trường mẫu giáo'
		),
		Category::TYPE_PRIMARYSCHOOL=>array(
			'form'=>'_form',
			'max_rank'=>1,
			'code'=>'primarySchool',
			'class'=>'PrimarySchool',
			'label'=>'Danh mục tin của trường tiểu học'
		),
		Category::TYPE_HIGHSCHOOL=>array(
			'form'=>'_form',
			'max_rank'=>1,
			'code'=>'highSchool',
			'class'=>'HighSchool',
			'label'=>'Danh mục tin của trường THCS&THPT'
		),
		Category::TYPE_CONTACT=>array(
			'form'=>'_form',
			'max_rank'=>1,
			'code'=>'contact',
			'class'=>'Contact',
			'label'=>'Danh mục liên hệ'
		)				
	);