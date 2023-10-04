const carousel = document.querySelector('.carousel');
const carouselItems = document.querySelectorAll('.carousel-item');
const prevButton = document.getElementById('prevButton');
const nextButton = document.getElementById('nextButton');

let currentIndex = 0;
const itemsPerPage = 3;

prevButton.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex -= itemsPerPage;
        if (currentIndex < 0) {
            currentIndex = 0;
        }
        updateCarousel();
    }
});

nextButton.addEventListener('click', () => {
    const maxIndex = carouselItems.length - 1;
    if (currentIndex < maxIndex) {
        currentIndex += itemsPerPage;
        if (currentIndex > maxIndex) {
            currentIndex = maxIndex;
        }
        updateCarousel();
    }
});

function updateCarousel() {
    const translateX = -currentIndex * 382;
    carousel.style.transform = `translateX(${translateX}px)`;
}

let teks = "Landing DOM";
setTimeout(() => {
    document.getElementById("landingdom").innerText = teks;
    document.getElementById("land").innerHTML = "";
}, 2000);