<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    srand(microtime()*1000000);

    for ($i=1; $i <= 10 ; $i++) {
      $password="";
      for ($j=1; $j <=5 ; $j++) {
        $password = $password.rand(1,9);
      }
      for ($j=1; $j <=5 ; $j++) {
        $password = $password.chr(rand(65,90));
      }
      print $password;
      print "<br>";
    }

     ?>
  </body>
</html>
