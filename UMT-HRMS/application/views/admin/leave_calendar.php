<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Leaves Calendar</h5>

    </div>

    <div class="panel-body">
        <p class="content-group">Number represents the employee code</p>

        <div class="fullcalendar-basic"></div>
    </div>
</div>
<?php
$events_str = '';

$events = $this->Applications_model->get_all_approved_applications();

if ($events->num_rows() > 0) {
    foreach ($events->result_array() as $event) {
        $events_str .= '
                {
                    title: "' . $event['emp_code'] . ' : ' . $event['emp_firstname'] . ' ' . $event['emp_lastname'] . '",
                    start: "' . $event['date_from'] . '",
                    end: "' . $event['date_to'] . '"
                },
            ';
    }

    if ($events_str != '') {
        $events_str = substr($events_str, 0, -1);
    }
}



$date_today = "'" . date('Y-m-d') . "'";
?>

<script>

    $(function () {

        var events = [<?php echo $events_str; ?>];
        date_today = <?php echo $date_today ?>


        $('.fullcalendar-basic').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: date_today,
            editable: false,
            events: events
        });
    });

</script>