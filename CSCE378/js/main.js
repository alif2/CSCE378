window.onload = function getTime() {
    var now = new Date();
    $('#clock').text(now.toISOString());
    
    var clockInTime = new Date($('#clock-in-time').text());
    
    var workHours = ((now - clockInTime) / 3600000.0).toFixed(2);
    $('#working-hours').text(workHours);
    setTimeout(getTime, 500);
};

$(document).ready(function() {
   $('.datepicker').datepicker();
   
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