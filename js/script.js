// Ctrl + Enter 提交表单
document.onkeydown = function () {
	if (event.ctrlKey && window.event.keyCode == 13) {
		document.getElementById('cmt_form').submit.click();
	}
}

// 代码可编辑
window.onload = function () {
	for (let item of document.querySelectorAll('code, pre')) {
		item.spellcheck = false;
		item.contentEditable = true;
	}
}

console.log('Welcome to my blog!');
console.log('');
console.log('Theme Clearision by Dimpurr (http://dimpurr.com)');
