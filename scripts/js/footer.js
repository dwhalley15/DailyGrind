document.addEventListener("DOMContentLoaded", function(){
  showSlides();
});

let slideNo = 0;

function showSlides(){
  let i;
  let slides = document.getElementsByClassName('slide');
  for (i =0; i < slides.length; i++){
    slides[i].style.display = "none";
  }
  slideNo++;
  if(slideNo > slides.length){
    slideNo = 1;
  }
  slides[slideNo-1].style.display = "block";
  setTimeout(showSlides, 5000);
}