<?php

require_once("auth_session.php");
require_once('db.php');

?>
<!DOCTYPE html>
<html>

<head>


    <title>Projects</title>
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

                <div class="thirteen wide column">
                    <div class="ui breadcrumb" id="breadcrumb">
                        <a class="section ui large header" href="dashboard.php">Home</a>
                        <i class="right chevron icon divider"></i>
                        <a class="section ui large header" href="projects.php">Projects</a>


                    </div>
                    <div>


                        <div align="right">
                            <button type="button" id="add_button" class="ui blue huge button">Add</button>
                        </div>
                        <br /><br />
                        <table id="table" class="ui celled striped table">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Github Link</th>
                                    <th>Project Team</th>
                                    <th>Description</th>
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
        <form class="ui form" method="post" id="project_form">
            <div class="field">
                <label>Project Name</label>
                <div class="field">
                    <input type="text" name="projectname" id="projectname">
                </div>

            </div>
            <div class="field">
                <label>Github Link</label>
                <div class="field">
                    <input type="text" name="githublink" id="githublink">
                </div>

            </div>
            <div class="field">
                <label>Description</label>
                <div class="field">
                    <input type="text" name="description" id="description">
                </div>

            </div>
            <div class="field">
                <div class="inline fields">
                    <label>Field</label>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="projectteam" value="Web Team" checked="checked">
                            <label>Web Team</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="projectteam" value="Mobile Team">
                            <label>Mobile Team</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="projectteam" value="Game Team">
                            <label>Game Team</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="projectteam" value="Cyber Team">
                            <label>Cyber Team</label>
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
                    projectname: {
                        identifier: 'projectname',
                        rules: [{
                                type: 'empty',
                                prompt: 'Please enter project name'
                            }
                        ]
                    },
                    githublink: {
                        identifier: 'githublink',
                        rules: [{
                            type: 'empty',
                            prompt: 'Please enter github link'
                        }]
                    },
                    description: {
                        identifier: 'description',
                        rules: [{
                            type: 'empty',
                            prompt: 'Please enter description'
                        }]
                    },
                }
            });

        $('#add_button').click(function() {
            $('.ui.modal').modal('show');
            $('#project_form')[0].reset();
            $('#action').val("Add");
            $('#operation').val("Add");
        });

        var dataTable = $('#table').DataTable({
            "pageLength": 300,
            "processing": true,
            "serverSide": true,
            "searching": false,
            "paging": false,
            'serverMethod': 'post',
            "order": [],
            "ajax": {
                url: "fetchproject.php"
            },

        });


        $(document).on('submit', '#project_form', function(event) {
            event.preventDefault();
                $.ajax({
                    url: "addeditproject.php",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,

                    processData: false,
                    success: function(data) {
                        $('#project_form')[0].reset();
                        $('.ui.modal').modal('hide');
                        dataTable.ajax.reload();
                    }
                });
        
        });

        $(document).on('click', '.update', function() {
            var user_id = $(this).attr("id");
            $.ajax({
                url: "singleproject.php",
                method: "POST",
                data: {
                    user_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    $('.ui.modal').modal('show');
                    $('#projectname').val(data.projectname);
                    $('#githublink').val(data.githublink);
                    $('#description').val(data.description);
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
                    url: "deleteproject.php",
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
                type: 'column',
            },
            title: {
                text: 'Projects of the Teams ',
            },
            series: [{
                data: chartData(dataTable),
                dataSorting: {
                    enabled: true
                },
            }, ],
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: "Count",
                },
            },
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