let cartCount = 0;

function addToCart(productName, price) {
	
	cartCount++;
	document.getElementById("cart-count").textContent = cartCount;
	alert('Προστέθηκε στο καλάθι: ${productName} (€${price})');
}

function toggleMenu() {
	
	const navMenu = document.getElementById("navMenu");
	navMenu.classList.toggle("active");
}

document.querySelectorAll('.has-submenu > a').forEach(link => {
	link.addEventListener('click', function (e) {
		const parent = this.parentElement;
		if (window.innerWidth <= 768) {
			
			e.preventDefault();
			parent.classList.toggle('open');
		}
	});
});


let slideIndex = 0;
let slides = document.querySelectorAll(".slide");
let timer = null;

function showSlide(index) {
  slides.forEach(slide => slide.classList.remove("active"));
  slides[index].classList.add("active");
}

function nextSlide() {
  slideIndex = (slideIndex + 1) % slides.length;
  showSlide(slideIndex);
  resetTimer();
}

function prevSlide() {
  slideIndex = (slideIndex - 1 + slides.length) % slides.length;
  showSlide(slideIndex);
  resetTimer();
}

function resetTimer() {
  clearInterval(timer);
  timer = setInterval(nextSlide, 4000);
}

// Auto start
window.addEventListener("load", () => {
  slides = document.querySelectorAll(".slide");
  showSlide(slideIndex);
  timer = setInterval(nextSlide, 4000);
});
