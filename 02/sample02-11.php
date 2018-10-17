<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    srand(microtime()*1000000);

    for ($i=1; $i <= 5 ; $i++) {
      $imagefile = rand(1,9);
      $imagefile="image".$imagefile.".gif";
      print "<img src='images/$imagefile' hspace='2'>";
    }

     ?>
  </body>
</html>
