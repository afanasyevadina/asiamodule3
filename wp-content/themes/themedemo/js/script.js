document.querySelectorAll('header nav a[href^="#"').forEach(el => {
    el.onclick = function(e) {
        e.preventDefault()
        var target = document.querySelector(this.hash)
        if(target) {
            window.scrollTo({
                top: target.getBoundingClientRect().y + window.scrollY,
                behavior: 'smooth'
            })
        }
    }
})

var slider = document.querySelector('.slider')
var dots = document.querySelector('.slider-dots')

var index = 0
var length = slider.children.length

const toSlide = index => {
    slider.querySelector('.active').classList.remove('active')
    slider.children[index].classList.add('active')

    dots.querySelector('.active').classList.remove('active')
    dots.children[index].classList.add('active')
}

dots.querySelectorAll('.slider-dot').forEach(dot => {
    dot.onclick = function(e) {
        e.preventDefault()
        toSlide(this.dataset.slide)
    }
})

toSlide(index)

setInterval(() => {
    toSlide(index)
    index++
    if(index == length) index = 0
}, 3000)