<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $data = 12;
    if($data>10){
      ?>
      $dataの値は10より大きいです！
      <?php
    }else{
      ?>
      $dataの値は10以下です！
      <?php
    }
     ?>

     <?php if($data>10): ?>
       $dataの値は10より大きいです！
     <?php else: ?>
       $dataの値は10以下です！
     <?php endif; ?>
  </body>
</html>
