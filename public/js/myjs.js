function is_float(){
	var txt=document.getElementById("t").value;
	var pattern=/^0\.\d{2}$/;
	if(!pattern.exec(txt))
	{
	alert("请输入一个非负小数，并且小数点后保留两位!");
	}
}