<?php
class ProductController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
	}	

	public function indexAction(){
		$this->_view->_title	= 'Book Store';
		$this->_templateObj->setFolderTemplate('shop/main/');
		$this->_templateObj->setFileTemplate('categoryMen.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();

		$totalItems					= $this->_model->countItem($this->_arrParam, null);
		
		$configPagination = array('totalItemsPerPage'	=> 2, 'pageRange' => 3);

		$this->setPagination($configPagination);
		$this->_view->pagination		= new Pagination($totalItems, $this->_pagination);
		$this->_view->categoryName 		= $this->_model->infoItem($this->_arrParam, array('task' => 'get-cat-name'));
		$this->_view->product3 			= $this->_model->listItem($this->_arrParam, array('task' => 'books-in-3'));
		$this->_view->Items	 	 		= $this->_model->listItem($this->_arrParam, array('task' => 'books-in-cat'));
		$this->_view->render('product/index');
	}

}