<html><head><title>Create Table</title></head><body>
<?php
  // # Connect DB
  $server = 'localhost';
  $user = 'root';
  $pass = '';
  $mydb = 'testdb1';
  $table_name = 'testtable1'; // k thể tạo bảng nếu bảng đã tồn tại
  $connect = mysqli_connect($server, $user, $pass, $mydb); // added $mydb parameter
  if(!$connect) {
    die ("Cannot connect to $server using $user");
  } else {
    $SQLcmd = "
      -- CREATE TABLE $table_name (
      --   ProductID INT UNSIGNED NOT NULL
      --   AUTO_INCREMENT PRIMARY KEY,
      --   Product_desc VARCHAR(50),
      --   Cost INT
      -- );
      
      -- INSERT INTO $table_name VALUES
      -- ('Name1',1);
    ";
    if(mysqli_query($connect, $SQLcmd)){
      print '<font size="4" color="blue" >Created Table';
      print "<i>$table_name</i> in database<i>$mydb</i><br></font>";
      print "<br>SQLcmd=$SQLcmd"; // dùng "" với biến bên trong như này là tiện nhất
    } else {
      die ("Table Create Creation Failed SQLcmd=$SQLcmd");
    }
    mysqli_close($connect);
  }

  // Retrieve data: lấy id rồi dùng mysqli_fetch_row để lấy data chi tiết
  $connect = mysqli_connect('localhost', 'root', '', $mydb);
  $SQLcmd = "SELECT * FROM $table_name";
  $results_id = mysqli_query($connect, $SQLcmd);
  if ($results_id) {
    print '<table border=1>';
    print '<th>Num<th>Product<th>Cost<th>Weight<th>Count';
    while($row = mysqli_fetch_row($results_id)){
      print '<tr>';
      foreach ($row as $field) {
        print "<td>$field</td> ";
      }
      print '</tr>';
    }
  } else { die ("Query=$query failed!"); }
  mysqli_close($connect);
?>
</body></html>
