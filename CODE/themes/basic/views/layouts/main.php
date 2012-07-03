<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name='AUTHOR' content='<?php echo Language::t(Setting::s('META_AUTHOR','System'));?>'>
<meta name='COPYRIGHT' content='<?php echo Language::t(Setting::s('META_COPYRIGHT','System'));?>'>
<meta name="keywords" content= "<?php echo Language::t(Setting::s('META_KEYWORD','System'));?>">
<meta name="desc" content="Billgates School">
<link rel="shortcut icon" href="images/fav.png" type="image/x-icon" />
<title><?php echo Language::t(Setting::s('FRONT_SITE_TITLE','System'));?></title>
<!--css default-->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true)?>/css/front/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true)?>/css/front/common.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true)?>/css/front/form.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true)?>/css/front/anythingslider.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true)?>/css/front/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true)?>/css/front/print.css" media="print">
<!--css only page-->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true)?>/css/front/jcarousel.css">
<!--js default-->
<script type="text/javascript" src="<?php echo Yii::app()->request->getBaseUrl(true)?>/js/front/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->getBaseUrl(true)?>/js/front/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->getBaseUrl(true)?>/js/front/jquery.anythingslider.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->getBaseUrl(true)?>/js/front/style.js"></script>
<!--js only page-->
<script type="text/javascript" src="<?php echo Yii::app()->request->getBaseUrl(true)?>/js/front/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->getBaseUrl(true)?>/js/front/newslider.js"></script>
</head>
<body>
<div class="header-top">
	<div class="wrapper">
    	<div class="menu-top">
        	<a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/images/front/icon-home.png" alt="home" /></a>
            <a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/images/front/icon-sitemap.png" alt="sitemap" /></a>
            <a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/images/front/icon-email.png" alt="email" /></a>
        </div><!--menu-top-->
    	<div class="box-search">
        	<div class="box-language">
            	<a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/images/front/vie.png" alt="vie" /></a>
                <a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/images/front/eng.png" alt="vie" /></a>
          	</div>
            <input name="" type="text" class="text" onfocus="javascript:if(this.value=='Từ khoá...'){this.value='';};" onblur="javascript:if(this.value==''){this.value='Từ khoá...';};" value="Từ khoá..." />
            <input name="" type="submit" class="btn-search" value="Tìm kiếm" />
        </div><!--box-search-->
    </div><!--wrapper-->
</div><!--header-top-->
<div class="menu-outer">
	<div class="wrapper">
    	<div class="menu-inner">
            <a href="#" class="logo"></a>
            <div class="menu">
                <ul>
                    <li class="active"><a href="#">Trang chủ</a></li>
                    <li>
                        <a href="#">Giới thiệu</a>
                        <ul>
                            <li><a href="#">Thư ngỏ</a></li>
                            <li><a href="#">Giới thiệu chung</a></li>
                            <li><a href="#">Mục tiêu giáo dục</a></li>
                            <li><a href="#">Phương pháp giáo dục</a></li>
                            <li><a href="#">Cơ sở vật chất</a></li>
                            <li><a href="#">Nhân sự</a></li>
                            <li><a href="#">Hệ thống giáo dục</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Tin tức</a>
                        <ul>
                            <li><a href="#">Tin tuyển sinh</a></li>
                            <li><a href="#">Tin giáo dục</a></li>
                            <li><a href="#">Tin du học</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Tuyển sinh</a></li>
                    <li><a href="#">Hình ảnh</a></li>
                    <li><a href="#">BGS TV</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li class="last"><a href="#">Hỏi đáp</a></li>
                </ul>
            </div><!--menu-->
        </div><!--menu-inner-->
    </div><!--wrapper-->
