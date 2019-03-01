<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('Location: ./index.php', true);
  exit;
}

require 'sql.php';
if (isset($_POST['id'])){
  $sql = "DELETE FROM `books` WHERE `Id` = :id";
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
  $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>書籍情報削除</title>
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
        <li><a href="kakunin.php">確認</a></li>
        <li class="uk-active"><a href="sakuzyo.php">削除</a></li>
        <li><a href="logout.php">ログアウト</a></li>
      </ul>
    </div>
  </nav>
  <div class="uk-container">
    <?php if (isset($_POST['id'])):?>
      <div class="uk-alert-danger" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>予定を削除しました</p>
      </div>
    <?php endif; ?>
    <?php
    $sql = "SELECT `ID`,`Title`,`ISBN` FROM `books` ORDER BY `Title` ASC;";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();?>
    <form action="<?=$_SERVER["SCRIPT_NAME"]?>" method="post">
      <div class="uk-margin">
        <select class="uk-select" name="id">
          <option></option>
          <?php
          while ($row = $stmt->fetch()) {
            echo "<option value=\"".$row['ID']."\">".$row['Title']." （".$row['ISBN']."）</option>";
          }
          ?>
        </select>
      </div>
      <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-default">削除する</button>
      </div>
    </form>
  </div>
  <script src="js/uikit.min.js"></script>
  <script src="js/uikit-icons.min.js"></script>
</body>
</html>
