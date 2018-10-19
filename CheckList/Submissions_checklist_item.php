<!doctype html>
<html lang="en">
<head>
    <title>Manage Check Lists</title>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
    <?php include ('master/MainLinks.php');?>
    <link rel="stylesheet" href="ASSETS/CSS/All_Submissions.css">
</head>
<body>
<?php include ('master/NavBar.php');?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 id="card-header-title" style="display:inline">CheckList Title</h3>
                    <button class="btn btn-danger" id="deletCheck" style="float:right" data-toggle="tooltip" data-placement="left" title="Delet this checklist for ever"><i class="fas fa-trash"></i></button>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-light table-hover" id="example">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Done</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date/time</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>
                                <label>Title</label>
                            </th>
                            <td>
                                <div class="item"> <input type="checkbox" id="toggle_today_summary" checked disabled> <div class="toggle"> <label for="toggle_today_summary"><i></i></label></div></div>
                            </td>
                            <td>
                                <label>Descreption</label>
                            </td>
                            <td>
                                <label>2018/09/30</label>
                            </td>
                            <td>
                                <button class="btn btn-danger delet_item" data-toggle="tooltip" data-placement="left" title="Delet this item for ever"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label>Title</label>
                            </th>
                            <td>
                                <div class="item"> <input type="checkbox" id="toggle_today_summary" checked disabled> <div class="toggle"> <label for="toggle_today_summary"><i></i></label></div></div>
                            </td>
                            <td>
                                <label>Descreption</label>
                            </td>
                            <td>
                                <label>2018/09/30</label>
                            </td>
                            <td>
                                <button  class="btn btn-danger delet_item" data-toggle="tooltip" data-placement="left" title="Delet this item for ever"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ('master/JSlinks.php');?>
<script>
    $('#deletCheck').tooltip()
    $('.delet_item').tooltip()
</script>
</body>
</html>
