<?php
	include_once("model/Book.php");
	class Model {
		// Model query database để trả về cho controller data hiện ra view
		public function getBookList()
		{
			return array(
				"Jungle Book" => new Book("123Jungle Book", "R. Kipling", "A classic book."),
				"Moonwalker" => new Book("Moonwalker", "J. Walker", ""),
				"PHP for Dummies" => new Book("PHP for Dummies", "Some Smart Guy", "")
			);
		}
		public function getBook($title)
		{
			$allBooks = $this->getBookList();
			return $allBooks[$title];
		}
	}
?>