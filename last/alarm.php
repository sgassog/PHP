<?php
$xml = simplexml_load_file($_POST['alarm'], 'SimpleXMLElement', LIBXML_NOCDATA);
$namespace = $xml->getNamespaces(true);
$data = $xml->channel;
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?php echo strstr($data->title," - ",true); ?></title>
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
    <h3><?php echo strstr($data->title," - ",true); ?></h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">地域</th>
          <th scope="col">日時</th>
          <th scope="col">詳細情報</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i=0;
        foreach ($data->item as $value) {
          if ($i==0) {

          }else{
            ?>
            <tr>
              <th><?php echo strstr($value->title,' - ',true); ?></th>
              <td><?php echo strstr($value->description,'、',true); ?></td>
              <td><?php echo ltrim(strstr($value->description,'、',false),'、'); ?></td>
            </tr>
            <?php
          }
          $i++;
        }
        ?>
      </tbody>
    </table>
  </main>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
