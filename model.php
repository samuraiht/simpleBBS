<?php
# モジュール読み込み
require_once 'db.php';
# 接続
connect();
# 既にある場合、データベース削除
execute('DROP DATABASE `ajax`;');
# データベース作成
execute('CREATE DATABASE `ajax` CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;');
# 作ったデータベースに接続
execute('USE `ajax`;');
# テーブル作成
execute('CREATE TABLE `log` (`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, `request` VARCHAR(255) NOT NULL);');
# 切断
disconnect();
# レスポンスを書き出す(JSON形式の文字列)
$response = ['msg' => '初期化完了しました。'];
echo json_encode($response);
?>