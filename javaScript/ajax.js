load();

function load(){
	xhr = new XMLHttpRequest();
	xhr.open('GET', 'includes/index.inc.php?load_all', true);
	xhr.onload = function(){
		if(this.status == 200){
			document.querySelector('.post-res').innerHTML += this.responseText;
			rating_update();
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
			rating_update();
		}
		offset += 3;
	}
	xhr.send();
}

function rating_update(){
	var holder = document.querySelectorAll('.rating_index');
	var stars = document.querySelectorAll('.rating_holder_index');

	for(var i=0; i<holder.length; i++){
		var too = stars[i].value;
		var icon = holder[i].childNodes;
		var icon = holder[i].querySelectorAll('i');
		for(var j=0; j<too; j++){
			icon[j].className = icon[j].className.replace('far', 'fas');
			console.log(icon[j]);
		}
	}
}
