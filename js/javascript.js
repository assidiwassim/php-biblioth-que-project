$(function() {

    new WOW().init();
});



$(function() {

    $(window).scroll(function() {
        if ($(this).scrollTop() < 50) {
            $("nav").removeClass("wass-top-nav");
        } else {
            $("nav").addClass("wass-top-nav");
        }
    });
});

$(function() {

    $("a.smooth-scroll").click(function(event) {

        event.preventDefault();
        var section = $(this).attr("href");

        $('html, body').animate({
            scrollTop: $(section).offset().top - 64
        }, 1250, "easeInOutExpo");
    });
});





function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();