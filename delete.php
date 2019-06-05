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

<?php

if ( isset($_GET['id']) && is_numeric($_GET['id']) ) {
  $id = $_GET['id'];

  $statement = $db->prepare('DELETE FROM memos WHERE id=?');
  $statement->execute(array($id));
}

?>

<p>メモを削除しました。</p>
<p><a href="index.php">メモ一覧を見る</a></p>
<p><a href="input.html">メモを追加する</a></p>

</main>

</body>

</html>