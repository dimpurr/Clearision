// Ctrl + Enter 提交表单
function cmt_submit(){
	if(event.ctrlKey && window.event.keyCode==13) {
		document.getElementById("cmt_form").submit.click();
	};
};

// 代码可编辑
function clrs_code(){
	var controls = document.getElementsByTagName('pre');
	for(var i=0; i<controls.length; i++){
		controls[i].spellcheck = false;
		controls[i].setAttribute("contenteditable","true")
	};
	var controls = document.getElementsByTagName('code');
	for(var i=0; i<controls.length; i++){
		controls[i].spellcheck = false;
		controls[i].setAttribute("contenteditable","true");
	};
}

document.onkeydown = cmt_submit;
window.onload = clrs_code;

console.log('Theme Clearision by Dimpurr')
console.log('http://dimpurr.com')
console.log('')
console.log('Welcome to my blog!')