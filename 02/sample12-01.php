<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="sample12-01.php" method="post">
      <p>名前:<input type="text" name="username" size="40"></p>
      <p>住所:<input type="text" name="useraddress" size="40"></p>
      <input type="submit" name="btnExec" value="送信">
    </form>

    <?php
    print "POSTで送信されたデータは<br>";
    print "名前→".$_POST[username]."<br>";
    print "住所→".$_POST[useraddress]."<br>";
     ?>
  </body>
</html>
