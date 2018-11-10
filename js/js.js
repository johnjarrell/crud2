function makeActive(e) {
	var ele, name, arr;
	ele = document.getElementById(e);
	alert(ele);
	name = 'active';
	arr = ele.className.split(" ");
	if (arr.indexOf(name) == -1) {
		ele.className += " " + name;
	}
}

//window.onload(function() {
//	var 
//});