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
   
   $('#pay-calculator').submit(function(event) {
        event.preventDefault();
        $('.total-pay').text('1234.56');
   });
   
    $('#correction-form').submit(function(event) {        
        event.preventDefault();
        $('.submit-success').show();
    });
   
    $('#correction-form #clear').click(function() {
       $('.submit-success').hide(); 
    });
   
    $('#view-history').click(function() {
        $('#work-history').append(
        '<br><table class="table-bordered ptable"><thead><tr><th>Monday Feb.2</th><th>Tuesday Feb.3</th><th>Wednesday Feb.4</th><th>Thursday Feb.5</th><th>Friday Feb.6</th><th>Saturday Feb.7</th><th>Sunday Feb.8</th></tr></thead><tbody><tr><td>5.2</td><td>4.3</td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table><br><table class="table-bordered ptable"><thead><tr><th>Monday Feb.2</th><th>Tuesday Feb.3</th><th>Wednesday Feb.4</th><th>Thursday Feb.5</th><th>Friday Feb.6</th><th>Saturday Feb.7</th><th>Sunday Feb.8</th></tr></thead><tbody><tr><td>5.2</td><td>4.3</td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table>'
        );
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