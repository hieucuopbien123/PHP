<?php
  // Code server: do ở cùng file với client nên chỉ chạy khi có request gửi vào url là file hiện tại. Đó là MVC chuẩn, còn việc tách như NodeJS chỉ là Model Controller thôi
  if (isset($_GET['inputText']))
    echo strtoupper($_GET['inputText']);
  // Phía client gửi request qua AJAX để nhận về response. Khi đó server echo ra cái gì, client nhận được nó như là responseText 
?>