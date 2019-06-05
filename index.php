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

// execメソッド　SOLを実行
// $count = $db->exec('INSERT INTO my_items SET maker_id=1, item_name="もも", price=210, keyword="缶詰,ピンク,甘い", sales=0, created="2018-01-23", modified="2018-01-23"');
// echo $count . "件のデータを挿入しました\n";

// $count = $db->exec('UPDATE my_items SET item_name="白桃" WHERE id=6');
// echo $count . "件のデータを変更しました\n";

// $count = $db->exec('DELETE FROM my_items WHERE id=5');
// echo $count . "件のデータを削除しました\n";


// queryメソッド
// $records = $db->query('SELECT * FROM my_items');
// while ($record = $records->fetch()) {
//   echo $record['item_name'] . "\n";
// }

// $records = $db->query('SELECT COUNT(*) AS record_counts FROM my_items');
// $record = $records->fetch();
// echo $record['record_counts'];



// URLパラメータでpageを受けとる
if ( isset($_GET['page']) && is_numeric($_GET['page']) ) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$start = 5 * ($page - 1);

$memos = $db->prepare('SELECT * FROM memos ORDER BY id DESC LIMIT ?,5');
$memos->bindParam(1, $start, PDO::PARAM_INT);
$memos->execute();
?>

<article>
  <?php while ( $memo = $memos->fetch() ) : ?>
    <p>
      <!-- urlパラメータを利用して上手くリンクさせる -->
      <a href="memo.php?id=<?php echo $memo['id']; ?>">
        <?php echo mb_substr($memo['memo'], 0, 15); ?>
        <?php
        // 三項演算子で条件分岐
        // (条件) ? 成立のとき : 不成立のとき
        echo (mb_strlen($memo['memo']))>15 ? '...' : '';
        ?>
      </a>
    </p>
    <time><?php echo $memo['created_at']; ?></time>
    <hr>
  <?php endwhile; ?>

  <!-- ページャー -->
  <?php if ($page>1) : ?>
  <a href="index.php?page=<?php echo $page-1; ?>"><?php echo $page-1; ?>ページ目へ</a>
  <?php endif; ?>
  |
  <?php
  $counts = $db->query('SELECT COUNT(*) AS cnt FROM memos');
  $count = $counts->fetch();
  $max_page = floor($count['cnt'] / 5) + 1;
  if ($page < $max_page) :
  ?>
  <a href="index.php?page=<?php echo $page+1; ?>"><?php echo $page+1; ?>ページ目へ</a>
  <?php endif;?>

</article>

<p style="margin: 40px 0;"><a href="input.html">メモを追加する</a></p>

</main>

</body>

</html>