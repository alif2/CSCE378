$(document).ready(function() {
    getClockInTime();
    getTime();
   
    $('.clock-form').submit(function(event) {
       var now = new Date();
       $.ajax({
           type: 'POST',
           url: '/app/clock_events.php',
           data: { 'time': now.toISOString() }
       })
       .done(function(data) {
          location.reload();
       });
       
       event.preventDefault();
    });
   
    $('#correction-form').submit(function(event) {
        event.preventDefault();
        $(this).reset();
        
       $('.submit-success').show();
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