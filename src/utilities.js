function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

async function showPosition(position) {
  const response = await fetch('/getlist.php?longitude='+position.coords.longitude.toString()+'&latitude='+position.coords.latitude.toString());
  response.text().then(function (text) {
    document.getElementById("hospitalList").innerHTML += text;
});

}

getLocation()
