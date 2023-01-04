// Auto slide for Content start

var counter = 1;
setInterval(function () {
    document.getElementById('radio' + counter).checked = true;
    counter++;

    if (counter > 5) {
        counter = 1;
    }
}, 5000);

// Auto slide for Content end

let navbar = $('.navbar');

$('.icon').on('click', function () {
    navbar.slideToggle();
});