<?php
session_start();
if(isset($_POST["username"])){
  $username = $_POST["username"];
  $password = sha1($_POST["password"]);
}

$is_session = false;
if(isset($_SESSION["username"])){
  $username = $_SESSION["username"];
  $password = $_SESSION["key"];

  $is_session = true;
}

$sqlservername = "localhost";
$sqlusername = "icutap";
$sqlpassword = "eGHGTahTLBgrEopR";
$dbname = "icutap";

// Create connection
$conn = new mysqli($sqlservername, $sqlusername, $sqlpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, password FROM users WHERE user = '".$username."'";
$result = mysqli_query($conn, $sql);

$msg = "";
$id = -1;
if(mysqli_num_rows($result)==0){
  $msg = "اسم المستخدم غير موجود.";
}
else{
  $userdata = mysqli_fetch_assoc($result);
  if($password!=$userdata["password"]){
    $msg = "كلمة مرور خاطئة.";
  }
  else{
    $id = $userdata["id"];

    $_SESSION["username"] = $username;
    $_SESSION["key"] = $password;
  }
}

if($is_session && isset($_POST["beds"])){
  $sql = "UPDATE details SET beds=".$_POST["beds"]." WHERE id = ".$id;
  mysqli_query($conn, $sql);
  $msg = "تم تحديث عدد السرائر بنجاح.";
}

$beds=-1;
$hos_name="";
if($id!=-1){
  $sql = "SELECT hos_name, beds FROM details WHERE id = ".$id;
  $result = mysqli_query($conn, $sql);

  $userdata = mysqli_fetch_assoc($result);
  $beds = $userdata["beds"];
  $hos_name = $userdata["hos_name"];
}


mysqli_close($conn);

 ?>
<html dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" type="text/css" href="../styles.css?t=<?php echo time()?>">
  </head>
  <body id="dashboardbody">
    <div id="ardashboardMessage">
<?php
//echo $username;
//echo $password;
if($id==-1)echo $msg;
 ?>
    </div>
 <?php if($id!=-1) {?>
   <div id="logout">
    <a href="signin.php?action=logout" class="buttontext">تسجيل خروج</a>
   </div>

    <form id="numberOfBeds" method="post">
      <div id="numberOfBedsText">
        <?php echo $hos_name; ?>
        <br><br>
        عدد السرائر المتوفرة:
        <input type="number" name="beds" min="0" value="<?php echo $beds; ?>">
      </div>

      <input type="submit" value="تم" id="okDashboard">

      <div style="color: green"> <?php echo $msg; ?></div>
    </form>
    <?php } ?>
  </body>
</html>
