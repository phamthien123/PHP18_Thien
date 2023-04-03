<?php
class ProductModel extends Model{
	
	private $_columns = array('id', 'name', 'description', 'price', 'sale_off', 'picture','created', 'created_by', 'modified', 'modified_by', 'status', 'ordering', 'category_id');
	private $_userInfo;
	
	public function __construct(){
		parent::__construct();
			
		$this->setTable(TBL_PRODUCTS);
		$userObj 			= Session::get('user');
		if (isset($userObj['info'])) {
			$this->_userInfo 	= $userObj['info'];
		}
	}
	public function countItem($arrParam, $option = null){
	
		$query[]	= "SELECT COUNT(`id`) AS `total`";
		$query[]	= "FROM `$this->table`";
		$query[]	= "WHERE `id` > 0";
		
		$query		= implode(" ", $query);
		$result		= $this->fetchRow($query);
		return $result['total'];
	}

	public function listItem($arrParam, $option = null){
		if($option['task'] == 'books-in-cat'){
			$catID		= $arrParam['category_id'];
			$query[]	= "SELECT `id`, `name`,`price`,`sale_off`,  `picture`, `description`, `category_id`";
			$query[]	= "FROM `$this->table`";
			$query[]	= "WHERE `status`  = 0 AND `category_id` = '$catID'";
			$query[]	= "ORDER BY `ordering` ASC";
	
			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}

		if($option['task'] == 'books-in-3'){
			$query[]	= "SELECT `id`, `name`,`price`,`sale_off`,  `picture`, `description`, `category_id`";
			$query[]	= "FROM `$this->table`";
			$query[]	= "WHERE `status`  = 0 ";
			$query[]	= "ORDER BY `ordering` ASC Limit 3";
	
			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}
		
		if($option['task'] == 'books-relate'){
			$bookID		= $arrParam['book_id'];
			$catID		= $arrParam['category_id'];
			
			$query[]	= "SELECT `b`.`id`, `b`.`name`, `b`.`picture`, `b`.`category_id`, `c`.`name` AS `category_name`";
			$query[]	= "FROM `".TBL_BOOK."` AS `b`, `".TBL_CATEGORY."` AS `c`";
			$query[]	= "WHERE `b`.`status`  = 1  AND `c`.`id` = `b`.`category_id` AND `b`.`id` <> '$bookID' AND `c`.`id`  = '$catID'";
			$query[]	= "ORDER BY `b`.`ordering` ASC";
		
			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}
		$pagination			= $arrParam['pagination'];
		$totalItemsPerPage	= $pagination['totalItemsPerPage'];
		if($totalItemsPerPage > 0){
			$position	= ($pagination['currentPage']-1)*$totalItemsPerPage;
			$query[]	= "LIMIT $position, $totalItemsPerPage";
		}

		$query		= implode(" ", $query);
		$result		= $this->fetchAll($query);
		return $result;
	}
	
	public function infoItem($arrParam, $option = null){
		if($option['task'] == 'get-cat-name'){
			$query[]	= "SELECT `name`,`id` FROM ".TBL_CATEGORY."";
			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}
		
		if($option['task'] == 'book-info'){
			$query	= "SELECT `b`.`id`, `b`.`name`, `c`.`name` AS `category_name`, `b`.`price`, `b`.`sale_off`, `b`.`picture`, `b`.`description`, `b`.`category_id` FROM `".TBL_BOOK."` AS `b`, `".TBL_CATEGORY."` AS `c` WHERE `b`.`id` = '" . $arrParam['book_id'] . "' AND `c`.`id` = `b`.`category_id`";
			$result	= $this->fetchRow($query);
			return $result;
		}
	}
}