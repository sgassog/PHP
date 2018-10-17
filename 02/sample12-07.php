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
        print "テキストボックスに入力されたデータは「".$_POST[inputdata]."」です！";
      }else{
        print "テキストボックスは空欄です！";
      }
      print "<br><br><br>";
    }

    ?>
テキストボックスに値を入力して[送信]ボタンをクリックして下さい
    <form action="<?=$_SERVER[SCRIPT_NAME]?>" method="post">
      <p>名前:<input type="text" name="inputdata" size="40"></p>
      <input type="submit" name="btnExec" value="送信">
    </form>
  </body>
</html>
