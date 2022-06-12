// Slider
let imgSlider = document.querySelectorAll('.img-slider');
let left = document.querySelector('.left');
let right = document.querySelector('.right');
let count = 0;
let imgLength = imgSlider.length;

function enleverActiveImages() {
    for(let i = 0 ; i < imgLength ; i++) {
        imgSlider[i].classList.remove('active');
    }
}

right.addEventListener('click', function() {
    count++;
    if(count >= imgLength) {
        count = 0;
    }
    enleverActiveImages();
    imgSlider[count].classList.add('active');
})

left.addEventListener('click', function() {
    count--;
    if(count < 0) {
        count = imgLength - 1;
    }
    enleverActiveImages();
    imgSlider[count].classList.add('active');
})

setInterval(function() {
    count++;
    if(count >= imgLength) {
        count = 0;
    }
    enleverActiveImages();
    imgSlider[count].classList.add('active');
}, 5000)