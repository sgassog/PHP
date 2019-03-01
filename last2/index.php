<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('Location: ./login.php', true);
  exit;
}

require 'sql.php';
if ($_POST['no']==1) {

  $url = "https://www.googleapis.com/books/v1/volumes?q=isbn:".$_POST['isbn'];
  $json = file_get_contents($url);
  $book = json_decode($json,true);

  if ($book['totalItems']!=0) {
    $sql = "SELECT COUNT(`ID`) FROM `books` WHERE `ISBN`=:isbn";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':isbn', $_POST['isbn'], PDO::PARAM_INT);
    $flag = $stmt->execute();
    $row = $stmt->fetch();
  }
}
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/uikit.min.css" />
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
      <a class="uk-navbar-item uk-logo" href="index.php">書籍管理アプリ</a>
      <ul class="uk-navbar-nav">
        <li class="uk-active"><a href="home.php">メニュー</a></li>
        <li><a href="touroku.php">登録</a></li>
        <li><a href="kakunin.php">確認</a></li>
        <li><a href="sakuzyo.php">削除</a></li>
        <li><a href="logout.php">ログアウト</a></li>
      </ul>
    </div>
  </nav>
  <div class="uk-container">
    <div class="tab-content" id="myTabContent">
      <?php
      if ($_POST['no']==1 && $row[0]!=0) {
        echo "<div class=\"uk-alert-primary\" uk-alert>
        <a class=\"uk-alert-close\" uk-close></a><p>書籍は登録されています</p></div>";
      }elseif($_POST['no']==1){
        echo "<div class=\"uk-alert-danger\" uk-alert>
        <a class=\"uk-alert-close\" uk-close></a><p>書籍は登録されていません</p></div>";
      }
       ?>
      <h1 class="uk-heading-divider">登録確認</h1>
      <form action="<?=$_SERVER["SCRIPT_NAME"]?>" method="post">
        <div class="uk-margin">
          <label class="uk-label">ISBN</label>
          <input type="number" class="uk-input" name="isbn" placeholder="">
        </div>
        <input type="hidden" name="no" value="1">
        <div class="uk-margin">
          <button type="submit" class="uk-button uk-button-default">検索</button>
        </div>
      </form>
      <div class="tab-pane fade show active contants" id="home" role="tabpanel" aria-labelledby="home-tab">
        <h1 class="uk-heading-divider">メニュー</h1>
        <p uk-margin>
          <a href="touroku.php"><button class="uk-button uk-button-primary uk-button-large">登録</button></a>
          <a href="kakunin.php"><button class="uk-button uk-button-primary uk-button-large">確認</button></a>
          <a href="sakuzyo.php"><button class="uk-button uk-button-primary uk-button-large">削除</button></a>
        </p>
      </div>
    </div>
  </div>
  <script src="js/uikit.min.js"></script>
  <script src="js/uikit-icons.min.js"></script>
</body>
</html>
