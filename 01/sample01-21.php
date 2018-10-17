<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <?php
  $data = 3;
  for ($cnt=0; $cnt <=10 ; $cnt++) {
    print $cnt;

    if ($cnt<=5 and $cnt<=$data) {
      print "●";
    }
    if ($cnt>=8 and $cnt<=$data) {
      print "○";
    }
    if ($cnt>=8 and $cnt <= 10) {
      print "▼";
    }
    if (!($cnt>=8 and $cnt <= 10)) {
      print "▽";
    }
    print "<br>";
  }
  ?>
</body>
</html>
