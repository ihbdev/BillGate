<?php
/**
 * 
 * DefaultController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */

/**
 * DefaultController includes actions relevant to default actions of system:
 *** index
 *** login
 *** logout   
 */
class DefaultController extends Controller
{
	/**
	 * @var string the default layout for the views.
	 */
	public $layout='board';
	
	public function filters()
    {
        return array(
            //'https +login,logout',
        );
    }
	
	public function actionIndex()
	{
		$this->redirect(array('news/index'));
	}
	/**
	 * Displays the login page, redirect to index page if login successfully 
	 */
	public function actionLogin()
	{
		if(!Yii::app()->user->isGuest) $this->redirect(array('news/index'));
		if(!isset(Yii::app()->session['login_incorrect'])){
			Yii::app()->session['login_incorrect']=1;
		}
		$model=new LoginForm;
		if(Yii::app()->session['login_incorrect'] <= User::LIMIT_INCORRECT){
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {
				if (Yii::app ()->user->checkAccess ( 'news_index'))
				{
					$url = 'http://'.Yii::app()->getRequest()->serverName .Yii::app()->createUrl('admin/news/index');			
					$this->redirect($url);
				}
				if (Yii::app ()->user->checkAccess ( 'banner_index'))
				{
					$url = 'http://'.Yii::app()->getRequest()->serverName .Yii::app()->createUrl('admin/banner/index');			
					$this->redirect($url);
				}
			}
			else {
				$login_incorrect=Yii::app()->session['login_incorrect'];
				$login_incorrect++;
				Yii::app()->session['login_incorrect']=$login_incorrect;
				Yii::app ()->user->setFlash ( 'error', 'Username/Password không chính xác.' );
			}
		}
		}
		else {
			Yii::app ()->user->setFlash ( 'error', 'Bạn đã đăng nhập sai 5 lần liên tiếp. Vui lòng thử lại sau.' );
		}
		//The username or password that you entered is incorrect.
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('default/login'));
	}
	/**
	 * Switch view basic and view advance
	 */
	public function actionView($view)
	{
		Yii::app()->session['view']=$view;
		if (Yii::app ()->user->checkAccess ( 'news_index'))
		{
			$url = 'http://'.Yii::app()->getRequest()->serverName .Yii::app()->createUrl('admin/news/index');			
			$this->redirect($url);
		}
		if (Yii::app ()->user->checkAccess ( 'banner_index'))
		{
			$url = 'http://'.Yii::app()->getRequest()->serverName .Yii::app()->createUrl('admin/banner/index');			
			$this->redirect($url);
		}
	}	
}