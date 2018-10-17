<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    if (isset($_POST[btnExec])) {
      extract($_REQUEST,EXTR_SKIP|EXTR_PREFIX_ALL|EXTR_REFS,"rcv");
      $num = 1;
      foreach ($rcv_inputdata as $data) {
        print "$num 個めのチェックボックス→ ";
        print $data."<br>";
        $num++;
      }
      print "<br><br>";
    }

    ?>
    テキストボックスに値を入力して[送信]ボタンをクリックして下さい（複数入力可）
    <form action="<?=$_SERVER[SCRIPT_NAME]?>" method="post">
      <p><input type="text" name="inputdata[]"></p>
      <p><input type="text" name="inputdata[]"></p>
      <p><input type="text" name="inputdata[]"></p>
      <p><input type="text" name="inputdata[]"></p>
      <input type="submit" name="btnExec" value="送信">
    </form>
  </body>
</html>
