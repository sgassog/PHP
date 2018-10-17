<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="sample12-03.php" method="post">
      <p>名前:<input type="text" name="username" size="40"></p>
      <input type="submit" name="btnExec" value="POSTで送信">
    </form>
    <form action="sample12-03.php" method="get">
      <p>名前:<input type="text" name="username" size="40"></p>
      <input type="submit" name="btnExec" value="GETで送信">
    </form>
    <?php
    if ($_SERVER[REQUEST_METHOD]=="POST") {
      print "POSTで送信されたデータは<br>";
      print "名前→".$_POST[username]."<br>";
    }elseif ($_SERVER[REQUEST_METHOD]=="GET") {
      print "GETで送信されたデータは<br>";
      print "名前→".$_GET[username]."<br>";
    }
     ?>
  </body>
</html>
