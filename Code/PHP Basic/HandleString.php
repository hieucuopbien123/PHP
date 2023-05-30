<html>
<head>
  <title>Lab 3-2.1 GHT</title>
  <style>
    input[type="number"]{
      width: 100px;
    }
    input[type="text"]{
      min-width: 307px;
    }
  </style>
</head>
<body>
  <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
    <label>Input value with suffix "rad" or "deg":</label>
    <input placeholder="Example: 90deg or 3rad" name="factor">
    <button type="reset">Reset</button>
    <button type="submit">Submit</button>
  </form>

  <?php
    function radians_to_degrees($radians) {
      return $radians * 180 / pi();
    }

    function degrees_to_radians($degrees) {
      return $degrees * pi() / 180;
    }

    // isset check biến được set và khác null
    if(isset($_POST['factor'])) {
      $factor = $_POST['factor'];
      $result = "";

      if(strpos($factor, "rad") !== false) {
        $degrees = radians_to_degrees(floatval($factor));
        $result = "$factor = $degrees deg";
      } elseif(strpos($factor, "deg") !== false) {
        $radians = degrees_to_radians(floatval($factor));
        $result = "$factor = $radians rad";
      } else {
        $result = "Invalid input. Please enter a value in radians or degrees.";
      }

      echo $result;
    }
  ?>

</body>
</html>