<?php
class Controller {
	protected $_model;
	protected $_controller;
	protected $_action;
	protected $_template;

	function __construct($model, $controller, $action) {
		// Class này tạo 1 ojbect của model class cần dùng và 1 object của template class. 
		$this->_controller = $controller;
		$this->_action = $action;
		$this->_model = $model;

		$this->$model =new $model;
		$this->_template =new Template($controller,$action);
	}

	function set($name,$value) {
		$this->_template->set($name,$value);
	}

	function __destruct() {
		// Khi destroy, call hàm render của class template để hiển thị view file
		$this->_template->render();
	}
}
