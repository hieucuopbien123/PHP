<?php	

// Chủ động k có thẻ đóng php để tránh extra whitespace ở output, theo coding style của Zend

// Ở đây set giá trị cho 2 biến môi trường và lấy url từ request vì trong request tới có path là index.php?url=PATHNAME
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

$url = $_GET['url'];

// Thêm file bootstrap.php từ library vào 
require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');
