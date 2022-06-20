// Mini lider
let imgCarousel = document.querySelectorAll('.img-carousel');
let radioSlider = document.querySelectorAll(".radios-sliders")
let nomSlider = document.querySelectorAll(".nom-slider")

radioSlider.forEach((radio, i) => {
    radio.addEventListener("click", () => {
        for(let i = 0 ; i < imgCarousel.length ; i++) {
            imgCarousel[i].classList.remove('active');
            radioSlider[i].classList.remove('active');
            nomSlider[i].classList.remove('active');
        }

        imgCarousel[i].classList.add('active');
        radioSlider[i].classList.add('active');
        nomSlider[i].classList.add('active');
    })
})