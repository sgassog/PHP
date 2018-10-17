<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    if (isset($_POST[btnExec])) {
      if (strlen($_POST[inputdata])>0) {
        print "テキスト領域に入力されたデータは「".$_POST[inputdata]."」です！";
      }else{
        print "テキスト領域は空欄です！";
      }
      print "<br><br><br>";
    }

    ?>
メッセージを入力して[送信]ボタンをクリックして下さい
    <form action="<?=$_SERVER[SCRIPT_NAME]?>" method="post">
      <textarea name="inputdata" rows="6" cols="40"></textarea>
      <input type="submit" name="btnExec" value="送信">
    </form>
  </body>
</html>
