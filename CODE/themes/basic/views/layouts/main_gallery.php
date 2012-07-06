<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name='AUTHOR' content='<?php echo Language::t(Setting::s('META_AUTHOR','System'));?>'>
<meta name='COPYRIGHT' content='<?php echo Language::t(Setting::s('META_COPYRIGHT','System'));?>'>
<link rel="shortcut icon" href="images/fav.png" type="image/x-icon" />
<!--css default-->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl?>/css/common.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl?>/css/form.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl?>/css/nivo-slider.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl?>/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl?>/css/print.css" media="print">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl?>/css/ihb.css">
<!--css only page-->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl?>/css/jcarousel.css">
<!--js default-->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/style.js"></script>
<!--js only page-->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/gallery.js"></script>
<title><?php echo Language::t(Setting::s('FRONT_SITE_TITLE','System'));?></title>
</head>
<body>
<div class="header-top">
	<div class="wrapper">
    	<div class="menu-top">
        	<a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/themes/basic/images/icon-home.png" alt="home" /></a>
            <a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/themes/basic/images/icon-sitemap.png" alt="sitemap" /></a>
            <a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/themes/basic/images/icon-email.png" alt="email" /></a>
        </div><!--menu-top-->
    	<div class="box-search">
        	<div class="box-language">
            	<a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/themes/basic/images/vie.png" alt="vie" /></a>
                <a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/themes/basic/images/eng.png" alt="vie" /></a>
          	</div>
            <input name="" type="text" class="text" onfocus="javascript:if(this.value=='Từ khoá...'){this.value='';};" onblur="javascript:if(this.value==''){this.value='<?php echo Language::t('Từ khoá...');?>';};" value="<?php echo Language::t('Từ khoá...');?>" />
            <input name="" type="submit" class="btn-search" value="<?php echo Language::t('Tìm kiếm');?>" />
        </div><!--box-search-->
    </div><!--wrapper-->
</div><!--header-top-->
<div class="menu-outer">
	<div class="wrapper">
    	<div class="menu-inner">
            <a href="#" class="logo"></a>
            <div class="menu">
            <?php $this->widget('wMenu',array('type'=>Menu::TYPE_USER_MENU,'view'=>'menu-top'))?>
            </div><!--menu-->
        </div><!--menu-inner-->
    </div><!--wrapper-->
</div><!--menu-outer-->
<div class="bground-outer">
    <div class="bground-home">
        <div class="wrapper">
            <div class="content-home">
                <div class="box">
                	<?php echo $content;?>
                </div><!--box-->
            </div><!--content-home-->
        </div><!--wrapper-->
    </div><!--bground-home-->
</div><!--bground-outer-->
<div class="menu-bottom">
	<?php $this->widget('wMenu',array('type'=>Menu::TYPE_USER_MENU,'view'=>'menu-footer'))?>
</div><!--menu-bottom-->
<div class="footer">
	<div class="wrapper">
        <div class="icon-footer">
        	<a href="#" class="icon-gmail"></a>
            <a href="#" class="icon-facebook"></a>
            <a href="#" class="icon-twitter"></a>
            <a href="#" class="icon-yahoo"></a>
        </div><!--icon-footer-->
        <div class="footer-content">
        	<div class="footer-contact"></div>
            <ul>
            	<li><a href="#">Ban giám hiệu mầm non</a></li>
                <li><a href="#">Ban giám hiệu tiểu học</a></li>
                <li><a href="#">Ban giám hiệu THCS</a></li>
                <li><a href="#">Văn phòng</a></li>
                <li><a href="#">Cán bộ phụ trách ô tô</a></li>
                <li><a href="#">Can bộ y tế</a></li>
                <li><a href="#">Chuyên gia tâm lý</a></li>
                <li><a href="#">Bộ phần truyền thông</a></li>
            </ul>
        </div><!--footer-content-->
        <div class="footer-content">
        	<div class="footer-faq"></div>
            <ul>
            	<li><a href="#">Ban giám hiệu mầm non</a></li>
                <li><a href="#">Ban giám hiệu tiểu học</a></li>
                <li><a href="#">Ban giám hiệu THCS</a></li>
                <li><a href="#">Văn phòng</a></li>
                <li><a href="#">Cán bộ phụ trách ô tô</a></li>
                <li><a href="#">Cán bộ y tế</a></li>
                <li><a href="#">Chuyên gia tâm lý</a></li>
            </ul>
        </div><!--footer-content-->
    </div><!--wrapper-->
</div><!--footer-->
<div class="footer-address">
	<img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/themes/basic/images/footer-address.png" alt="Địa chỉ: Lô X1 Khu đô thị Bắc Linh Đàm - Hoàng Mai - Hà Nội; Điện thoại:84.4.35401588 - 35401589" />
	<p><?php echo Language::t(Setting::s('COPYRIGHT_FOOTER','System'));?></p>
</div><!--footer-address-->
</body>
</html>
