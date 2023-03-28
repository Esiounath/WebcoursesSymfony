const items = document.querySelectorAll('img');
		const nbSlide = items.length ;
		var count = 0 ;
		function slideSuivant(){
			items[count].classList.remove('active');
			if (count < nbSlide -1) {
				count++;
			}
			else{
				count = 0 ;
			}
			items[count].classList.add('active');
		}
		function slidePrecedent(){
			items[count].classList.remove('active');
			if (count > 0) {
				count--;
			}
			else{
				count = nbSlide -1 ;
			}
			items[count].classList.add('active');
		}
		var slide = setInterval((e)=>{
			items[count].classList.remove('active');
			if (count < nbSlide -1) {
				count++;
         items[count].style.transition = '5s';
         document.body.style.transition = '5s';
         items[count].style.backgroundColor = 'rgba(255.255.255.1)';
			}
			else if (count > nbSlide -items.length){
				count = 0 ;
	
         items[count].style.transition = '5s';
         document.body.style.transition = '5s';
         items[count].style.backgroundColor = 'rgba(255.255.255.1)';
			}
			else if (count > 0) {
				count--;
	
         items[count].style.transition = '5s';
         document.body.style.transition = '5s';
         items[count].style.backgroundColor = 'rgba(255.255.255.1)';
			}
			else{
				count = nbSlide -1 ;
	
         items[count].style.transition = '5s';
         document.body.style.transition = '5s';
	items[count].style.backgroundColor = 'rgba(255.255.255.1)';
				
			}
			items[count].classList.add('active');
		},4000);
		function keyPress(e){
			if (e.keyCode === 37) {
			        clearInterval(slide);
				slidePrecedent();

			}
			else if(e.keyCode === 39)
			{
			       clearInterval(slide);
				slideSuivant();

			}
			else if(e.keyCode === 32)
			{
				clearInterval(slide);
			}
		}
        document.addEventListener('keydown',keyPress);

    var i = 0;
var txt = 'Bienvenue sur le site de webcourses'; /* The text */
var speed = 70; /* The speed/duration of the effect in milliseconds */
var titre = document.createElement('h2');
titre.classList.add('titre');
titre.setAttribute('id','tit');
document.querySelector('.slider').append(titre);
function typeWriter() {
  if (i < txt.length) {
    document.getElementById('tit').innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}