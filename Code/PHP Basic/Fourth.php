<html>
<head>
  <title>Lab 3-1 GHT</title>
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
  <p>Enter name and birthday:</p>

  <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
    <table>
      <tr>
        <td>
          <label>Name1:</label>
        </td>
        <td>
          <input type="text" placeholder="Input your name" name="name1" value="" required>
        </td>
      </tr>
      <tr>
        <td>
          <label>Name2:</label>
        </td>
        <td>
          <input type="text" placeholder="Input your name" name="name2" value="" required>
        </td>
      </tr>
      <tr>
        <td>
          <label>Birthday1:</label>
        </td>
        <td>
          <input type="date" name="birthday1" required>
        </td>
      </tr>
      <tr>
        <td>
          <label>Birthday2:</label>
        </td>
        <td>
          <input type="date" name="birthday2" required>
        </td>
      </tr>
    </table>
    <div style="padding-top: 10px;"></div>
    <button type="reset">Reset</button>
    <button type="submit">Submit</button>
  </form>

  <div style="padding-top: 10px;"></div>
  
  <?php
    if(isset($_POST["name1"])){
      $name1 = $_POST["name1"];
      $name2 = $_POST["name2"];
      $birthday1 = $_POST["birthday1"];
      $birthday2 = $_POST["birthday2"];

      $format = "Y-m-d";
      
      $birthday1_obj = DateTime::createFromFormat($format, $birthday1); // class DateTime có sẵn của php
      if($birthday1_obj){
        list($year2, $month2, $day2) = explode('-', $birthday2);

        if(checkdate($month2, $day2, $year2)) {
          $dateTime1 = new DateTime($birthday1);
          $dateTime2 = new DateTime($birthday2);

          $diffFirstPerson = (new DateTime())->diff($dateTime1);
          $diffSecondPerson = (new DateTime())->diff($dateTime2);
          if($diffFirstPerson->invert != 1 || $diffSecondPerson->invert != 1){
            // invert của riêng DateTimeInterface giúp xđ diff của 2 time âm hay dương
            echo("Invalid date");
            return;
          }

          $formattedDate1 = $dateTime1->format('l, F j, Y');
          $formattedDate2 = $dateTime2->format('l, F j, Y');
          echo "Date 1: $formattedDate1";
          echo "<br>Date 2: $formattedDate2";

          $differenceDate = ($dateTime1->diff($dateTime2))->days;
          $differenceYear = ($dateTime1->diff($dateTime2))->y;
          echo "<br>Date difference: $differenceDate days";
          echo "<br>Year difference: $differenceYear years";

          $ageFirstPerson = $diffFirstPerson->y;
          $ageSecondPerson = $diffSecondPerson->y;
          echo "<br>Age of first person: $ageFirstPerson";
          echo "<br>Age of second person: $ageSecondPerson";
        }
      } else {
        echo "Invalid date";
      }

      // lấy year của date
      $year = date('Y', strtotime($birthday1)); 
      echo "<br>Year: $year";
    } else {
      echo "Invalid date";
    }
  ?>

</body>
</html>