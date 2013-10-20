// Ctrl + Enter 提交表单
function cmt_submit(){
	if(event.ctrlKey && window.event.keyCode==13) {
		document.getElementById("cmt_form").submit.click();
	};
};
document.onkeydown = cmt_submit;