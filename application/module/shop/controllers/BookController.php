<?php
class BookController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('shop/main/');
		$this->_templateObj->setFileTemplate('categoryMen.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}
	
	// ACTION: LIST BOOK
	public function listAction(){
		$this->_view->_title 		= 'List books';

		$this->_view->render('book/list');
	}
	
	// ACTION: DETAIL BOOK
	public function detailAction(){
		$this->_view->_title 		= 'Info book';
 		$this->_view->bookInfo 		= $this->_model->infoItem($this->_arrParam, array('task' => 'book-info'));
		$this->_view->render('book/detail');
	}

	// ACTION: RELATE BOOK
	public function relateAction(){
		$this->_view->bookRelate	= $this->_model->listItem($this->_arrParam, array('task' => 'books-relate'));
		$this->_view->render('book/relate', false);
	}
}