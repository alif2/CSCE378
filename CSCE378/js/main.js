window.onload = function getTime() {
    $('#clock').text(new Date());
    setTimeout(getTime, 500);
};