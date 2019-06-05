<?php require('dbconnect.php'); ?>

<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

<title>よくわかるPHPの教科書</title>
</head>

<body>

<header>
  <h1 class="font-weight-normal">よくわかるPHPの教科書</h1>
</header>

<main>

<h2>Practice</h2>

<pre>

<?php

// prepareメソッド（サニタイズ）
$statement = $db->prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
// excuteメソッドで、?に挿入したい内容を指定　＊文字列しか扱えない
// $statement->execute( array($_POST['memo']) );

// bindParamを使った書き換え　＊数字扱える
$statement->bindParam(1, $_POST['memo'], PDO::PARAM_STR);
$statement->execute();

echo 'メッセージが登録されました';

?>


<a href="index.php">メモ一覧を見る</a>

<a href="input.html">メモを追加する</a>

</pre>

</main>

</body>

</html>