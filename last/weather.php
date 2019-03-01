<?php
$area = $_POST['area'];
$place = $_POST['place'];
$num = str_pad((int)$_POST['weather'], 6, 0, STR_PAD_LEFT);
if (isset($_COOKIE["weather"][0][0])) {
  if (isset($_COOKIE["weather"][1])) {
    setcookie("weather[2][0]",$_COOKIE["weather"][1][0],time()+60*60*24*365);
    setcookie("weather[2][1]",$_COOKIE["weather"][1][1],time()+60*60*24*365);
    setcookie("weather[2][2]",$_COOKIE["weather"][1][2],time()+60*60*24*365);
  }
  if (isset($_COOKIE["weather"][0])) {
    setcookie("weather[1][0]",$_COOKIE["weather"][0][0],time()+60*60*24*365);
    setcookie("weather[1][1]",$_COOKIE["weather"][0][1],time()+60*60*24*365);
    setcookie("weather[1][2]",$_COOKIE["weather"][0][2],time()+60*60*24*365);
  }
}
$cookie[0] = [$num,$area,$place];
setcookie("weather[0][0]",$num,time()+60*60*24*365);
setcookie("weather[0][1]",$area,time()+60*60*24*365);
setcookie("weather[0][2]",$place,time()+60*60*24*365);
$url = 'http://weather.livedoor.com/forecast/webservice/json/v1?city='.$num;
$json = file_get_contents($url);
$json = json_decode($json,true);

?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?php echo $place; ?>の天気</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">天気予報</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">天気</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">警報・注意報</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <main class="container">
    <h3><?php echo $area.' '.$place; ?>の天気</h3>
    <?php
    echo "<p>".$json['description']['text']."</p>";
    echo "<div class='wt'><table class=\"table table-striped\"><thead><tr><th scope=\"col\">*</th><th scope=\"col\">日時</th><th scope=\"col\">天気</th><th scope=\"col\">最高気温</th><th scope=\"col\">最低気温</th></tr></thead><tbody>";
    $i=0;
    foreach($json['forecasts'] as $val){
      echo "<tr>";
      echo "<th>".$val['dateLabel']."</th>";
      echo "<td>".$val['date']."</td>";
      echo "<td>".$val['telop']."</td>";
      if (isset($val['temperature']['max']['celsius'])&&isset($val['temperature']['max']['celsius'])) {
        echo "<td>".$val['temperature']['max']['celsius']."</td>";
        echo "<td>".$val['temperature']['max']['celsius']."</td>";
      }else{
        echo "<td>配信なし</td>";
        echo "<td>配信なし</td>";
      }

      echo "</tr>";
      $i++;
    }
     ?>
  </main>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
<?php
function weather($data)
{
  echo "<form action=\"weather.php\" method=\"post\">";
  echo "<input type=\"hidden\" name=\"weather\" value=\"".$data."\">";
  echo "<button type=\"submit\" class=\"btn btn-outline-primary\">天気予報</button>";
  echo "</form>";
}
 ?>
