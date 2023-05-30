<body>
  <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
    <input type="checkbox" name="prefer[]" value="1"/>
    <input type="checkbox" name="prefer[]" value="2"/>
    <input type="checkbox" name="prefer[]" value="3"/>
    <button type="submit">Submit</button>
  </form>
  <?php
  
    if(isset($_POST["prefer"])){
      $prefer = $_POST["prefer"];
      foreach($prefer as $item){
        print("$item\n");
      }
    }
    echo "<br>";
    # Basic / Thao tác với array
    $grades = array(1,2,3);
    $students[] = "Jonhson";
    $students[] = "Jackie";
    $students[3] = "Brian"; // mảng có các vị trí [0] [1] [3], truy xuất vị trí 2 sẽ lỗi
    print("$students[0], $students[1], $students[3] \n");

    $scores = array(1=>75, 2=>65);
    foreach($scores as $item){
      print("$item\n");
    }
    sort($scores); // sx và reassign lại thứ tự
    for($i = 0; $i < count($scores); $i++){
      print("$scores[$i] \n");
    }

    $fruits = array("apple" => 1.99, "banana" => 0.99, "orange" => 1.49);
    krsort($fruits);
    foreach ($fruits as $key => $value) {
      echo $key . " costs " . $value . " dollars." . PHP_EOL; // new line character
    }

    $numbers = array(3, 1, 4, 1, 5, 9, 2, 6, 5, 3, 5);
    function cmp($a, $b) {
      if ($a == $b) {
          return 0;
      }
      return ($a < $b) ? -1 : 1;
    }
    usort($numbers, "cmp");
    foreach ($numbers as $value) {
        echo $value . " ";
    }
  ?>
</body>
