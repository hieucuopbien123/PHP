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
  <p>Enter yourname and select date and time for the appointment</p>

  <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
    <table>
      <tr>
        <td>
          <label>Your name:</label>
        </td>
        <td>
          <input type="text" placeholder="Input your name" name="name" value="" required>
        </td>
      </tr>
      <tr>
        <td>
          <label>Date:</label>
        </td>
        <td>
          <input type="number" name="day" min="1" max="31" required placeholder="Day">
          <input type="number" name="month" min="1" max="12" required placeholder="Month">
          <input type="number" name="year" required placeholder="Year">
        </td>
      </tr>
      <tr>
        <td>
          <label>Time:</label>
        </td>
        <td>
          <input type="number" name="hour" min="0" max="23" required placeholder="Hour">
          <input type="number" name="minute" min="0" max="59" required placeholder="Minute">
          <input type="number" name="second" min="0" max="59" required placeholder="Second">
        </td>
      </tr>
    </table>
    <button type="reset">Reset</button>
    <button type="submit">Submit</button>
  </form>

  <?php
    class DateTimeProcessing {
      private $hour;
      private $minute;
      private $second;
      private $day;
      private $month;
      private $year;

      public function __construct($hour, $minute, $second, $day, $month, $year) {
        if (!checkdate($month, $day, $year)) { // built-in function
          throw new Exception('Invalid date');
        }
        $this->hour = $hour;
        $this->minute = $minute;
        $this->second = $second;
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
      }

      public function get12HourFormat() {
        $meridiem = 'AM';
        $hour = $this->hour;
        if ($hour >= 12) {
          $meridiem = 'PM';
          $hour -= 12;
        }
        if ($hour == 0) {
          $hour = 12;
        }
        // Khi cần căn lề
        return sprintf('%02d:%02d:%02d %s', $hour, $this->minute, $this->second, $meridiem);
      }

      public function getMonthDays() {
        switch ($this->month) {
          case 2:
            if ($this->isLeapYear()) {
              return 29;
            } else {
              return 28;
            }
          case 4:
          case 6:
          case 9:
          case 11:
            return 30;
          default:
            return 31;
        }
      }

      private function isLeapYear() {
        if ($this->year % 4 != 0) {
          return false;
        } else if ($this->year % 400 == 0) {
          return true;
        } else if ($this->year % 100 == 0) {
          return false;
        } else {
          return true;
        }
      }
    }

    if(array_key_exists("name", $_POST) && $_POST["name"] != null){
      try {
        $date = new DateTimeProcessing($_POST["hour"], $_POST["minute"], $_POST["second"], $_POST["day"], $_POST["month"], $_POST["year"]);
        
        $name = $_POST["name"];
        echo "Hi $name!";
        echo "<br>You have choose to have an appointment on ".$_POST["hour"].":".$_POST["minute"].":".$_POST["second"].", ".$_POST["day"]."/".$_POST["month"]."/".$_POST["year"]."<br>";
        echo "<br>More information<br>";
        $reformatdate = $date->get12HourFormat();
        echo "<br>In 12 hours, the time and date is $reformatdate, ".$_POST["day"]."/".$_POST["month"]."/".$_POST["year"]."<br>";
        $monthdays = $date->getMonthDays();
        echo "<br>This month has $monthdays days!"; 
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    } ?>

</body>
</html>