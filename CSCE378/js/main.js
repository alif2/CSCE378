window.onload = function getTime() {
    $('#clock').text(new Date());
    setTimeout(getTime, 500);
};

$(document).ready(function() {
   $('.clock-form').submit(function(event) {
       var now = new Date();
       $.ajax({
           type: 'POST',
           url: '/app/clock_events.php',
           data: {
               'time': now.toISOString()
           }
       })
       .done(function(data) {
          if(data === 'ClockIn') {
              $('#clock-out').show();
              $('#clock-in').hide();
          } else if(data === 'ClockOut') {
              $('#clock-in').show();
              $('#clock-out').hide();
          }
       });
       
       event.preventDefault();
   });
});