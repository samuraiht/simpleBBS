<?php
# 設定
const HOST = 'localhost';# ホスト名
const USER = 'root';# 接続ユーザー名
const PASS = '';# パスワード

# globalで使うmysqliオブジェクト
$link;

# 接続
# $dbname = DatabaseName: 接続するデータベース名(省略可能)
function connect($dbname = NULL) {
	global $link;
	$link = $dbname ? new mysqli(HOST, USER, PASS, $dbname) : new mysqli(HOST, USER, PASS);
	$ok = !$link->connect_error;
	if($ok) $link->set_charset('utf8mb4');# 文字コード指定 UTF-8ではなくutf8mb4
	return $ok;
}

# 切断
function disconnect() {
	global $link;
	$link->close();
}

# SELECT文を実行して結果を取得
function select($sql) {
	global $link;
	$result = $link->query($sql);
	$rows = [];
	while($row = $result->fetch_assoc()) $rows[] = $row;
	$result->close();
	return $rows;
}

# SELECT文以外を実行するだけ
function execute($sql) {
	global $link;
	$link->query($sql);
	return !$link->error;
}

function sqlEscape($text) {
	return str_replace("'", "''", $text);
}
?>