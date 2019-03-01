<?php
session_start();
if (isset($_SESSION['login'])) {
  header('Location: ./index.php', true);
  exit;
}

if (isset($_POST['id']) && isset($_POST['pass'])) {
  if ($_POST['id']==1 && $_POST['pass']==1) {
    $_SESSION['login'] = 1;
    header('Location: ./index.php', true);
    exit;
  }else{
    $flogin = 1;
  }
}
?><!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>ログイン</title>
  <link rel="stylesheet" href="css/uikit.min.css" />
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
      <a class="uk-navbar-item uk-logo" href="index.php">書籍管理アプリ</a>
    </div>
  </nav>
  <div class="uk-container uk-container-center">
    <?php if($flogin==1): ?>
      <div class="uk-alert-danger" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>ログインに失敗しました</p>
      </div>
    <?php endif; ?>
    <form method="post">
      <legend class="uk-legend">ログイン</legend>
      <div class="uk-margin">
        <input type="text" class="uk-input uk-form-width-medium"name="id" placeholder="ID">
      </div>
      <div class="uk-margin">
        <input type="password" class="uk-input uk-form-width-medium" name="pass" placeholder="PASSWORD">
      </div>
      <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-default">ログイン</button>
      </div>
    </form>
  </div>
  <script src="js/uikit.min.js"></script>
  <script src="js/uikit-icons.min.js"></script>
</body>
</html>
