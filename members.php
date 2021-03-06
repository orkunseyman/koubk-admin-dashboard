<?php

require_once("auth_session.php");
require_once('db.php');

?>
<!DOCTYPE html>
<html>

<head>


    <title>Members</title>
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
                        <a class="section ui large header" href="members.php">Members</a>


                    </div>
                    <div>


                        <div align="right">
                            <button type="button" id="add_button" class="ui blue huge button">Add</button>
                        </div>
                        <br /><br />
                        <table id="user_data" class="ui celled striped table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Grade</th>
                                    <th>Phone</th>
                                    <th>Interest</th>
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
        <form class="ui form" method="post" id="user_form">
            <label>Name</label>
            <div class="field">
                <input name="name" id="name">
            </div>


            <div class="field">
                <label>Email</label>
                <div class="field">
                    <input type="text" name="email" id="email">
                </div>

            </div>
            <div class="field">
                <label>Department</label>
                <div class="field">
                    <input type="text" name="department" id="department">
                </div>

            </div>
            <div class="field">
                <label>Grade</label>
                <div class="field">
                    <input type="text" name="grade" id="grade">
                </div>

            </div>
            <div class="field">
                <label>Phone</label>
                <div class="field">
                    <input type="text" name="phone" id="phone">
                </div>

            </div>
            <div class="field">
                <div class="inline fields">
                    <label>Field</label>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="interest" value="Web Development" checked="checked">
                            <label>Web Development</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="interest" value="Mobile Development">
                            <label>Mobile Development</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="interest" value="Machine Learning">
                            <label>Machine Learning</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="interest" value="Cyber Security">
                            <label>Cyber Security</label>
                        </div>
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
                    email: {
                        identifier: 'email',
                        rules: [{
                                type: 'empty',
                                prompt: 'Please enter your e-mail'
                            },
                            {
                                type: 'email',
                                prompt: 'Please enter a valid e-mail'
                            }
                        ]
                    },
                    name: {
                        identifier: 'name',
                        rules: [{
                            type: 'empty',
                            prompt: 'Please enter your name'
                        }]
                    },
                    department: {
                        identifier: 'department',
                        rules: [{
                            type: 'empty',
                            prompt: 'Please enter your department'
                        }]
                    },
                    grade: {
                        identifier: 'grade',
                        rules: [{
                            type: 'empty',
                            prompt: 'Please enter your grade'
                        }]
                    },
                    phone: {
                        identifier: 'phone',
                        rules: [{
                            type: 'empty',
                            prompt: 'Please enter your phone'
                        }]
                    },

                }
            });

        $('#add_button').click(function() {
            $('.ui.modal').modal('show');
            $('#user_form')[0].reset();
            $('#action').val("Add");
            $('#operation').val("Add");
        });

        var dataTable = $('#user_data').DataTable({
            "pageLength": 300,
            "processing": true,
            "serverSide": true,
            "searching": false,
            "paging": false,
            'serverMethod': 'post',
            "order": [],
            "ajax": {
                url: "fetchmember.php"
            },
            "columnDefs": [{
                "targets": [6, 7],
                "orderable": false
            }]

        });


        $(document).on('submit', '#user_form', function(event) {
            event.preventDefault();
            var name = $('#name').val();
            var email = $('#email').val();
            if (name != '' && email != '' && department != '' && phone != '' && grade != '') {
                $.ajax({
                    url: "addeditmember.php",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,

                    processData: false,
                    success: function(data) {
                        $('#user_form')[0].reset();
                        $('.ui.modal').modal('hide');
                        dataTable.ajax.reload();
                    }
                });
            } else {
                alert("Error");
            }
        });

        $(document).on('click', '.update', function() {
            var user_id = $(this).attr("id");
            $.ajax({
                url: "singlemember.php",
                method: "POST",
                data: {
                    user_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    $('.ui.modal').modal('show');
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#department').val(data.department);
                    $('#grade').val(data.grade);
                    $('#phone').val(data.phone);
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
                    url: "deletemember.php",
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
            chart: {
                type: 'pie',
            },
            title: {
                text: 'Members Fields',
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
                .column(5, {
                    search: 'applied'
                })
                .data()
                .each(function(val) {
                    if (counts[val]) {
                        counts[val] += 1;
                    } else {
                        counts[val] = 1;
                    }
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