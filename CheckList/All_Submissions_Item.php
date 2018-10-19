<html lang="en">
<head>
    <title>Manage Check Lists</title>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
    <?php include ('master/MainLinks.php');?>
    <link rel="stylesheet" href="ASSETS/CSS/Checklists.css">
    <link rel="stylesheet" href="ASSETS/CSS/All_Submissions.css">
    <!doctype html>
</head>
<body>
<?php include ('master/NavBar.php');?>
<div class="container">
    <div class="row">
        <div class="col-12">
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
                        <button type="text"  class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include ('master/JSlinks.php');?>
</body>
</html>
