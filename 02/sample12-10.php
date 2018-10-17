<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    if (isset($_POST[btnExec])) {
      for ($i=1; $i <=4 ; $i++) {
        if (isset($_POST["inputdata$i"])) {
          print "$i 個めのチェックボックスはON<br>";
        }else{
          print "$i 個めのチェックボックスはOFF<br>";
        }
        print "<br><br>";
      }
    }

    ?>
開発経験のある言語にチェックをつけて[送信]ボタンをクリックして下さい
    <form action="<?=$_SERVER[SCRIPT_NAME]?>" method="post">
      <p><input type="checkbox" name="inputdata1">PHP</p>
      <p><input type="checkbox" name="inputdata2">Java</p>
      <p><input type="checkbox" name="inputdata3">CGI</p>
      <p><input type="checkbox" name="inputdata4">C++</p>
      <input type="submit" name="btnExec" value="送信">
    </form>
  </body>
</html>
