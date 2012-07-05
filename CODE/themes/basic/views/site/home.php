				<div class="box">
            		<?php $this->widget('wStaticPage',array('view'=>'static-page','special'=>StaticPage::SPECIAL_REMARK,'limit'=>1))?>
                </div><!--box-->
                <div class="box">
                	<div class="box-title"><label><?php echo Language::t('TIN BILLGATES SCHOOL');?></label></div>
                    <?php $this->widget('wBanner',array('code'=>Banner::CODE_HOMEPAGE,'view'=>'home-page'))?>
                    <div class="box-content">
                    	<?php $this->widget('wNews',array('view'=>'news','limit'=>6))?>
                    </div>
                </div><!--box-->