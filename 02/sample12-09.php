<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    if (isset($_POST[btnExec])) {
      if (isset($_POST[inputdata])) {
        print "配信を希望する";
      }else{
        print "配信を希望しない";
      }
      print "<br><br><br>";
    }

    ?>
配信を希望する場合はチェックをつけて[送信]ボタンをクリックして下さい
    <form action="<?=$_SERVER[SCRIPT_NAME]?>" method="post">
      <input type="checkbox" name="inputdata">メールによる配信を希望します
      <input type="submit" name="btnExec" value="送信">
    </form>
  </body>
</html>
