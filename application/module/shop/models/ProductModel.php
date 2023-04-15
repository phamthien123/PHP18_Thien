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

	public function listItem($arrParam, $option = null){
		if($option['task'] == 'books-detail'){

			$catID		= $arrParam['category_id'];

			$query[]	= "SELECT `id`, `name`, `picture`, `description`, `category_id`,`price`,`sale_off`";
			$query[]	= "FROM `$this->table`";
			$query[]	= "WHERE `status`  = 0";

			if($arrParam['category_id'] != 1){
				$query[]	= "AND `category_id` = '$catID'";
			}
			$query[]	= "ORDER BY `ordering` ASC";
	
			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}
		if($option['task'] == 'books-relate'){
			$bookID		= $arrParam['product_id'];
			$catID		= $arrParam['category_id'];
			
			$query[]	= "SELECT `b`.`id`, `b`.`name`, `b`.`picture`, `b`.`category_id`, `c`.`name` AS `category_name`";
			$query[]	= "FROM `".TBL_PRODUCTS."` AS `b`, `".TBL_CATEGORY."` AS `c`";
			$query[]	= "WHERE `b`.`status`  = 0  AND `c`.`id` = `b`.`category_id` AND `b`.`id` <> '$bookID' AND `c`.`id`  = '$catID'";
			$query[]	= "ORDER BY `b`.`ordering` ASC limit 4";
		
			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}
	}
	
	public function infoItem($arrParam, $option = null){
		if($option['task'] == 'get-cat-name'){
			$query[]	= "SELECT `name`,`id` FROM ".TBL_CATEGORY."";
			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}
		
		if($option['task'] == 'book-info'){
			$query	= "SELECT `b`.`id`, `b`.`name`, `c`.`name` AS `category_name`, `b`.`price`, `b`.`sale_off`, `b`.`picture`, `b`.`description`, `b`.`category_id` FROM `".TBL_PRODUCTS."` AS `b`, `".TBL_CATEGORY."` AS `c` WHERE `b`.`id` = '" . $arrParam['product_id'] . "' AND `c`.`id` = `b`.`category_id`";
			$result	= $this->fetchRow($query);
			return $result;
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
}