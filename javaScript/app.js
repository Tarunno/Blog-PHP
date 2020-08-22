var flag = false;
var nav = document.querySelector("header ul");
var bar = document.querySelector("i.menu-toggle");
var post = document.querySelector(".post-info");
var post_h = document.querySelector(".trending");

bar.addEventListener('click',()=>{
    if(flag === false){
        if(post !== null){
            post.style.display = "none";
        }
        if(post_h !== null){
            post_h.style.display = "none";
        }
        nav.style.display = 'block';
        flag = true;
    }
    else if(flag === true){
        if(post !== null){
            post.style.display = "block";
        }
        if(post_h !== null){
            post_h.style.display = "block";
        }
        nav.style.display = 'none';
        flag = false;
    }
});


var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("post");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}
function animateOnscroll(){
	AOS.init({
	        offset: 100,
	        delay: 0,
	        duration: 1000,
            once: true 
	});
}
window.onload = ()=> {
    animateOnscroll();
}

ClassicEditor.create( document.querySelector( "#editor" ), { // CKeditor 5
    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
    heading: {
        options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
        ]
    }
}).catch( error => {
    console.log( error );
});
