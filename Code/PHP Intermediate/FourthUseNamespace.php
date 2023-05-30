<?php
  // # Basic
  include "Fourth.php";

  $myClass = new MyNamespace\MyClass();
  $myClass->myFunction();

  // Trong PHP cũng có cái Introspection => là cái giúp lấy mọi thông tin của class và object hiện đang có trong code php mà ta có thể dùng 
  function display_classes() { 
    $classes = get_declared_classes(); 
    foreach($classes as $class) {
      echo "Showing information about $class<br />"; 
      echo "$class methods:<br />"; 
      $methods = get_class_methods($class); 
      if(!count($methods)) { 
        echo "<i>None</i><br />"; 
      } else { 
        foreach($methods as $method) { 
          echo "<b>$method</b>( )<br />"; 
        } 
      } 
      echo "$class attributes:<br />"; 
      $attributes = get_class_vars($class); 
      if(!count($attributes)) { 
        echo "<i>None</i><br />"; 
      } 
      else { 
        foreach(array_keys($attributes) as $attribute) { 
          echo "<b>\$$attribute</b><br />"; 
        } 
      } 
      echo "<br />"; 
    }
  }
  display_classes();
  // Tương tự cũng có với object is_object(object), get_class(object), method_exists(object, method), get_object_vars( object), get_parent_class(object)
?>