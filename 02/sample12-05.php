<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php

    if (isset($_POST[btnExec])) {
      $name = $_POST[username];
      $address = $_POST[useraddress];
      print "送信されたデータは<br>";
      print "名前→".$_POST[username]."<br>";
      print "住所→".$_POST[useraddress]."<br>";
      print "<br><br>";
    } ?>

    名前と住所を入力して[送信]ボタンをクリックして下さい
    <form action="<?=$_SERVER[SCRIPT_NAME]?>" method="post">
      <p>名前:<input type="text" name="username" size="40" value="<?=name?>"></p>
      <p>住所:<input type="text" name="useraddress" size="40" value="<?=address?>"></p>
      <input type="submit" name="btnExec" value="送信">
    </form>
  </body>
</html>
