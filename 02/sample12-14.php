<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    if (isset($_POST[btnExec])) {
      print "送信ボタンがクリックされました！<br><br>";
    }elseif(isset($_POST[btnCanel])){
      print "キャンセルボタンがクリックされました！<br><br>";
    }

    ?>
    いずれかのボタンをクリックして下さい
    <form action="<?=$_SERVER[SCRIPT_NAME]?>" method="post">
      <input type="submit" name="btnExec" value="送信">
      <input type="submit" name="btnCanel" value="キャンセル">
    </form>
  </body>
</html>
