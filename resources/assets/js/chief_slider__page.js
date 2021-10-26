$(document).ready(function () {
    var elms = $('.slider');
    for (var i = 0, len = elms.length; i < len; i++) {
        // инициализация elms[i] в качестве слайдера
        new ChiefSlider(elms[i]);
    }
    
});