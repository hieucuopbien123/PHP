<?php
include_once("model/Model.php");

class Controller {
	public $model;
	public function __construct()  
	{  
		$this->model = new Model();
		// Controller tương tác với model
	} 
	public function invoke()
	{
		if (!isset($_GET['book'])) {
			$books = $this->model->getBookList();
			// include sẽ như kiểu copy paste code vào vị trí này
			include 'view/booklist.php';
		}
		else {
			$book = $this->model->getBook($_GET['book']);
			include 'view/viewbook.php';
		}
	}
}

?>