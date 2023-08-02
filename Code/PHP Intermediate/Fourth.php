<?php
  namespace MyNamespace{
    class MyClass {
      public function myFunction() {
        echo "Hello from MyNamespace!";
      }
    }
    function myFunction2(){
      echo "Hello from MyNamespace2!";
    }
  }
  // Hoặc dùng namespace MyNamespace; và khai báo mọi thứ trong namespace bên dưới. k được tồn tại code ngoài namespace trong 1 file. 1 file chỉ có 1 namespace khai báo ngay trên cùng
?>
