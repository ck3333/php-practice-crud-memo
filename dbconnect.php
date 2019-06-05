<?php

// DBへ接続。try-catchで例外処理
try {
  $db = new PDO('mysql:dbname=mydb_test;host=127.0.0.1;charset=utf8', 'root', 'root');
} catch (PDOException $e) { //catch (例外クラス名 例外を受け取る変数名)
  echo 'DB接続エラー: ' . $e->getMessage();
}

?>