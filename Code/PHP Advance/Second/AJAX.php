<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Ajax - PHP example</title>
</head>

<body>
  <form name="testForm">
    Input text: <input type="text" onkeyup="doWork();" name="inputText" id="inputText" />
    <br/>
    Output text: <input type="text" name="outputText" id="outputText" />
  </form>
</body>
  <script>
    // # Client server / -> AJAX XMLHttpRequest với PHP
    function getHTTPObject(){
      if (window.ActiveXObject)
        return new ActiveXObject("Microsoft.XMLHTTP");
      else if (window.XMLHttpRequest)
        return new XMLHttpRequest();
      else {
        alert("Your browser does not support AJAX.");
        return null;
      }
    }
    function doWork(){ 
      httpObject = getHTTPObject();
      if (httpObject != null) {
        httpObject.open("GET", "/Code/PHP Advance/toupper.php?inputText=" + document.getElementById('inputText').value, true);
        httpObject.send(null);
        httpObject.onreadystatechange=setOutput;
      }
    }
    function setOutput(){
      // Hàm này gọi từ doWork, mà doWork có httpObject nên dùng dược ở hàm này luôn
      // 0 = uninitialized
      // 1 = loading
      // 2 = loaded
      // 3 = interactive
      // 4 = complete
      if(httpObject.readyState == 4){
        console.log(httpObject.responseText);
        document.getElementById('outputText').value = httpObject.responseText;
      }
    }
  </script>
</html>
