/*global fetchJSON*/
window.onload = () => {
	const ajaxForm = document.forms.ajax,
		request = ajaxForm.r,
		response = document.getElementById('response'),
		log = document.getElementById('log');

	function displayResult(r) {
		response.innerHTML = r.msg;
		log.innerHTML = '';
		if(!r.log) return;// undefined(model.php)の場合はここで終了
		for(const item of r.log) {
			const tr = document.createElement('tr');// table row
			const id = document.createElement('td');// table data
			id.textContent = item.id;
			tr.appendChild(id);
			const rq = document.createElement('td');
			rq.textContent = item.request;
			tr.appendChild(rq);
			log.appendChild(tr);
		}
	}

// 初期表示
	fetchJSON('api.php', {init: 1}).then(r => displayResult(r));

// 初期化
	document.getElementById('init').onclick = () => fetchJSON('model.php').then(r => displayResult(r));

// 非同期通信
	ajaxForm.onsubmit = () => {
// (クラス)Promiseと同様に、then～で処理完了後の動作を指定できます。
		fetchJSON('api.php', {r: request.value}).then(r => displayResult(r));
		return false;
	};
};