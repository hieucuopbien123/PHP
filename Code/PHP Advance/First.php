<?php
  class TestClass { }
  $testArr = array();
  $eleTest = new TestClass();
  $testArr[] = $eleTest;
  foreach($testArr as $ele){
    if($ele instanceof TestClass){
      echo "instanceof: Yes";
    }
  }
  $arr1 = array(1, 3);
  $arr2 = array(1, 2);
  $diffArr = array_diff($arr1, $arr2); // 1 có gì mà 2 k có
  print_r($diffArr);


  
?>