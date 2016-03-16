$(document).ready(function() {
    getClockInTime();
    getTime();
   
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
   
    function getClockInTime() {
        $.ajax({
            type: 'POST',
            url: '/app/user_clock_status.php',
            success: function (data) {
                var clockIn = new Date(data);
                $('#clock-in-time').text(clockIn.toLocaleDateString() + ' ' + clockIn.toLocaleTimeString());
            }
        });
    }
   
    function getTime() {
        var now = new Date();
        $('#clock').text(now.toLocaleDateString() + ' ' + now.toLocaleTimeString());
    
        var clockInTime = new Date($('#clock-in-time').text());
    
        var workHours = ((now - clockInTime) / 3600000.0).toFixed(2);
        $('#working-hours').text(workHours);
        setTimeout(getTime, 500);
    };
});