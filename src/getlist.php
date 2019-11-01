<?php

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

$sql = "SELECT hos_name,address,longitude,latitude,beds FROM details";
$result = mysqli_query($conn, $sql);

$results = array();
while($row = mysqli_fetch_assoc($result))
{
  /*
  var x = (λ2-λ1) * Math.cos((φ1+φ2)/2);
  var y = (φ2-φ1);
  var d = Math.sqrt(x*x + y*y) * R;
*/
    $R=6371e3;
    $x = ($_GET["longitude"]-$row["longitude"]);
    $y = ($_GET["latitude"]-$row["latitude"]);

    $row["distance"] = sqrt($x*$x + $y*$y) * $R;

    $results[] = $row;
}

usort($results, function ($item1, $item2) {
    return $item1['distance'] <=> $item2['distance'];
});

foreach ($results as $hospital) {
  echo "<tr>\n";
  echo "<td>".$hospital["hos_name"]."</td>\n";
  echo "<td>".$hospital["address"]."</td>\n";
  echo "<td>".$hospital["beds"]."</td>\n";
  echo "</tr>\n";
}

mysqli_close($conn);
?>
