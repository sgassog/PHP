<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('Location: ./index.php', true);
  exit;
}

require 'sql.php';

if ($_POST['no']==1) {

  $url = "https://www.googleapis.com/books/v1/volumes?q=isbn:".$_POST['isbn'];
  $json = file_get_contents($url);
  $book = json_decode($json,true);

  if ($book['totalItems']!=0) {
    $sql = "INSERT INTO `books` (`ID`, `Title`, `ISBN`) VALUES (NULL, :title, :isbn);";
    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(':title', $book['items'][0]['volumeInfo']['title'], PDO::PARAM_STR);
    $stmt->bindParam(':isbn', $book['items'][0]['volumeInfo']['industryIdentifiers'][0]['identifier'], PDO::PARAM_INT);

    $flag = $stmt->execute();
  }
}
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>書籍登録</title>
  <link rel="stylesheet" href="css/uikit.min.css" />
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
      <a class="uk-navbar-item uk-logo" href="index.php">書籍管理アプリ</a>
      <ul class="uk-navbar-nav">
        <li><a href="index.php">メニュー</a></li>
        <li class="uk-active"><a href="touroku.php">登録</a></li>
        <li><a href="kakunin.php">確認</a></li>
        <li><a href="sakuzyo.php">削除</a></li>
        <li><a href="logout.php">ログアウト</a></li>
      </ul>
    </div>
  </nav>
  <div class="uk-container">
    <?php
    if ($_POST['no']==1 && $book['totalItems']!=0) {
      echo "<div class=\"uk-alert-primary\" uk-alert>
      <a class=\"uk-alert-close\" uk-close></a><p>書籍を登録しました</p></div>";
    }elseif($_POST['no']==1 && $book['totalItems']==0){
      echo "<div class=\"uk-alert-danger\" uk-alert>
      <a class=\"uk-alert-close\" uk-close></a><p>書籍を登録できませんでした、存在しない可能性があります</p></div>";
    }
    ?>
    <form action="<?=$_SERVER["SCRIPT_NAME"]?>" method="post">
      <div class="uk-margin">
        <label class="uk-label">ISBN</label>
        <input type="number" class="uk-input" name="isbn" placeholder="">
      </div>
      <input type="hidden" name="no" value="1">
      <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-default">登録</button>
      </div>
    </form>
  </div>
  <script src="js/uikit.min.js"></script>
  <script src="js/uikit-icons.min.js"></script>
</body>
</html>
