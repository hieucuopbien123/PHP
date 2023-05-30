<html>
<head>
  <title>Document</title>
</head>
<body>
  <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
    <select name="start">
      <?php
        for($i = 0; $i <= 10; $i++){
          print("<option>$i</option>");
        }
      ?>
    </select>
    <button type="submit">Submit</button>
  </form>
  <?php
    if(array_key_exists("start", $_GET)){
      $start = $_GET["start"];
      print("Start: $start");
    }
  ?>
</body>
</html>