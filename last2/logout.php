<?php
session_start();
if (isset($_SESSION['login'])) {
  unset($_SESSION['login']);
}else{
  header('Location: ./login.php', true);
  exit;
}
 ?><!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>ログアウト</title>
  <link rel="stylesheet" href="css/uikit.min.css" />
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
      <a class="uk-navbar-item uk-logo" href="index.php">書籍管理アプリ</a>
      <ul class="uk-navbar-nav">
        <li><a href="login.php">トップ</a></li>
      </ul>
    </div>
  </nav>
  <div class="uk-container">
    <h1>ログアウトしました</h1>
  </div>
  <script src="js/uikit.min.js"></script>
  <script src="js/uikit-icons.min.js"></script>
</body>
</html>
