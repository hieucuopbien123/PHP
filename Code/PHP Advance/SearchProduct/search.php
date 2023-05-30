<?php
  $searchName = $_GET['query'];
  $con = mysqli_connect('localhost', 'root', '', 'Product');
  if (mysqli_connect_errno()) {
    die('Could not connect: ' . mysqli_connect_error($con));
  }
  $sql="SELECT Name FROM Product WHERE Name LIKE '%".$searchName."%'";
  $result = mysqli_query($con, $sql);

  while($row = mysqli_fetch_array($result)) {
    echo "<div>";
    echo $row['Name'];
    echo "</div>";
  }
  
  mysqli_close($con);
?>