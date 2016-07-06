$(document).ready(function () {
    $('.kv-toggle').click(function (event) {
        //event.preventDefault(); // cancel the event
        $(this).children('.opened').toggle();
        $(this).children('.closed').toggle();
        $(this).parent().children('ul').toggle();
        $(this).parent().toggleClass('active');
        return true;
    });
});