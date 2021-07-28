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