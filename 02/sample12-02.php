<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="sample12-02.php" method="get">
      <p>名前:<input type="text" name="username" size="40"></p>
      <p>住所:<input type="text" name="useraddress" size="40"></p>
      <input type="submit" name="btnExec" value="送信">
    </form>
    <?php
    print "GETで送信されたデータは<br>";
    print "名前→".$_GET[username]."<br>";
    print "住所→".$_GET[useraddress]."<br>";
     ?>
  </body>
</html>
