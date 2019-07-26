class UI{
    parallax(element) {
        element.style.backgroundPositionY = window.pageYOffset*.5+'px';
    }
}

// variables
const hero = document.getElementById('hero');

// event listeners
window.addEventListener('scroll', ()=>{
    const ui = new UI();
    ui.parallax(hero);
} );