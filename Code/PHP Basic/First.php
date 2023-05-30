<!-- # Basic -->
<?php
  require("Second.php");// or include
  
  // Có thể truyền seed vào thì gọi rand() sẽ khác nhau mỗi lần, để mặc định thì rand() sẽ ra chuỗi số giống nhau
  srand((double)microtime() * 100000);
  $a = rand();
  echo "$a<br>";

  echo "Hello\n"; // Muốn xuống dòng phải dùng thẻ br 
  $name=trim("  Hello World ");
  $name=$name . " nha<br/>"; 
?>

<?php
  print("name=$name");
  $nameLength = strlen(substr($name, 0, 5));
  print("NameLength: $nameLength");

  $compareStr = $name == "Hello";
  print("Compare string: $compareStr");

  // Có thể render ra tag html, khi cần dùng dấu " thì thêm \
  print("<div>Hello</div>");
  print ("<font color=\"blue\">");

  $abc = 1;
  $abc = $abc + 3; // k có cộng string
  print("$abc");

  if(1 != 1){ die("you're not listening to me!"); } elseif(1 == 1){  } else { }
  
  print("<br>abs: ".abs(-1));
  print("<br>sqrt: ".sqrt(-1));
  print("<br>round: ".round(1.2)); // làm tròn gần nhất
  print("<br>is_numeric: ".is_numeric(-1));
  print("<br>rand: ".rand(1, 10));
  print("<br>date: ".date("Y y M m D d H h F i I L s t U w z"));
  print("<br>microtime: ".microtime()); // trả từ unix epoch <msec là phần fraction> <phần sec>
  print("<br>casting: ".((double) microtime()*100000)); // msec và sec tạo 1 số double
  echo "First ", "second ", "third ";

  $message1="Row $i Col 1";
  $returnVal = OutputTableRow( $message1, 123 );
  printf("The value of abc is %d", $returnVal);
?>

<?php
  // phpinfo();