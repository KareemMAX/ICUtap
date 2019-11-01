<?php
session_start();
if(isset($_GET["action"])){
  unset($_SESSION["username"]);
  unset($_SESSION["key"]);
}
if(isset($_SESSION["username"])){
  header("Location: /ar/bedsdashboard.php");
  exit;
}
 ?>
<html dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>تسجيل دخول المستشفيات</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
  </head>
  <body id="signinbody">
    <form id="signinform" action="bedsdashboard.php" method="post">
      <div class="signintext">
        اسم المستخدم:
        <input type="text" name="username" value="">
      </div>
      <br>
      <div class="signintext">
        كلمة المرور:
        <input type="password" name="password" value="">
      </div>

      <input type="submit" value="تسجيل دخول" id="login">
    </form>
  </body>
</html>
