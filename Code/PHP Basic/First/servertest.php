<html>
<head>
  <title> Receiving Input </title> 
</head>
<body>
  <!-- # Client server -->
  <?php
    error_reporting(E_ERROR | E_PARSE);
    $test=$_REQUEST["firstname"]; // $_REQUEST cũng được
    print("<br>Your full name is $test");
    $fullname = $_POST["firstname"] . " " . $_POST["lastname"]; // Tương tự $_GET[""]
    $pass = $_POST["pass"];
    $gender = $_POST["gender"];
    $description = $_POST["description"];
    $vehicles = $_POST["vehicles"];
    $animals1 = $_POST["animals1"];
    $animals2 = $_POST["animals2"];
    $animals3 = $_POST["animals3"];
    $animals4 = $_POST["animals4"];
    $birthday = $_POST["birthday"];
    $favcolor = $_POST["favcolor"];

    print("<br>Your full name is $fullname");
    print("<br>You entered your password, which is $pass");
    print("<br>You are $gender");
    print("<br>Your favorite animals:<ul>");
    if(!is_null($animals1)){
      print ("<li>$animals1</li>");
    }
    if(!is_null($animals2)){
      print ("<li>$animals2</li>");
    }
    if(!is_null($animals3)){
      print ("<li>$animals3</li>");
    }
    if(!is_null($animals4)){
      print ("<li>$animals4</li>");
    }
    print("</ul>");
    print("<br>Description: $description");
    print("<br>You often go to school by $vehicles");
    print("<br>Your email address is $description");
    print("<br>DoB: $birthday");
    print("<br>You love color $favcolor");
  ?>
</body>