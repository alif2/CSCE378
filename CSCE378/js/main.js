$(document).ready(function() {
    //$.fn.bootstrapBtn = $.fn.button.noConflict();
    
    getClockInTime();
    getTime();
    
    $('.clock-form').submit(function(event) {
       event.preventDefault();
       var now = new Date();
       $.ajax({
           type: 'POST',
           url: '/app/clock_events.php',
           data: { 'time': now.toISOString() }
       
       }).done(function(data) {
          location.reload();
       });
    });
   
   $('#pay-calculator').submit(function(event) {
        event.preventDefault();
        var q = sumWorkHoursByDateRange($('#pay-start').val(), $('#pay-end').val());
        var wage = parseFloat($('#pay-wage').val());
        q.success(function(data) {
            var hours = parseFloat(data);
            var hourTotal = hours * wage;
            $('.total-pay').text(Math.round(hourTotal * 100) / 100);
        });
   });
   
    $('#correction-form').submit(function(event) {        
        event.preventDefault();
        $('.submit-success').show();
    });
   
    $('#work-history-modal').submit(function(event) {
        event.preventDefault();
        var workHistoryPromise = getWorkHistoryByDateRange($('#history-start-date').val(), $('#history-end-date').val());
        workHistoryPromise.success(function(data) {
            $('#work-history-body').empty();
            $.each(data, function(index, value) {
                $('#work-history-body').append('<tr><td>' + index + '</td><td>' + (Math.round(value * 100) / 100) + '</td></tr>');
            });  
            
            workHistoryList.dialog('open');
        });
    });
   
    workHistoryList = $('#work-history-submit-modal').dialog({
        autoOpen: false,
        height: 350,
        width: 650,
        modal: true,
        // Close when click outside dialog
        open: function(event,ui) {
            $('.ui-widget-overlay').bind('click', function() {
                $(this).siblings('.ui-dialog')
                       .find('.ui-dialog-content')
                       .dialog('close');
            });
        }
    });
   
    $('#correction-form #clear').click(function() {
       $('.submit-success').hide(); 
    });

    correctionForm = $('#correction-form').dialog({
        autoOpen: false,
        height: 350,
        width: 650,
        modal: true,
        // Close when click outside dialog
        open: function(event,ui) {
            $('.ui-widget-overlay').bind('click', function() {
                $(this).siblings('.ui-dialog')
                       .find('.ui-dialog-content')
                       .dialog('close');
            });
        }
    });
    
    $('#correction-form-btn').button().click(function() {
        correctionForm.dialog('open');  
    });
    
    payCalculator = $('#pay-calculator').dialog({
        autoOpen: false,
        height: 300,
        width: 450,
        modal: true,
        buttons: {
            'Calculate': function() {
                $('#pay-calculator').submit();
            }
        },
        // Close when click outside dialog
        open: function(event,ui) {
            $('.ui-widget-overlay').bind('click', function() {
                $(this).siblings('.ui-dialog')
                       .find('.ui-dialog-content')
                       .dialog('close');
            });
        }
    });
    
    $('#work-history-btn').button().click(function() {
        workHistoryModal.dialog('open');
    });
    
    workHistoryModal = $('#work-history-modal').dialog({
        autoOpen: false,
        height: 300,
        width: 450,
        modal: true,
        buttons: {
            'Submit' : function() {
                $('#work-history-modal').submit();
            }
        },
        
        // Close when click outside dialog
        open: function(event,ui) {
            $('.ui-widget-overlay').bind('click', function() {
                $(this).siblings('.ui-dialog')
                       .find('.ui-dialog-content')
                       .dialog('close');
            });
        }
    });
    
    $('#pay-calculator-btn').button().click(function() {
        payCalculator.dialog('open');
    });
    
    function getWorkHistoryByDateRange(start, end) {
        return $.ajax({
            type: 'POST',
            url: 'app/get_work_history.php',
            data: {
                'firstDay' : start,
                'lastDay' : end
            },
            dataType: 'json'
        });
    }
    
    function sumWorkHoursByDateRange(start, end) {
        return $.ajax({
            type: 'POST',
            url: 'app/get_sum_history.php',
            data: {
                'firstDay': start,
                'lastDay' : end
            },
            dataType: 'json'
        });
    }
    
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