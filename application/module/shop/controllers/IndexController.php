<?php
class IndexController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('shop/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}
	
	public function noticeAction(){
		$this->_view->render('index/notice');
	}
	//title
	public function indexAction(){
		$this->_view->_title	= 'DK Shop Store';
		$this->_view->theProminent		= $this->_model->listItem($this->_arrParam, array('task' => 'product-special'));
		$this->_view->theProductDesc	= $this->_model->listItem($this->_arrParam, array('task' => 'product-new'));
		$this->_view->theListNews		= $this->_model->listNews($this->_arrParam);
		$this->_view->render('index/index');
	}

	public function registerAction(){
		$userInfo	= Session::get('user');
		if($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time()){
			URL::redirect('default', 'user', 'index');
		}
		
		if(isset($this->_arrParam['form']['submit'])){
			URL::checkRefreshPage($this->_arrParam['form']['token'], 'default', 'user', 'register');
				
			$queryUserName	= "SELECT `id` FROM `".TBL_USER."` WHERE `username` = '".$this->_arrParam['form']['username']."'";
			$queryEmail		= "SELECT `id` FROM `".TBL_USER."` WHERE `email` = '".$this->_arrParam['form']['email']."'";
				
			$validate = new Validate($this->_arrParam['form']);
			$validate->addRule('username', 'string-notExistRecord', array('database' => $this->_model, 'query' => $queryUserName, 'min' => 3, 'max' => 25))
					 ->addRule('email', 'email-notExistRecord', array('database' => $this->_model, 'query' => $queryEmail))
					 ->addRule('password', 'password', array('action' => 'add'));
				
			$validate->run();
				
			$this->_arrParam['form'] = $validate->getResult();
			if($validate->isValid() == false){
				$this->_view->errors = $validate->showErrorsPublic();
			}else{
				$id	= $this->_model->saveItem($this->_arrParam, array('task' => 'user-register'));
				URL::redirect('default', 'index', 'notice', array('type' => 'register-success'));
			}
	
		}
		$this->_view->render('index/register');
	}

	public function logoutAction(){
		Session::delete('user');
		URL::redirect('default', 'index', 'index', null, 'index.html');
	}

	public function loginAction(){

		$this->_view->render('index/category_products');
	}
	public function CategoryAction(){	
		$this->_view->render('index/category');
	}
}