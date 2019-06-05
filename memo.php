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

// idのチェック
$id = $_GET['id'];
if ( !is_numeric($id) || $id<=0 ) {
  echo '1以上の数字で指定してください';
  exit();
}

// データベースから取得
$memos = $db->prepare('SELECT * FROM memos WHERE id=?');
$memos->execute( array($id) );
$memo = $memos->fetch();
?>

<article>
  <p><?php echo $memo['memo']; ?></p>
  <a href="update.php?id=<?php echo $memo['id']; ?>">編集する</a>
  |
  <a href="delete.php?id=<?php echo $memo['id']; ?>">削除する</a>
  |
  <a href="index.php">戻る</a>
  <hr>
</article>

</main>

</body>

</html>