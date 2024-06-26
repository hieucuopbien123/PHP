<?php
class Model extends SQLQuery {
	// Kế thừa SQLQuery class giúp connect database ngay trong constructor, chỉ cần tạo instance mà dùng
	protected $_model;

	function __construct() {
		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = get_class($this);
		$this->_table = strtolower($this->_model)."s";
	}

	function __destruct() {
	}
}
