<?php
$xml = 'http://weather.livedoor.com/forecast/rss/primary_area.xml';
$xml = simplexml_load_file($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
$namespace = $xml->getNamespaces(true);
$pref_city = $xml->channel->children($namespace['ldWeather'])->source->children()->pref;
// var_Dump($pref_city);

?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>トップ</title>
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
            <a class="nav-link" href="#">天気</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">警報・注意報</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <main class="container">
    <div id="accordion">
      <h3>最後にアクセスしたページ</h3>
      <div class="row">

        <?php
        for ($i=0; $i < 3; $i++) {
          if (!isset($_COOKIE["weather"][0][0])) {
            echo "<div class=\"col-sm\"><h4>閲覧履歴はありません</h4></div>";
            break;
          }
          if (isset($_COOKIE["weather"][$i][0])) {
            last_weather_card($_COOKIE["weather"][$i][1],$_COOKIE["weather"][$i][2],$_COOKIE["weather"][$i][0]);
          }
        }
        function last_weather_card($area,$place,$data)
        {
          echo "<div class=\"col-sm\">
          <div class=\"card\" style=\"width: 18rem;\"><div class=\"card-body\"><h4 class=\"card-title\">".$area."</h4><h5 class=\"card-subtitle mb-2 text-muted\">".$place."</h5>";
          last_weather($data,$place,$area);
          echo "</div></div></div>";
        }
        function last_weather($data,$place,$area)
        {
          echo "<form action=\"weather.php\" method=\"post\">";
          echo "<input type=\"hidden\" name=\"weather\" value=\"".$data."\">";
          echo "<input type=\"hidden\" name=\"place\" value=\"".$place."\">";
          echo "<input type=\"hidden\" name=\"area\" value=\"".$area."\">";
          echo "<button type=\"submit\" class=\"btn btn-outline-primary\">".$place."の天気予報</button>";
          echo "</form>";
        }
        ?>
      </div>
      <h3 class='m10'>地域</h3>
      <?php
      $i=0;
      echo "<div class='wt'><table class=\"table table-striped\"><thead><tr><th scope=\"col\">地域</th><th scope=\"col\">詳細地域・天気</th><th scope=\"col\">警報・注意報</th></tr></thead><tbody>";
      foreach($pref_city as $val){
        echo "<tr>";
        echo "<th>".$val->attributes()->title."</th>";
        echo "<td>";
        Weather($i);
        echo"</td>";
        echo "<td>";
        Alarm_warning($val->warn->attributes()->source);
        echo"</td>";
        echo "</tr>";

        // WetherTable($val);
        $i++;
      }
      ?>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
<?php



function Weather($num)
{
  echo "<form action=\"area.php\" method=\"post\">";
  echo "<input type=\"hidden\" name=\"weather\" value=\"".$num."\">";
  echo "<button type=\"submit\" class=\"btn btn-outline-primary\">詳細地域一覧</button>";
  echo "</form>";
}

function Alarm_warning($data)
{
  echo "<form action=\"alarm.php\" method=\"post\">";
  echo "<input type=\"hidden\" name=\"alarm\" value=\"".$data."\">";
  echo "<button type=\"submit\" class=\"btn btn-outline-danger\">警報・注意報</button>";
  echo "</form>";
}
