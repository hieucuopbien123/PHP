<?php
  // # Basic / class
  class BaseClass {
    function __construct() {
      print "In BaseClass constructor\n";
    }
  }
  class User extends BaseClass{ 
    public $name = NULL; 
    const MY_CONSTANT = "CONSTANT";
    private $lastLogin; 
    protected static $staticVar = 0;
    public function __construct($name) { 
      parent::__construct();
      $this->name = $name; 
      $this->lastLogin = time(); 
      User::$count++;
    } 
    public function test($test){
      echo "Hello from MyClass: " . $this->name . " " . $test . " " . ++self::$staticVar;
    }
    function getLastLogin() { 
      return(date("M d Y", $this->lastLogin)); 
    } 

    private static $count = 0;
    const VERSION = 2.0;
    function __destruct(){ ++self::$count; }
    static function getCount() { 
      return self::$count; 
    }
  } 


  $class = "User";
  $object1 = new $class("Hieu");
  echo User::getCount();
  $object1->name = "Hell"; // truy cập public var k cần $
  $object1->test($object1::MY_CONSTANT);

  $b = clone $object1; // Nếu gán = bth, đổi $obj4 sẽ đổi $b nên phải clone

  // Attribute overloading trong PHP. Các function __get, __isset, __set, __unset tự động được dùng ngầm khi thao tác với attribute k tồn tại trong object php. Ta có thể viết lại nó trong class tạo ra overloading
  // kiểu mixed có thể là bất cứ loại gì
  class PropertyTest {
    private $data = array();
    public $declared = 1;
    private $hidden = 2;
    // overload attribute
    public function __set($name, $value) {
      echo "Setting '$name' to '$value'<br>"; 
      $this->data[$name] = $value;
    }
    public function __get($name) { 
      echo "Getting '$name'<br>";
      if (array_key_exists($name, $this->data)) {
        return $this->data[$name];
      }
    }
    public function __isset($name) {
      echo "Is '$name' set?<br>";
      return isset($this->data[$name]);
    }
    public function __unset($name) {
      echo "Unsetting '$name'<br>";
      unset($this->data[$name]);
    }
    public function getHidden() {
      return $this->hidden;
    }
  }

  $obj = new PropertyTest;
  $obj->a = 1;
  echo "<br>".$obj->a."<br>";
  var_dump(isset($obj->a)); // in ra thông tin biến boolean

  unset($obj->a);
  var_dump(isset($obj->a));
  echo "<br>";

  // Method overloading: __call cho hàm bth, __callStatic cho hàm static. Gọi mà k có trong class
  class MethodTest {
    public function __call($name, $arguments) {
      echo "Calling object method '$name' " . implode(', ', $arguments) . "<br>";
    }
    public static function __callStatic($name, $arguments) {
      echo "Calling static method '$name' " . implode(', ', $arguments) . "<br>";
    }
  }
  $obj = new MethodTest;
  $obj->runTest('in object context');
  MethodTest::runTest('in static context');

  // VD2: mỗi khi gọi hàm sẽ lưu giá trị key val vào biến static nên như là attribute static lấy gt
  class Foo {
    static $vals;
    public static function __callStatic($func, $args) {
      if (!empty($args)) {
        self::$vals[$func] = $args[0];
      } else {
        return self::$vals[$func];
      }
    }
  }
  Foo::username('john');
  print Foo::username(); // prints 'john'

  // autoloading function chỉ giúp include ngầm vào nếu vào phải class k tồn tại
  function my_autoloader($class) {
    include 'classes/' . $class . '.class.php';
    // Nếu k dùng include, có thể dùng __autoloader là tên hàm mặc định
  }
  spl_autoload_register('my_autoloader');
  $obj = new MyClass(); // Class k tồn tại nên tự include 'classes/MyClass.class.php'
?>