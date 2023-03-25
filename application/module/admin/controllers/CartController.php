<?php
class CartController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

	// ACTION: LIST GROUP
	public function indexAction()
	{
		$this->_view->_title 		= 'Cart Manager :: List';
		$totalItems					= $this->_model->countItem($this->_arrParam, null);
		$configPagination = array('totalItemsPerPage'	=> 5, 'pageRange' => 3);
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);
		$this->_view->Items 		= $this->_model->listItem($this->_arrParam, null);
		$this->_view->render('cart/index');
	}

	public function formAction()
	{
		$this->_view->_title = 'Group Manager :: Add';

		if (isset($this->_arrParam['id'])) {
			$this->_view->_title = 'Group Manager :: Edit';
			$this->_arrParam['form'] = $this->_model->infoItem($this->_arrParam);
			if (empty($this->_arrParam['form'])) URL::redirect('admin', 'cart', 'index');
		}

		if ($this->_arrParam['form']['token'] > 0) {

			$validate = new Validate($this->_arrParam['form']);
			$validate->addRule('name', 'string', array('min' => 3, 'max' => 255))
				->addRule('ordering', 'int', array('min' => 1, 'max' => 100))
				->addRule('status', 'status', array('deny' => array('default')))
				->addRule('group_acp', 'status', array('deny' => array('default')))
				->addRule('picture', 'file', array('min' => 1, 'max' => 1000000, 'entension' => array('jpg', 'png')), false);
			$validate->run();
			$this->_arrParam['form'] = $validate->getResult();
			if ($validate->isValid() == false) {
				$this->_view->errors = $validate->showErrors();
			} else {
				$task	= (isset($this->_arrParam['form']['id'])) ? 'edit' : 'add';
				$id	= $this->_model->saveItem($this->_arrParam, array('task' => $task));
				if ($this->_arrParam['type'] == 'save-close') 	URL::redirect('admin', 'cart', 'index');
				if ($this->_arrParam['type'] == 'save-new') 		URL::redirect('admin', 'cart', 'form');
				if ($this->_arrParam['type'] == 'save') 			URL::redirect('admin', 'cart', 'form', array('id' => $id));
			}
		}

		$this->_view->arrParam = $this->_arrParam;
		$this->_view->render('cart/form');
	}
	// ACTION: AJAX STATUS (*)
	public function ajaxStatusAction()
	{
		$result = $this->_model->changeStatus($this->_arrParam, array('task' => 'change-ajax-status'));
		echo json_encode($result);
	}
	public function ajaxDeliveryAction()
	{
		$result = $this->_model->changeDelivery($this->_arrParam, array('task' => 'change-ajax-delivery'));
		echo json_encode($result);
	}
	public function ajaxFinishAction()
	{
		$result = $this->_model->changeFinish($this->_arrParam, array('task' => 'change-ajax-finish'));
		echo json_encode($result);
	}

	// ACTION: STATUS (*)
	public function statusAction()
	{
		$this->_model->changeStatus($this->_arrParam, array('task' => 'change-status'));
		URL::redirect('admin', 'cart', 'index');
	}
	public function DeliveryAction()
	{
		$this->_model->changeDelivery($this->_arrParam, array('task' => 'change-delivery'));
		URL::redirect('admin', 'cart', 'index');
	}
	public function FinishAction()
	{
		$this->_model->changeFinish($this->_arrParam, array('task' => 'change-finish'));
		URL::redirect('admin', 'cart', 'index');
	}

	// ACTION: TRASH (*)
	/*
	public function trashAction(){
		$this->_model->deleteItem($this->_arrParam);
		URL::redirect('admin', 'group', 'index');
	}
	*/

	// ACTION: ORDERING (*)
	public function orderingAction()
	{
		$this->_model->ordering($this->_arrParam);
		URL::redirect('admin', 'cart', 'index');
	}
}
