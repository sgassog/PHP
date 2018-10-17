<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    if (isset($_POST[btnExec])) {
      if (isset($_POST[seldata])) {
        print "選択された項目は「".$_POST[seldata]."」です！";
      }else{
        print "いずれの項目も選択されていません！";
      }
      print "<br><br><br>";
    }

    ?>
    リストボックスのいずれかの項目を選択して[送信]ボタンをクリックして下さい
    <form action="<?=$_SERVER[SCRIPT_NAME]?>" method="post">
      <select name="seldata" size="6">
        <option value="ブラジル">ブラジル</option>
        <option value="イタリア">イタリア</option>
        <option value="アルゼンチン">アルゼンチン</option>
        <option value="フランス">フランス</option>
        <option value="イングランド">イングランド</option>
        <option value="オランダ">オランダ</option>
      </select>
      <input type="submit" name="btnExec" value="送信">
    </form>
  </body>
</html>
