<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    好きなリンクをクリックして下さい
    <ul>
      <li><a href="sample12-06.php?data1=10&data2=20&data3=ABCD">10と20とABCD</a>
      <br><br></li>
      <li><a href="sample12-06.php?data1=20&data2=80&data3=EFGH">20と80とEFGH</a><br><br></li>
      <li><a href="sample12-06.php?data1=88&data2=99&data3=WXYZ">88と99とWXYZ</a><br><br></li>
    </ul>

    <?php
    print "受け取ったデータは<br>";
    print "data1→".$_GET[data1]."<br>";
    print "data2→".$_GET[data2]."<br>";
    print "data3→".$_GET[data3]."<br>";

     ?>
  </body>
</html>
