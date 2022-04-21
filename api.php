<?php
# 自作データベースモジュールを読み込む
require_once 'db.php';

if(empty($_GET['r'])) {
# 接続
	connect('ajax');
# 登録後の全件取得(index)
	$log = select('SELECT `id`,`request` FROM `log`;');
# もうデータベース操作をしないので、切断
	disconnect();

	$response = [
		'msg' => $_GET['init'] ? 'ここにレスポンスを表示します。' : '空のリクエストです。',
		'log' => $log
	];
	echo json_encode($response);
	exit;
}

# 接続
connect('ajax');
# logの登録(store)
execute("INSERT INTO `log` (`request`)VALUES('" . sqlEscape($_GET['r']) . "');");
# 登録後の全件取得(index)
$log = select('SELECT `id`,`request` FROM `log`;');
# もうデータベース操作をしないので、切断
disconnect();

# HTMLとして意味のある文字列をエスケープする(不正JavaScript等の埋め込み防止
$request = htmlspecialchars($_GET['r'], ENT_QUOTES);

# レスポンスを書き出す
# `~~~~~${変数}~~~~`
# "~~~~~{$変数}~~~~"
$response = [
	'msg' => "{$request}を受け取りました。",
	'log' => $log
];
echo json_encode($response);
?>