$(document).scroll(function() {
    setInterval(scrollNavbar(),4000);
});

function scrollNavbar(){
    if ($(this).scrollTop() < 80) {
        $("#mainNav").css("background-color", "#ffffff00");
        $("#logo").css("width", "80%");
    } else {
        $("#mainNav").css("background-color", "#63a8c7f5");
        $("#logo").css("width", "50%");
    }
}