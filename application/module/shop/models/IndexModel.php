<?php
class IndexModel extends Model
{

	private $_columns = array(
		'id',
		'username',
		'email',
		'fullname',
		'password',
		'created',
		'created_by',
		'modified',
		'modified_by',
		'register_date',
		'register_ip',
		'status',
		'ordering',
		'group_id'
	);

	public function __construct()
	{
		parent::__construct();
		$this->setTable(TBL_USER);
	}

	public function saveItem($arrParam, $option = null)
	{
		if ($option['task'] == 'user-register') {
			$arrParam['form']['password']		= md5($arrParam['form']['password']);
			$arrParam['form']['register_date']	= date("Y-m-d H:m:s", time());
			$arrParam['form']['register_ip']	= $_SERVER[REMOTE_ADDR];
			$arrParam['form']['status']			= 0;
			$data	= array_intersect_key($arrParam['form'], array_flip($this->_columns));
			$this->insert($data);
			return $this->lastID();
		}
	}

	public function infoItem($arrParam, $option = null)
	{
		if ($option == null) {
			$email		= $arrParam['form']['email'];
			$password	= md5($arrParam['form']['password']);
			$query[]	= "SELECT `u`.`id`, `u`.`fullname`, `u`.`email`, `u`.`username`, `u`.`group_id`, `g`.`group_acp`";
			$query[]	= "FROM `user` AS `u` LEFT JOIN `group` AS g ON `u`.`group_id` = `g`.`id`";
			$query[]	= "WHERE `email` = '$email' AND `password` = '$password'";

			$query		= implode(" ", $query);
			$result		= $this->fetchRow($query);
			return $result;
		}
	}

	public function listCategory($arrParam, $option = null){
		if($option['task'] == 'list-Nam'){
			$query[]	= "SELECT `name`";
			$query[]	= "FROM " . TBL_CATEGORY . "";
	
			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}
		if($option['task'] == 'list-Nu'){
			$query[]	= "SELECT `name`";
			$query[]	= "FROM " . TBL_CATEGORYNU . "";
		
			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}
		if($option['task'] == 'list-Rss'){
			$query[]	= "SELECT `name`";
			$query[]	= "FROM " . TBL_RSS . "";
		
			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}
	}
	public function listItem($arrParam, $option = null){
		if($option['task'] == 'product-special'){
			$query[]	= "SELECT `name`,`price`,`picture`,`sale_off`";
			$query[]	= "FROM " . TBL_PRODUCTS . "";
			$query[]	= "WHERE `prominent` = 1 LIMIT 6";
	
			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}
		if($option['task'] == 'product-new'){
			$query[]	= "SELECT `name`,`price`,`picture`,`sale_off`";
			$query[]	= "FROM " . TBL_PRODUCTS . "";
			$query[]	= "ORDER by `id` DESC LIMIT 4";
		
			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}
	}

	public function listProductRand($arrParam)
	{
		$query[]	= "SELECT *";
		$query[]	= "FROM " . TBL_PRODUCTS . "";
		$query[]	= "ORDER by RAND() LIMIT 4";
		$query		= implode(" ", $query);
		$result		= $this->fetchAll($query);
		return $result;
	}

	public function listNews($arrParam)
	{
		$query[]	= "SELECT `title`,`picture`,`content`";
		$query[]	= "FROM " . TBL_NEWS . "";

		$query		= implode(" ", $query);
		$result		= $this->fetchAll($query);
		return $result;
	}
}