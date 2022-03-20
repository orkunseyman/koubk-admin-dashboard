<?php

require_once("auth_session.php");
require_once('db.php');

?>
<!DOCTYPE html>
<html>

<head>


    <title>Events</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="UI///styles.css" />
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.css" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />

</head>

<body>

    <?php
    include_once("sidebar.php")
    ?>

    <div class="dimmed pusher" id="dimmed">

        <style>
            body {
                margin: 0;
                padding: 0;
                background-color: #f1f1f1;
            }
        </style>
        </head>

        <body>
            <div class="ui centered grid container">

                <div class="fourteen wide column">
                    <div class="ui breadcrumb" id="breadcrumb">
                        <a class="section ui large header" href="dashboard.php">Home</a>
                        <i class="right chevron icon divider"></i>
                        <a class="section ui large header" href="events.php">Events</a>


                    </div>
                    <div>


                        <div align="right">
                            <button type="button" id="add_button" class="ui blue huge button">Add</button>
                        </div>
                        <br /><br />
                        <table id="event_data" class="ui celled striped table">
                            <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Description</th>
                                    <th>Attendance</th>
                                    <th>Date</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
        </body>

</html>

<div class="ui tiny modal">
    <i class="close icon"></i>
    <div class="ui raised segment">
        <form class="ui form" method="post" id="event_form">
            <label>Event Name</label>
            <div class="field">
                <input name="eventname" id="eventname">
            </div>
            <div class="field">
                <label>Date</label>
                <div class="field">
                    <input type="text" name="date" id="date">
                </div>

            </div>
            <div class="field">
                <label>Description</label>
                <div class="field">
                    <input type="text" name="description" id="description">
                </div>

            </div>
            <div class="field">
                <label>Attendance</label>
                <div class="field">
                    <input type="text" name="attendance" id="attendance">
                </div>

            </div>

            <input type="hidden" name="user_id" id="user_id" />
            <input type="hidden" name="operation" id="operation" />
            <input type="submit" name="action" id="action" class="ui fluid large blue submit button" value="Add" />

            <div class="ui error message"></div>
    </div>
    </form>
</div>
</div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript" language="javascript">
    $(document).ready(function() {

        $('.ui.form')
            .form({
                fields: {
                    eventname: {
                        identifier: 'eventname',
                        rules: [{
                            type: 'empty',
                            prompt: 'Please enter a event name'
                        }]
                    },
                    date: {
                        identifier: 'date',
                        rules: [{
                            type: 'empty',
                            prompt: 'Please enter date'
                        }]
                    },
                    description: {
                        identifier: 'description',
                        rules: [{
                            type: 'empty',
                            prompt: 'Please enter description'
                        }]
                    },
                    grade: {
                        identifier: 'attendance',
                        rules: [{
                            type: 'empty',
                            prompt: 'Please enter attendance'
                        }]
                    },

                }
            });

        $('#add_button').click(function() {
            $('.ui.modal').modal('show');
            $('#event_form')[0].reset();
            $('#action').val("Add");
            $('#operation').val("Add");
        });

        var dataTable = $('#event_data').DataTable({
            "pageLength": 300,
            "processing": true,
            "serverSide": true,
            "searching": false,
            "paging": false,
            'serverMethod': 'post',
            "order": [],
            "ajax": {
                url: "fetchevent.php"
            },
            // "columnDefs": [{
            //     "targets": [6, 7],
            //     "orderable": false
            // }]

        });


        $(document).on('submit', '#event_form', function(event) {
            event.preventDefault();
            var name = $('#name').val();
            var email = $('#email').val();

            $.ajax({
                url: "addeditevent.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,

                processData: false,
                success: function(data) {
                    $('#event_form')[0].reset();
                    $('.ui.modal').modal('hide');
                    dataTable.ajax.reload();
                }
            });

        });

        $(document).on('click', '.update', function() {
            var user_id = $(this).attr("id");
            $.ajax({
                url: "singleevent.php",
                method: "POST",
                data: {
                    user_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    $('.ui.modal').modal('show');
                    $('#eventname').val(data.eventname);
                    $('#description').val(data.description);
                    $('#attendance').val(data.attendance);
                    $('#date').val(data.date);
                    $('#user_id').val(user_id);
                    $('#action').val("Edit");
                    $('#operation').val("Edit");
                }
            })
        });

        $(document).on('click', '.delete', function() {
            var user_id = $(this).attr("id");
            if (confirm("Are you sure to delete this?")) {
                $.ajax({
                    url: "deleteevent.php",
                    method: "POST",
                    data: {
                        user_id: user_id
                    },
                    success: function(data) {

                        dataTable.ajax.reload();
                    }
                });
            } else {
                return false;
            }
        });

        var container = $('<div/>').insertBefore(dataTable.table().container());

        var chart = Highcharts.chart(container[0], {

            data: {
                table: document.getElementById('event_data')
            },
            chart: {
                type: 'line',
            },
            title: {
                text: 'Events Attendance',
            },
            series: [{
                data: chartData(dataTable),
            }, ],
        });


        dataTable.on('draw', function() {
            chart.series[0].setData(chartData(dataTable));
        });


        function chartData(dataTable) {
            var counts = {};


            dataTable
                .column(2, {
                    search: 'applied'
                })
                .data()
                .each(function(val,index) {
                    
                    counts[index] = parseInt(val);;

                });
            

            return $.map(counts, function(val, key) {
                return {
                    name: key,
                    y: val,
                };
            });

        }
    });
</script>

</body>

</html>