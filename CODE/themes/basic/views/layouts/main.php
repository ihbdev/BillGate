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
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/newslider.js"></script>
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
<div class="slider-outer">
	<div class="wrapper">
    	<div class="slider-wrapper theme-default">
			<?php $this->widget('wBanner',array('code'=>Banner::CODE_HEADLINE,'view'=>'head-line'))?>
            <div class="slider-left"></div>
        </div><!--slider-wrapper-->
        <div class="video-top">
        	<?php $this->widget('wVideo',array('view'=>'video','limit'=>4))?>
		</div><!--video-top-->
    </div><!--wrapper-->
</div><!--slider-outer-->
<div class="main-panel">
	<div class="wrapper">
    	<div class="bigicon-menu">
        	<a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/themes/basic/images/bigicon-mail.png" alt="mail" /><p>Hệ thống mail</p></a>
            <a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/themes/basic/images/bigicon-book.png" alt="book" /><p>Sổ liên lạc điện tử</p></a>
            <a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/themes/basic/images/bigicon-lib.png" alt="book" /><p>Thư viện nhà trường</p></a>
        </div><!--bigicon-menu-->
        <div class="main-login">
        	<form action="#" method="get">
            	<div class="row"><label><?php echo Language::t('Học sinh');?></label></div>
                <div class="row"><input name="" type="text" class="text" /></div>
                <div class="row"><label><?php echo Language::t('Mật khẩu');?></label></div>
                <div class="row"><input name="" type="password" class="text" /></div>
                <div class="row"><input name="" type="submit" class="main-login-submit" value="<?php echo Language::t('Đăng nhập');?>" /></div>
            </form>
        </div><!--main-login-->
    </div><!--wrapper-->	
</div><!--main-panel-->
<div class="bground-outer">
    <div class="wrapper">
        <div class="bground">
            <div class="sidebar-left">
            	<div class="shool-level">
                	<a class="box-level level-1" href="#">
                    	<img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/themes/basic/images/data/level1.png" alt="Mầm non" />
                        <label><?php echo Language::t('Mầm non');?></label>
                    </a><!--box-level-->
                    <a class="box-level level-2" href="#">
                    	<img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/themes/basic/images/data/level2.png" alt="Tiểu học" />
                        <label><?php echo Language::t('Tiểu học');?></label>
                    </a><!--box-level-->
                    <a class="box-level level-3" href="#">
                    	<img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/themes/basic/images/data/level3.png" alt="THCS&THPT" />
                        <label><?php echo Language::t('THCS&amp;THPT');?></label>
                    </a><!--box-level-->
                    <a class="box-level level-4" href="#">
                    	<img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/themes/basic/images/data/level4.png" alt="Du học" />
                        <label><?php echo Language::t('Du học');?></label>
                    </a><!--box-level-->
                </div><!--shool-level-->
                <div class="winget">
                	<div class="winget-title"><label><?php echo Language::t('Thông báo');?></label></div>
                    <div class="winget-content">
                    	<div class="box-message">
                    		<?php $this->widget('wNotice',array('view'=>'notice','limit'=>8))?>
                        </div><!--box-message-->
                    </div>
                </div><!--winget-->
            </div><!--sidebar-left-->
            <div class="main">
            	<?php echo $content?>
            </div><!--main-->
            <div class="sidebar-right">
			<?php $this->widget('wBanner',array('code'=>Banner::CODE_RIGHT,'view'=>'banner-right'))?>
			<div class="box-ad">
               	<a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/themes/basic/images/data/ad1.jpg" alt="Quang cao" /></a>
			</div><!--box-ad-->
            </div><!--sidebar-right-->
        </div><!--bground-->
    </div><!--wrapper-->
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