</div><!--menu-outer-->
<div class="slider-outer">
	<div class="wrapper">
    	<div class="slider-wrapper">
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
        	<a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/images/front/bigicon-mail.png" alt="mail" /><p>Hệ thống mail</p></a>
            <a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/images/front/bigicon-book.png" alt="book" /><p>Sổ liên lạc điện tử</p></a>
            <a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/images/front/bigicon-lib.png" alt="book" /><p>Thư viện nhà trường</p></a>
        </div><!--bigicon-menu-->
        <div class="main-login">
        	<form action="#" method="get">
            	<div class="row"><label>Học sinh</label></div>
                <div class="row"><input name="" type="text" class="text" /></div>
                <div class="row"><label>Mật khẩu</label></div>
                <div class="row"><input name="" type="password" class="text" /></div>
                <div class="row"><input name="" type="submit" class="main-login-submit" value="Đăng nhập" /></div>
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
                    	<img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/images/front/data/level1.png" alt="Mầm non" />
                        <label>Mầm non</label>
                    </a><!--box-level-->
                    <a class="box-level level-2" href="#">
                    	<img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/images/front/data/level2.png" alt="Tiểu học" />
                        <label>Tiểu học</label>
                    </a><!--box-level-->
                    <a class="box-level level-3" href="#">
                    	<img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/images/front/data/level3.png" alt="THCS&THPT" />
                        <label>THCS&amp;THPT</label>
                    </a><!--box-level-->
                    <a class="box-level level-4" href="#">
                    	<img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/images/front/data/level4.png" alt="Du học" />
                        <label>Du học</label>
                    </a><!--box-level-->
                </div><!--shool-level-->
                <div class="winget">
                	<div class="winget-title"><label>Thông báo</label></div>
                    <div class="winget-content">
                    	<div class="box-message">
                    		<?php $this->widget('wNotice',array('view'=>'notice','limit'=>8))?>
                        </div><!--box-message-->
                    </div>
                </div><!--winget-->
            </div><!--sidebar-left-->
            <div class="main">
            	<div class="box">
                	<div class="box-title"><label>Lời khuyên từ Bill Gates</label></div>
                    <div class="box-content">
                    	<div class="main-content">
                        	<p><b>Chủ tịch Tập đoàn Microsoft trở thành tỉ phú ở tuổi 31 và trở thành người giàu nhất nước Mỹ khi chưa bước vào tuổi 40. Dưới đây là những nguyên tắc giúp Gates thành công, qua chính tâm sự của ông.</b></p>
                            <br />
                            <p>"Bạn không nên quyết định hai lần cho một vấn đề. Hãy dành đủ thời gian và suy nghĩ để ra quyết định đúng đắn ngay từ lần đầu tiên mà không cần phải quay trở lại xem xét vấn đề đó vào sau này nữa"</p>
                            <br />
                            <p>"Làm việc theo nguyên tắc bao giờ cũng hiệu quả hơn nhiều so với làm việc theo sự vụ."</p> 
                            <p>"Phải thắng được nỗi sợ hãi bằng vũ khí có tên "tự tin". Thành công tạo niềm tin, vì thế nếu bạn thiếu tự tin, hãy đưa ra mục tiêu. Sau đó nên ăn mừng và làm kễ kỷ niệm khi bạn đạt được mục tiêu đó."</p>
                            <p>"Chúng ta không thể thoát khỏi thua lỗ, chúng ta chỉ có thể biến nó thành bạn đồng hành trong mọi nỗ lực. Nôn nóng khi thua lỗ là một trong những cảm giác cơ bản nhất của xúc cảm con người. Nó không thể giúp ích được gì cho các doanh nhân trẻ trong việc lập kế hoạch song cũng không thể làm ngưng trệ công việc kinh doanh của họ. Nếu bạn cảm thấy nơm nớp lo âu về kinh doanh".</p>
                        </div><!--main-content-->
                    </div>
                </div><!--box-->
                <div class="box">
                	<div class="box-title"><label>TIN BILLGATES SCHOOL</label></div>
                    <div class="box-content">
                    	<?php $this->widget('wBanner',array('code'=>Banner::CODE_HOMEPAGE,'view'=>'home-page'))?>
                        <div class="news-list">
                        	<div class="grid">
                            	<a href="#"><img class="img" src="images/data/image1.jpg" alt="news" /></a>
                                <div class="g-content">
                                	<div class="g-row"><a href="#" class="g-title">Triển lãm đồ dụng dạy học tự làm của Trường mầm non</a></div>
                                    <div class="g-row">
                                    	"Bạn không nên quyết định hai lần cho một vấn đề. Hãy dành đủ thời gian và suy nghĩ để ra quyết định đúng đắn ngay từ lần đầu tiên mà không cần phải quay trở lại xem xét vấn đề đó vào sau này nữa".
                                    </div>
                                </div>
                            </div><!--grid-->
                            <div class="grid">
                            	<a href="#"><img class="img" src="images/data/image1.jpg" alt="news" /></a>
                                <div class="g-content">
                                	<div class="g-row"><a href="#" class="g-title">Triển lãm đồ dụng dạy học tự làm của Trường mầm non</a></div>
                                    <div class="g-row">
                                    	"Bạn không nên quyết định hai lần cho một vấn đề. Hãy dành đủ thời gian và suy nghĩ để ra quyết định đúng đắn ngay từ lần đầu tiên mà không cần phải quay trở lại xem xét vấn đề đó vào sau này nữa".
                                    </div>
                                </div>
                            </div><!--grid-->
                            <div class="grid">
                            	<a href="#"><img class="img" src="images/data/image1.jpg" alt="news" /></a>
                                <div class="g-content">
                                	<div class="g-row"><a href="#" class="g-title">Triển lãm đồ dụng dạy học tự làm của Trường mầm non</a></div>
                                    <div class="g-row">
                                    	"Bạn không nên quyết định hai lần cho một vấn đề. Hãy dành đủ thời gian và suy nghĩ để ra quyết định đúng đắn ngay từ lần đầu tiên mà không cần phải quay trở lại xem xét vấn đề đó vào sau này nữa".
                                    </div>
                                </div>
                            </div><!--grid-->
                        </div><!--news-list-->
                        <div class="other-list">
                            <ul>
                                <li><a href="#">Thực đơn Tuần từ ngày 09/04 - 15/04/2012</a></li>
                                <li><a href="#">Thực đơn Tuần từ ngày 09/04 - 15/04/2012</a></li>
                                <li><a href="#">Thực đơn Tuần từ ngày 09/04 - 15/04/2012</a></li>
                            </ul>
                        </div><!--other-list-->
                    </div>
                </div><!--box-->
            </div><!--main-->
            <div class="sidebar-right">
			<?php $this->widget('wBanner',array('code'=>Banner::CODE_RIGHT,'view'=>'banner-right'))?>
			<div class="box-ad">
               	<a href="#"><img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/images/front/data/ad1.jpg" alt="Quang cao" /></a>
			</div><!--box-ad-->
            </div><!--sidebar-right-->
        </div><!--bground-->
    </div><!--wrapper-->
</div><!--bground-outer-->
<div class="menu-bottom">
    <ul>
        <li><a href="#">Trang chủ</a></li>
        <li><a href="#">Giới thiệu</a></li>
        <li><a href="#">Tin tức</a></li>
        <li><a href="#">Tuyển sinh</a></li>
        <li><a href="#">Hình ảnh</a></li>
        <li><a href="#">BGS TV</a></li>
        <li><a href="#">Liên hệ</a></li>
        <li><a href="#">Hỏi đáp</a></li>
    </ul>
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
	<img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/images/front/footer-address.png" alt="Địa chỉ: Lô X1 Khu đô thị Bắc Linh Đàm - Hoàng Mai - Hà Nội; Điện thoại:84.4.35401588 - 35401589" />
	<p>Copyright © 1997-2012 billgatesshool.vn</p>
</div><!--footer-address-->
</body>
</html>
