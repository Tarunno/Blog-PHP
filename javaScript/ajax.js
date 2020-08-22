load();

function load(){
	xhr = new XMLHttpRequest();
	xhr.open('GET', 'includes/index.inc.php?load_all', true);
	xhr.onload = function(){
		if(this.status == 200){
			document.querySelector('.post-res').innerHTML += this.responseText;
		}
	}
	xhr.send();
}

var offset = 3;
function load_more(){
	xhr = new XMLHttpRequest();
	xhr.open('GET', 'includes/index.inc.php?load_more='+offset, true);
	xhr.onload = function(){
		if(this.status == 200){
			document.querySelector('.post-res').innerHTML += this.responseText;
		}
		offset += 3;
	}
	xhr.send();
}
