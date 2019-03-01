<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('Location: ./index.php', true);
  exit;
}

require 'sql.php';

if (isset($_POST['no'])) {
  $dt = $_POST['date']." ".$_POST['time'];
  $sql = "UPDATE `Schedule` SET `Event`=:event ,`Details`=:details,`Datetime`=:dt,`Place`=:place WHERE `Id` = :no";
  $stmt = $dbh->prepare($sql);

  $stmt->bindParam(':event', $_POST['event'], PDO::PARAM_STR);
  $stmt->bindParam(':details', $_POST['details'], PDO::PARAM_STR);
  $stmt->bindParam(':dt', $dt, PDO::PARAM_STR);
  $stmt->bindParam(':place', $_POST['place'], PDO::PARAM_STR);
  $stmt->bindParam(':no', $_POST['no'], PDO::PARAM_STR);

  $flag = $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>書籍確認</title>
  <link rel="stylesheet" href="css/uikit.min.css" />
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
      <a class="uk-navbar-item uk-logo" href="index.php">書籍管理アプリ</a>
      <ul class="uk-navbar-nav">
        <li><a href="index.php">メニュー</a></li>
        <li><a href="touroku.php">登録</a></li>
        <li class="uk-active"><a href="kakunin.php">確認</a></li>
        <li><a href="sakuzyo.php">削除</a></li>
        <li><a href="logout.php">ログアウト</a></li>
      </ul>
    </div>
  </nav>
  <div class="uk-container">
    <table class="uk-table uk-table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>タイトル</th>
          <th>登録ISBN</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT `ID`,`Title`,`ISBN` FROM `books` ORDER BY `ID` ASC;";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
          echo "<tr>";
          echo "<td>".$row[0]."</td>";
          echo "<td>".$row[1]."</td>";
          echo "<td>".$row[2]."</td>";
          echo "</tr>";
        }
         ?>
      </tbody>
    </table>
  </div>
  <script src="js/uikit.min.js"></script>
  <script src="js/uikit-icons.min.js"></script>
</body>
</html>
