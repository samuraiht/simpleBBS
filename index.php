<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>JavaScript - PHP 非同期通信</title>
	<link rel="stylesheet" href="style.css">
	<script src="ajax.js"></script>
	<script src="script.js"></script>
</head>
<body>
	<button id="init">初期化</button>
	<form name="ajax">
		<label for="r">リクエスト文</label><input type="type" name="r" id="r">
		<button>リクエスト実行</button>
	</form>
	<div id="response"></div>
	<table border="1">
		<thead>
			<tr>
				<th>id</th>
				<th>リクエスト文</th>
			</tr>
		</thead>
		<tbody id="log"></tbody>
	</table>
</body>
</html>