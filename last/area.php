<?php
$num = (int)$_POST['weather'];
$xml = 'http://weather.livedoor.com/forecast/rss/primary_area.xml';
$xml = simplexml_load_file($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
$namespace = $xml->getNamespaces(true);
$pref_city = $xml->channel->children($namespace['ldWeather'])->source->children()->pref[$num];

?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?php echo $pref_city->attributes()->title; ?></title>
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
    <h3><?php echo $pref_city->attributes()->title; ?></h3>
    <?php
    echo "<div class='wt'><table class=\"table table-striped\"><thead><tr><th scope=\"col\">地域</th><th scope=\"col\">天気</th></tr></thead><tbody>";
    foreach($pref_city->city as $val){
      echo "<tr>";
      echo "<th>".$val->attributes()->title."</th>";
      echo "<td>";
      weather($val->attributes()->id,$val->attributes()->title,$pref_city->attributes()->title);
      echo"</td>";
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
function weather($data,$place,$area)
{
  echo "<form action=\"weather.php\" method=\"post\">";
  echo "<input type=\"hidden\" name=\"weather\" value=\"".$data."\">";
  echo "<input type=\"hidden\" name=\"place\" value=\"".$place."\">";
  echo "<input type=\"hidden\" name=\"area\" value=\"".$area."\">";
  echo "<button type=\"submit\" class=\"btn btn-outline-primary\">天気予報</button>";
  echo "</form>";
}
 ?>
