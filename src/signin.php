<?php
session_start();
if(isset($_GET["action"])){
  unset($_SESSION["username"]);
  unset($_SESSION["key"]);
}
if(isset($_SESSION["username"])){
  header("Location: /bedsdashboard.php");
  exit;
}
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hospital Sign in</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body id="signinbody">
    <form id="signinform" action="/bedsdashboard.php" method="post">
      <div class="signintext">
        Username:
        <input type="text" name="username" value="">
      </div>
      <br>
      <div class="signintext">
        Password:
        <input type="password" name="password" value="">
      </div>

      <input type="submit" value="Login" id="login">
    </form>
  </body>
</html>
